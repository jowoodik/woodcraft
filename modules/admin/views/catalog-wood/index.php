<?php
/**
 * @var $this yii\web\View
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model
 */
use app\lib\App;
use app\widgets\jsTree\jsTree;
$sql = <<<SQL
SELECT
  "id",
  CASE WHEN pid IS NULL THEN
    '#'
  ELSE
    pid::VARCHAR
  END,
  title
FROM
  routes 
SQL;

$data = Yii::$app->db->createCommand($sql)->queryAll();

$this->params['h1'] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-body">
                <?php// pree($model); ?>
                <?php /*echo App::buildCatalogTreeAdmin($model)//, $model['pid']) */?>               
            </div>
        </div>
    </div>
</div>

