<?php
namespace app\modules\admin\controllers;


use app\models\EntityCatalog;
use app\models\EntityCatalogCategories;
use app\models\EntityGallery;
use app\models\EntityVacancy;
use app\models\Route;
use Imagine\Image\Box;
use yii;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class CatalogCategoriesController extends Controller
{
    public $title = 'Страница товара';

    public function actionIndex()
    {
        return $this->redirect(yii\helpers\Url::to('/admin/default/index'));
    }

    public function actionCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        $model = new EntityCatalogCategories();

        if ($model->load($req->post())) {
            $dirName = 'uploads/catalog-categories';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(250, 190);
                $sizePreviewS = new Box(220, 160);
                $sizeCard = new Box(450, $height);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $image->open($file->tempName)
                    ->thumbnail($sizePreviewS)
                    ->save($dir . '/' . $string . '-preview-stroi.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }

            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }

        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить страницу товара';

        return $this->render('categories-form', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model EntityCatalogCategories() */
        $model = EntityCatalogCategories::findOne($id);
        $oldFile = $model->image;

        if ($model->load($req->post())) {
            if (!$model->image) $model->image = $oldFile;
            $model->price = $req->post()['EntityCatalogCategories']['price'];
            $dirName = 'uploads/catalog-categories';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(250, 190);
                $sizePreviewS = new Box(220, 160);
                $sizeCard = new Box(450, $height);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $image->open($file->tempName)
                    ->thumbnail($sizePreviewS)
                    ->save($dir . '/' . $string . '-preview-stroi.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                if ($req->post('btn-save-and-close')) {
                    return $this->goBack();
                }
            } else {
                echo '<pre>';
                print_r ($model->price);
                echo '</pre>';
                exit();
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }

        $this->view->params['breadcrumbs'][] = $this->view->title = 'Редактировать страницу товара';

        return $this->render('categories-form', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $ecc = EntityCatalogCategories::findOne($id);

        if (isset($ecc)) {
            $route_id = $ecc['route_id'];
            $ecc->delete();

            $route = Route::findOne($route_id);
            if (!$route) throw new NotFoundHttpException;

            $route->delete();
        }
        return $this->goBack();
    }
}
