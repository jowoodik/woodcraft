<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%gallery_item}}".
 *
 * @property integer $id
 * @property integer $gallery_id
 * @property string $name
 * @property string $image
 * @property boolean $is_active
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property EntityGallery $gallery
 */
class BaseGalleryItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%gallery_item}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gallery_id', 'created_at', 'updated_at'], 'integer'],
            [['is_active'], 'boolean'],
            [['name', 'image'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => EntityGallery::className(), 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gallery_id' => 'Gallery ID',
            'name' => 'Name',
            'image' => 'Image',
            'is_active' => 'Is Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGallery()
    {
        return $this->hasOne(EntityGallery::className(), ['id' => 'gallery_id']);
    }
}
