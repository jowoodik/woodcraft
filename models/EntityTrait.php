<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 12.04.16
 * Time: 16:15
 */

namespace app\models;

use yii\web\Controller;

/**
 * Class EntityTrait
 * @package app\models
 * @property \app\models\Route $route
 */
trait EntityTrait
{
    public $route;

    public $entity_id;

    public function attach()
    {

    }

    public function action(Controller $controller)
    {
        return $controller->render($this->getViewPath(), $this->getViewParams());
    }

    public function getEntityModel()
    {
        return $this;
    }

    public function getViewPath()
    {
        $parts = explode("\\", self::className());
        $className = end($parts);
        $firstTransformClassName = lcfirst($className);

        $secondTransformClassName = ltrim(preg_replace('/[A-Z]/', '-$0', $firstTransformClassName));

        $className = mb_strtolower($secondTransformClassName);

        $baseEntityPath = '@app/entities/';
        $entityFinalPath = $baseEntityPath . $className . '/' . $className . '.php';
        $viewPath = $entityFinalPath;
        return $viewPath;
    }

    public function getViewParams()
    {
        return [
            'model' => $this,
        ];
    }
}
