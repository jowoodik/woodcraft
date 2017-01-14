<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 28.06.2016
 * Time: 20:33
 */

namespace app\commands;


use app\models\Queue;
use Exception;
use yii;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\Json;

class QueueController extends Controller
{
    public $info = true;

    public function options($actionID)
    {
        return [
            'info',
        ];
    }

    public function optionAliases()
    {
        return [
            'i' => 'info',
        ];
    }

    public function actionIndex()
    {
        $jobs = Queue::getJobs();

        if ($this->info) {
            $count = count($jobs);
            $count = $this->ansiFormat($count, Console::FG_GREEN);
            echo "jobs count $count\n";
        }

        foreach ($jobs as $job) {
            $this->execJob($job);
        }
    }

    public function actionDaemon()
    {
        $yii = Yii::getAlias('@app/yii');

        while (true) {
            echo shell_exec("php $yii queue -i=0");
            sleep(1);
        }
    }

    /**
     * @param $job
     * @throws yii\db\Exception
     */
    public function execJob($job)
    {
        $log = '';
        $is_handled = false;

        $id = ArrayHelper::getValue($job, 'id');
        $route = ArrayHelper::getValue($job, 'route');
        $arguments = ArrayHelper::getValue($job, 'arguments');
        $options = ArrayHelper::getValue($job, 'options');

        $cmd = '';

        try {
            $yii = Yii::getAlias('@app/yii');

            if ($options) {
                $options = Json::decode($options);
                $options = Queue::optionsToString($options);
            }

            $cmd = trim("php $yii $route $arguments $options 2>&1");

            if ($this->info) {
                echo $cmd . PHP_EOL;
            }

            exec($cmd, $output, $return);

            $log = implode(PHP_EOL, $output);

            if ($return === Controller::EXIT_CODE_NORMAL) {
                $is_handled = true;
            }

        } catch (Exception $e) {
            $log = $e->getMessage();
        }

        $sql = <<<SQL
UPDATE queue
SET 
  log = :log,
  is_handled = :is_handled,
  retry = retry + 1
WHERE id = :id
SQL;
        if (!trim($log)) {
            $log = '';
        } else {
            echo $log . PHP_EOL;
        }

        $cmd = Yii::$app->db->createCommand($sql, [
            'id' => $id,
            'log' => $log,
            'is_handled' => $is_handled,
        ]);

        $cmd->execute();

    }
}
