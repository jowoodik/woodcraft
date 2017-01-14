<?php
namespace app\modules\admin\widgets\menu;

?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= Menu::widget([
            'items' => [
                [
                    'icon' => 'fa fa-sitemap',
                    'text' => 'Структура',
                    'url' => ['/admin/default/index'],
                ],
                [
                    'icon' => 'fa fa-list-alt',
                    'text' => 'Меню',
                    'url' => ['/admin/menu/index'],
                ],
                [
                    'label' => 'Dropdown',
                    'text' => 'Настройки',
                    'icon' => 'fa fa-cogs',
                    'items' => [
                        [
                            'icon' => 'fa fa-plug',
                            'text' => 'Настройки гл. страницы',
                            'url' => ['/admin/settings-main-page/index'],
                        ],
                        [
                            'icon' => 'fa fa-arrows-h',
                            'text' => 'Слайдер',
                            'url' => ['/admin/slider/index'],
                        ],
                    ],
                ],
                [
                    'icon' => 'fa fa-newspaper-o',
                    'text' => 'Новости',
                    'url' => ['/admin/news/index'],
                ],
                [
                    'label' => 'Dropdown',
                    'text' => 'Галерея',
                    'icon' => 'fa fa-picture-o',
                    'items' => [
                        [
                            'icon' => 'fa fa-list',
                            'text' => 'Список галерей',
                            'url' => ['/admin/gallery/index'],
                        ],
                        [
                            'icon' => 'fa fa-picture-o',
                            'text' => 'Изображения в галереях',
                            'url' => ['/admin/gallery/items'],
                        ],
                    ],
                ],
            ]
        ]);
        ?>
    </section>
</aside>
