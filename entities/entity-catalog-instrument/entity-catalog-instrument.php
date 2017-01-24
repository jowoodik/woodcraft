<?php
/**
 * @var $this yii\web\View
 * @var app\models\EntityCatalogProizvodstvo $model
 */

use app\widgets\SideBar\SideBar;
use yii\widgets\Breadcrumbs;

$this->title = 'Производство';
$this->params['breadcrumbs'] = $model->breadcrumbs;
$this->params['h1'] = $this->title;
?>
<?php echo SideBar::widget([
]); ?>
<div class="col-md-9 col-xs-12 content-wrapper">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="catalog">
        <?= $this->render('_items', ['model' => $model]) ?>
    </div>
</div>

