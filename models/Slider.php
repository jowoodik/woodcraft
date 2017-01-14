<?php

namespace app\models;

class Slider extends BaseSlider
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status', 'sort', 'created_at', 'updated_at'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['link'], 'string', 'max' => 100],
        ];
    }
}