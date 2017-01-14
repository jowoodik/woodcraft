<?php
use yii\helpers\Html;

?>
<div class="admin_login">
    <?php
    if ($_SERVER['REQUEST_URI'] == '/') {
        echo Html::a('Выйти', ['/logout'], ['data-method' => 'post', 'class' => 'button white admin']);
    } else if ($entity == 4) {
        echo Html::a('Выйти', ['/logout'], ['data-method' => 'post', 'class' => 'button white admin']);
        echo Html::a('Редактировать страницу', ['/admin/pages/update?id=' . $entity_id], ['class' => 'button white admin']);
    } else if ($entity == 1) {
        echo Html::a('Выйти', ['/logout'], ['data-method' => 'post', 'class' => 'button white admin']);
    } else if ($entity == 2) {
        echo Html::a('Выйти', ['/logout'], ['data-method' => 'post', 'class' => 'button white admin']);
        echo Html::a('Редактировать страницу', ['/admin/catalog-categories/update?id=' . $entity_id], ['class' => 'button white admin']);
    } else if ($entity == 3) {
        echo Html::a('Выйти', ['/logout'], ['data-method' => 'post', 'class' => 'button white admin']);
        echo Html::a('Редактировать страницу', ['/admin/catalog-groups/update?id=' . $entity_id], ['class' => 'button white admin']);
    }
    ?>  
</div>

