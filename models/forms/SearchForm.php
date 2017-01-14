<?php
namespace app\models\forms;


use Yii;
use yii\base\Model;

class SearchForm extends Model
{
    public $text;

    public function rules ()
    {
        return [
            [['text',], 'string', 'length' => [3, 255]],
            [['text',], 'required'],
        ];
    }
}
