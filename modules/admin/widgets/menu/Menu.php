<?php
/**
 * Created by PhpStorm.
 * User: work
 * Date: 25.03.2016
 * Time: 8:23
 */

namespace app\modules\admin\widgets\menu;


use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii;

class Menu extends Widget
{
    public $items;

    public function run()
    {
        $html = '<ul class="sidebar-menu">';
        foreach ($this->items as $item) {
            $html .= self::renderItem($item);
        }
        $html .= '</ul>';
        return $html;
    }

    public static function renderItem($item)
    {
        $liOptions = [];

        /** Если пункт является заголовком */
        if (isset($item['is_header'])) {
            $liContent = $item['text'];
            $liOptions = ['class' => 'header'];
        } else {
            if (isset($item['class'])) {
                Html::addCssClass($liOptions, $item['class']);
            }

            /** Если пункт является родителем */
            $items = '';
            if (isset($item['items'])) {
                Html::addCssClass($liOptions, 'treeview');
                $items = '<ul class="treeview-menu">';
                foreach ($item['items'] as $children) {
                    $items .= self::renderItem($children);
                }
                $items .= '</ul>';
            }

            $item['url'] = isset($item['url']) ? $item['url'] : '#';

            if (Menu::isItemActive($item)) {
                Html::addCssClass($liOptions,'active');
            }

            $icon = isset($item['icon']) ? '<i class="' . $item['icon'] . '"></i>' : '';

            $label = '';

            if (isset($item['label'])) {

                $labelClass = ArrayHelper::getValue($item, 'label.class', 'bg-green');

                $labelText = ArrayHelper::getValue($item, 'label.text');

                $labelOptions = ['class' => 'label pull-right'];

                Html::addCssClass($labelOptions, $labelClass);

                $label = Html::tag('span', $labelText, $labelOptions);

            }

            $liContent = Html::a($icon . '<span>' . $item['text'] . '</span>' . $label . $items, $item['url']);
//            else {
//                if (isset($item['url'])) {
//                    $liContent = Html::a('<span>' . $item['text'] . '</span>', $item['url']);
//                } else {
//                    $liContent = $item['text'];
//                }
//            }
        }
        return Html::tag('li', $liContent, $liOptions);
    }

    protected static function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $req_route = Yii::$app->controller->getRoute();
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            $route = ltrim($route, '/');
            $p = preg_split('/\//',$route);
            $q = preg_split('/\//',$req_route);
            if (($p[0]!=$q[0]) || ($p[1]!=$q[1])) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                $params = $item['url'];
                unset($params[0]);
//                foreach ($params as $name => $value) {
//                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
//                        return false;
//                    }
//                }
            }

            return true;
        }

        return false;
    }

}
