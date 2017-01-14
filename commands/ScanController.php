<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 13.07.16
 * Time: 17:56
 */

namespace app\commands;


use app\models\ImageStorage;
use Yii;
use yii\console\Controller;

class ScanController extends Controller
{
    public function actionIndex()
    {
        $files = ImageStorage::scanDir(Yii::getAlias('@app/uploads'));

        $pathsInDb = ImageStorage::find()->indexBy('path')->column();
        //$dirNameInDb = ImageStorage::find()->indexBy('dir_name')->column();

        $existCount = 0;
        $savedCount = 0;
        $deletedCount = 0;

        foreach ($files as $file) {
            if (isset($pathsInDb[$file])) {
                /** Есть в базе*/
                $existCount++;
                unset($pathsInDb[$file]);
            } else {
                if (ImageStorage::addImage($file)) {
                    echo "save $file\n";
                    $savedCount++;
                } else {
                    echo "failed save $file\n";
                }
            }
        }

        if ($pathsInDb) {
            $deletedCount = ImageStorage::deleteAll(['path' => array_flip($pathsInDb)]);
        }

        echo "Image in ImageStorage\n";
        echo "exist $existCount\n";
        echo "saved $savedCount\n";
        echo "deleted $deletedCount\n";
    }
}