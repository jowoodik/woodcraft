<?php
/**
 * @var app\models\EntityCatalogCategories $model
 */

use app\models\RouteIndex;


$path = RouteIndex::find()
    ->select('path')
    ->innerJoin('route', 'route.id = route_index.route_id')
    ->where(['route.entity_id' => $model['id']])
    ->one();

$date = $model['created_at'];
$path = $path['path'];

?>
<a href="<?= $path ?>" class="list-group-item">
    <?= $model['title'] ?>
</a>
