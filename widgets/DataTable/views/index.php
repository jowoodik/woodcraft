<?php
/**
 * @var \app\widgets\DataTable\DataTable $model
 */

use yii\helpers\Html;

?>
<div id = "result"></div>
<table id="data_table">
    <thead>
    <tr role = "row">
        <?php foreach ($model->columns as $item) {
            echo Html::tag('th', $item['attribute']);
        } ?>
    </tr>
    </thead>
</table>
