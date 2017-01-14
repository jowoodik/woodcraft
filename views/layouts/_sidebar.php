<?php

use app\widgets\SideBar\SideBar;

/** @var \app\models\EntityCatalogCategories $model */
echo SideBar::widget([
    'id'        => $model['route']['id'],
    'parent_id' => $model['route']['parent_id']
]);
