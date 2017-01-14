<?php
/**
 * Created by PhpStorm.
 * User: Игорь
 * Date: 28.04.2016
 * Time: 17:46
 */

namespace app\commands;


use yii;
use yii\console\Controller;
use yii\gii\CodeFile;
use yii\gii\generators\model\Generator;

class ModelsController extends Controller
{
    public $defaultAction = 'update';
    public $prefix = 'Base';
    protected $files = [];
    protected $excludedTables = [
        'migration',
    ];

    public static $namespace = 'common\models';

    /**
     *
     */
    public function actionUpdate()
    {
        try {
            Yii::getAlias('@common');
        } catch (\Exception $e){
            static::$namespace = 'app\models';

        }

        $root = Yii::getAlias('@' . str_replace('\\', '/', static::$namespace));
        if (!is_dir($root)) {
            mkdir($root);
        } else {
            $files = scandir($root);
            foreach ($files as $file) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                if (preg_match('/^Base([A-Z]{1}.*)\.php/s', $file)) {
                    $this->files[$file] = $file;
                }
            }
        }

        $connection = Yii::$app->db;
        $schemas = $connection->schema->getTableSchemas();

        foreach ($schemas as $tbl) {
            if(in_array($tbl->name,$this->excludedTables)) {
                continue;
            }
            
            $gen = new Generator;
            $gen->ns = static::$namespace;
            $gen->tableName = $tbl->name;
            $gen->generateLabelsFromComments = true;
            $gen->useTablePrefix = true;

            /** @var CodeFile[] $files */
            $files = $gen->generate();

            foreach ($files as $file) {
                $reg_exp = '/^class (.*?) extends/m';
                preg_match($reg_exp, $file->content, $className);

                $newClass = $this->prefix . $className[1];
                $file->content = preg_replace($reg_exp, 'class ' . $newClass . ' extends', $file->content);

                if (self::saveTable($file, $newClass)) {
                    if (array_key_exists($newClass . '.php', $this->files)) {
                        unset($this->files[$newClass . '.php']);
                    }
                    echo "Save $newClass\n";
                }

                if (!file_exists($root . '/' . $className[1] . '.php')) {
                    if (file_put_contents(
                        $root . '/' . $className[1] . '.php',
                        static::renderEmptyClass($className[1])
                    )) {
                        echo "create {$className[1]}\n";
                    }
                }
            }
        }
        foreach ($this->files as $file) {
            if (unlink($root . '/' . $file)) {
                echo "remove $root/$file\n";
            }
        }
    }

    /**
     * @param CodeFile $file
     * @param $className
     * @return bool
     */
    public static function saveTable(CodeFile $file, $className)
    {
        return file_put_contents(
            Yii::getAlias('@' . str_replace('\\', '/', static::$namespace)) . '/' . $className . '.php',
            $file->content
        ) ? true : false;
    }

    /**
     * @param $name
     * @return string
     */
    public static function renderEmptyClass($name)
    {
        $text = '<?php

namespace ' . static::$namespace . ';

class ' . $name . ' extends Base' . $name . '
{
    
}';

        return $text;
    }
}