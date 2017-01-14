<?php

/**
 */

namespace app\behaviors;


use app\modules\admin\lib\My;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class DateTimeBehavior extends Behavior
{
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
        ];
    }

    public function beforeInsert()
    {
        $this->owner['created_at'] = My::dateTime();
    }

    public function beforeUpdate()
    {
        $this->owner['updated_at'] = My::dateTime();
    }
}
