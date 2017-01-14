<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 19.04.16
 * Time: 14:23
 */

namespace app\behaviors;

use dosamigos\transliterator\TransliteratorHelper;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\Inflector;

class AliasBehavior extends Behavior
{
    public $in_attribute = 'title';
    public $out_attribute = 'alias';
    public $translit = true;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'getAlias'
        ];
    }

    public function getAlias($event)
    {
        if (empty($this->owner->{$this->out_attribute})) {
            $this->owner->{$this->out_attribute} = $this->generateAlias($this->owner->{$this->in_attribute});
        } else {
            $this->owner->{$this->out_attribute} = $this->generateAlias($this->owner->{$this->out_attribute});
        }
    }

    private function generateAlias($alias)
    {
        $alias = $this->aliasify($alias);
        if ($this->checkUniqueAlias($alias)) {
            return $alias;
        } else {
            for ($suffix = 2; !$this->checkUniqueAlias($new_alias = $alias . '-' . $suffix); $suffix++) {
            }
            return $new_alias;
        }
    }

    private function aliasify($alias)
    {
        if ($this->translit) {
            return Inflector::slug(TransliteratorHelper::process($alias), '-', true);
        } else {
            return $this - alias($alias, '-', true);
        }
    }

    private function alias($string, $replacement = '-', $lowercase = true)
    {
        $string = preg_replace('/[^\p{L}\p{Nd}]+/u', $replacement, $string);
        $string = trim($string, $replacement);
        return $lowercase ? strtolower($string) : $string;
    }

    private function checkUniqueAlias($alias)
    {
        $pk = $this->owner->primaryKey();
        $pk = $pk[0];

        $condition = $this->out_attribute . ' = :out_attribute';
        $params = [':out_attribute' => $alias];
        if (!$this->owner->isNewRecord) {
            $condition .= ' and ' . $pk . ' != :pk';
            $params[':pk'] = $this->owner->{$pk};
        }

        return !$this->owner->find()
            ->where($condition, $params)
            ->one();
    }

}