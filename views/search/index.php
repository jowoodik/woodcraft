<?php
/**
 * @var \app\controllers\SearchController
 *
 * @var array $categories
 * @var \yii\data\ActiveDataProvider $dataProvider
 */


use yii\helpers\Url;

$this->title = 'Поиск';

?>

<div class="block-title">Продукция</div>

<div class="row">
    <div class="col-md-offset-4 col-md-4">
        <div class="search-item">
            <?php
            if ($dataProvider->getModels() == null) { ?>
                <div class="list-group">
                    <p>Совпадений не найдено</p>
                </div>
            <?php } else { ?>
                <div class="list-group">
                    <?php foreach ($dataProvider->getModels() as $model) {
                        echo $this->render('_post', ['model' => $model]);
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
