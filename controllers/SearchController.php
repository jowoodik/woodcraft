<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 04.02.2016
 * Time: 12:04
 */

namespace app\controllers;


use app\models\EntityCatalogCategories;
use yii\base\ErrorException;
use yii\console\Exception;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

class SearchController extends Controller
{
    public function rules()
    {

        return [
//            [['parent_id', 'entity', 'entity_id', 'sort', 'created_at', 'updated_at'], 'integer'],
//            [['params', 'meta_description', 'meta_keywords'], 'string'],
//            [['is_active'], 'boolean'],
            [['q'], 'string', 'max' => 255],
//            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    public function actionIndex($q)
    {
        if (!$q) throw new Exception("Введите поисковый запрос \n");

        $dataProvider = EntityCatalogCategories::search($q);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
