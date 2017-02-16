<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%route_index}}".
 *
 * @property integer $route_id
 * @property string $path
 * @property integer $level
 * @property string $refs
 *
 * @property Route $route
 */
class BaseRouteIndex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route_index}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['refs'], 'string'],
            [['path'], 'string', 'max' => 255],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Route::className(), 'targetAttribute' => ['route_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'route_id' => 'Route ID',
            'path' => 'Path',
            'level' => 'Level',
            'refs' => 'Refs',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Route::className(), ['id' => 'route_id']);
    }
}
