<?php
/**
 * @var \yii\web\View $this 
 * @var int $id 
 * @var string $params
 */

use app\lib\Js;

?>
<?php Js::begin() ?>
<script>
    $tree = $('#<?= $id ?>').jstree(<?= $params ?>);
</script>
<?php Js::end() ?>
<div id="<?= $id ?>"></div>
