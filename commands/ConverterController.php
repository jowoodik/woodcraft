<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.05.16
 * Time: 12:42
 */

namespace app\commands;

use app\lib\App;
use app\modules\admin\models\CatalogGroups;
use app\modules\admin\models\CatalogCategories;
use app\modules\admin\models\Products;
use Yii;
use yii\console\Controller;


class ConverterController extends Controller
{
    /*public static function getDb(){
        return Yii::$app->secondDb;
    }*/

    public function actionIndex()
    {
        /*$sql = <<<SQL
SELECT * FROM f6t5s49f2j_menu
SQL;

        $prodCat = App::secondDb()->createCommand($sql)->queryAll();

        foreach ($prodCat as $row) {

            $category = new CatalogCategories();
            $category->title = $row['name'];
            $category->alias = $row['alias'];
            /* $category->description = $row['text'];
             $category->meta_description = $row['description'];
             $category->meta_keywords = $row['key'];
            $category->is_active = true;
            if (!$category->save()) {
                dd($category->errors);
            }

        }*/


    }

    public function actionGroupsAndProducts()
    {
       /* $sql = <<<SQL
SELECT * FROM f6t5s49f2j_com_prod
SQL;

        $prodGroup = App::secondDb()->createCommand($sql)->queryAll();

        foreach ($prodGroup as $row) {

            $group = new CatalogGroups();
            $group->title = $row['name'];
            $group->is_active = true;
            $group->image = $row['img'];
            $group->item_options = $row['cost'];

            if (!$group->save()) {
                dd($group->errors);
            }
            
            foreach (explode("|", $row['cost']) as $productName) {
                $product = new Products();
                $product->name = $productName;
                $product->is_active = true;
                $product->group_id = $group->id;
                if (!$product->save()) {
                    dd($product->errors);
                    die();
                }

                //exit();
            }


        }
*/

    }


}