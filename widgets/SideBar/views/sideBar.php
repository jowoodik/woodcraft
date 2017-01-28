<?php
/**
 * @var \app\widgets\SideBar\SideBar $model
 */

use app\models\Route;
use yii\helpers\Html;

if (isset($model->parent_id)){
    $condition = 'parent_id';
    $id = $model->id;
} else {
    $condition = 'level';
    $id = 1;
}

$routes = Route::find()
    ->asArray()
    ->select([
        'route.*',
        'route_index.*'
    ])
    ->where([$condition => $id])
    ->andWhere(['entity' => 5])
    ->innerJoin('route_index', 'route_index.route_id = route.id')
    ->all();

?>
<div class="col-md-3 col-xs-12">
    <div class="sidebar">
        <p class="block-title"><a href="">Каталог продукции</a></p>
        <hr class="block-hr">
        <ul class="sidebar-menu">
            <?php foreach ($routes as $route) :?>
                <li class="sidebar-menu-item">
                    <a href="<?= $route['path'] ?>"><?= $route['title']?>
                        <span class="st_menu_open"><span class="glyphicon glyphicon-chevron-right"></span></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

