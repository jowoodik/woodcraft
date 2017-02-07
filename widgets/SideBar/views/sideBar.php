<?php
/**
 * @var \app\widgets\SideBar\SideBar $model
 * @var app\models\Route[] $routes
 */

?>
<div class="col-md-3 col-xs-12">
    <div class="sidebar">
        <p class="block-title"><a href="">Каталог продукции</a></p>
        <hr class="block-hr">
        <ul class="sidebar-menu">
            <?php foreach ($routes as $route) :?>
                <li class="sidebar-menu-item" data-parent="<?= $route['id'] ?>" data-parent-path="<?= $route['path'] ?>"
                    data-parent-title="<?= $route['title'] ?>">
                    <div class="wrapper-item">
                        <a href="<?= $route['path'] ?>"><?= $route['title'] ?>
                            <span class="st_menu_open"><span class="glyphicon glyphicon-chevron-right"></span></span>
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php
$js = <<<JS
$(document).on('click',".sidebar-menu-item:not('.active') .wrapper-item", function (e) {
        e.preventDefault();
        
        var parent = $(this).parents('.sidebar-menu-item');
        var parentId = $(parent).data('parent');
        var parentPath = $(parent).data('parent-path');
        var parentName = $(parent).data('parent-title');

        $.ajax({
            url:'/route/get-sub-levels',
            method: 'post',
            context: $(this),
            data: {
                parentId: parentId,
                parentPath: parentPath,
                parentName: parentName,
            },
            success: function(data, status) {
                if(status === 'success'){
                    $(parent).addClass('active');
                    $(parent).html(data);
                }
            }
        })
    })
$(document).on('click',".sidebar-menu-item.active .wrapper-item", function (e) {
        e.preventDefault();
        
        var parent = $(this).parents('.sidebar-menu-item');
        var parentPath = $(parent).data('parent-path');
        var parentName = $(parent).data('parent-title');
        
        $(parent).removeClass('active');
        $(parent).html("<div class='wrapper-item'><a href=" + parentPath +">"+parentName +"<span class='st_menu_open'><span class='glyphicon glyphicon-chevron-right'></span></span></a></div>");
    });
JS;
$this->registerJs($js);
?>

