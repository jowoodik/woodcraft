<?php
/**
 * @var $this yii\web\View
 */

use app\models\Entity;
use app\modules\admin\models\Route;
use app\modules\admin\widgets\jsTree\jsTree;
use yii\bootstrap\Nav;

use yii\helpers\Url;
use yii\web\JsExpression;

//pree($model);

$data = Route::getData();
//pree($data);
$this->params['h1'] = $this->title;

$goToEntityUrl = Url::to(['go-to-entity']);
$deleteEntity = Url::to(['delete-entity']);

$contextMenuItems = <<<JS
function items(node) {
    return {
        update: {
            label: 'Редактировать сущность',
            action: function(obj) {
                console.log(node);
                $.get({
                    url: '$goToEntityUrl',
                    data: {action: 'update', entity: node.original['type'], entity_id: node.original['entity_id']}
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
                   console.log(node.original['id']);              
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
                    <button class="btn btn-default dropdown-toggle my" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Добавить...
                        <span class="caret"></span>
                    </button>
                    <?= Nav::widget([
                        //'items' => Entity::createItems(),
                        'options' => ['class' => 'dropdown-menu']
                    ]) ?>
                </div>
                <hr>
                <? /*= App::buildStructure($model) */ ?>
                <?= jsTree::widget([
                    'id' => 'tree',
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
                        'types' => [
//                            'default' => [
//                                "icon" => "fa fa-file-text",
//                            ],
                            '1' => [
                                "icon" => "fa fa-file-text",
                            ],
                            '2' => [
                                "icon" => "fa fa-folder",
                            ],
                            '3' => [
                                "icon" => "fa fa-cubes",
                            ],
                            '4' => [
                                "icon" => "fa fa-file-text",
                            ],
                            '5' => [
                                "icon" => "fa fa-picture-o",
                            ],
                            '6' => [
                                "icon" => "fa fa-comments",
                            ],
                            '7' => [
                                "icon" => "fa fa-money",
                            ],
                        ],
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
