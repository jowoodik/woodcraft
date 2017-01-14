<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 16.05.16
 * Time: 10:06
 */

namespace app\modules\admin\controllers;


use app\models\EntityGallery;
use app\modules\admin\models\GalleryItem;
use Exception;
use Imagine\Image\Box;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class GalleryController extends Controller
{
    public $title = 'Фотогалерея';


    // Методы галерей
    public function actionIndex()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = EntityGallery::find()
            ->asArray()
            ->with('route')
            ->with('galleryItems');

        $dataProvider = new ActiveDataProvider([
            'query' => $models,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'models' => $models,
        ]);
    }

    public function actionCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model EntityGallery */
        $model = new EntityGallery();


        if ($model->load($req->post())) {
            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model EntityGallery */
        $model = EntityGallery::findOne($id);

        if ($model->load($req->post())) {

            if ($model->save()) {
                if ($req->post('btn-save-and-close')) {
                    return $this->goBack();
                }
            } else {
                Yii::warning($model->errors);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)

    {
        $eg = EntityGallery::findOne($id);

        if (!$eg->delete()) throw new Exception(Json::encode($eg->errors));

        return $this->redirect('/admin/default/index');
    }


    public function actionItems()
    {
        Url::remember();
        $this->view->title = $this->title;

        $models = GalleryItem::find()
            ->asArray();


        $dataProvider = new ActiveDataProvider([
            'query' => $models,
            'sort' => [
                'defaultOrder' => ['gallery_id' => SORT_DESC],
            ],
        ]);

        $this->view->params['breadcrumbs'][] = $this->view->title = $this->title;

        return $this->render('items', [
            'dataProvider' => $dataProvider,
            'models' => $models,
        ]);
    }

    public function actionItemCreate()
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model GalleryItem */
        $model = new GalleryItem;
        if ($model->load($req->post())) {
            $dirName = 'uploads/gallery-items';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(259, 194);
                $sizeCard = new Box(450, $height);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                return $this->goBack();
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }
        $this->view->params['breadcrumbs'][] = $this->view->title = 'Добавить изображение в галерею';
        return $this->render('item-create', [
            'model' => $model,
        ]);
    }

    public function actionItemUpdate($id)
    {
        $this->view->title = $this->title;

        $req = Yii::$app->request;

        /** @var $model GalleryItem */
        $model = GalleryItem::findOne($id);

        $oldFile = $model->image;

        if ($model->load($req->post())) {
            if (!$model->image) $model->image = $oldFile;
            $dirName = 'uploads/gallery-items';

            $route = $dirName . '/';
            $dir = Yii::getAlias("@app/web/");
            $string = $route . rand(1, 100) . '' . date('YmdHis');

            $file = UploadedFile::getInstance($model, 'image');

            if ($file) {
                $model->image = $string;
                $sizes = getimagesize($file->tempName);
                $height = $sizes[1];
                $image = Image::getImagine();
                $sizePreview = new Box(259, 194);
                $sizeCard = new Box(450, $height);

                $image->open($file->tempName)
                    ->thumbnail($sizePreview)
                    ->save($dir . '/' . $string . '-preview.jpg', ['quality' => 100]);

                $file->saveAs($dir . '/' . $string . '.jpg');
            }
            if ($model->save()) {
                if ($req->post('btn-save-and-close')) {
                    return $this->goBack();
                }
            } else {
                //чтобы видеть ошибку:
                Yii::warning($model->errors);
            }
        }

        return $this->render('item-update', [
            'model' => $model,
        ]);
    }

    public function actionItemDelete($id)
    {
        /** @var GalleryItem $item */
        $item = GalleryItem::findOne($id);

        if (!$item->delete()) throw new Exception(Json::encode($item->errors));

        return $this->redirect('items');
    }
}
