<?php
/**
 * @var $this yii\web\View
 * @var $data
 */

use app\models\Entity;
use app\modules\admin\widgets\jsTree\jsTree;
use yii\bootstrap\Nav;
use yii\helpers\Url;
use yii\web\JsExpression;

$goToEntityUrl = Url::to(['go-to-entity']);
$deleteEntity = Url::to(['delete-entity']);

$contextMenuItems = <<<JS
function items(node) {
    return {
        update: {
            label: 'Редактировать сущность',
            action: function(obj) {
                $.get({
                    url: '$goToEntityUrl',
                    data: {action: 'update', entity: node.original['type'], entity_id: node.original['entity_id']},
                    success: function(url) {
                        window.location.href = url;
                    }
                })
            }
        },
        delete: {
            label: 'Удалить сущность',
             action: function(obj) {
                console.log(node);
                var csrf = yii.getCsrfToken();
                
                $.ajax({
                    type: "POST",
                    url: '$deleteEntity',
                    data: {_csrf:csrf, action: 'delete', id: node.original['id']},
                    dataType: 'json',                   
                })
            }            
        }
    }
}
JS;

?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"> Добавить объект
                        <span class="caret"></span>
                    </button>
                    <?= Nav::widget([
                        'items' => Entity::getEntityCreateUrlList(),
                        'options' => ['class' => 'dropdown-menu']
                    ]) ?>
                </div>
                <hr>
                <?= jsTree::widget([
                    'id' => 'route_map',
                    'params' => [
                        'plugins' => [
                            //"checkbox",
                            "contextmenu",
                            "dnd",
                            //"massload",
                            /* "search",*/
                            //"sort",
                            "state",
                            "types",
                            "wholerow",
                            /*"unique",
                            "wholerow",
                            "changed",
                            "conditionalselect"*/
                        ],
                        'contextmenu' => [
                            'items' => new JsExpression($contextMenuItems),
                        ],
//                        'types' => [
//                            Entity::getEntityIcons(),
//                        ],
                        'core' => [
                            'data' => $data,
                            'themes' => [
                                'name' => 'default',
                                'dots' => false,
                            ],
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
