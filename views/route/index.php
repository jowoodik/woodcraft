<?php
/**
 * @var \app\models\Route[] $routes
 * @var string $parentPath
 * @var string $parentName
 */

?>
<div class="wrapper-item">
<a href="<?= $parentPath ?>"><?= $parentName ?>
        <span class="st_menu_open"><span class="glyphicon glyphicon-chevron-down"></span></span>
    </a>
</div>
<ul class="sub-sidebar-menu">
    <?php
    foreach ($routes as $route) :?>
        <li class="sub-sidebar-menu-item">
            <a href="<?= $route->routeIndex->path ?>"><?= $route->title ?></a>
        </li>
    <?php endforeach; ?>
</ul>
