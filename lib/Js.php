<?php

namespace app\lib;


use /** @noinspection PhpMethodOrClassCallIsNotCaseSensitiveInspection */
    Yii;

class Js
{
    public static function begin()
    {
        ob_start();
    }

    public static function end()
    {
        $js = ob_get_contents();
        ob_end_clean();
        $js = trim($js);
        $js = ltrim($js, '<script>');
        $js = rtrim($js, '</script>');
        $js = trim($js,"\n\r");
        Yii::$app->view->registerJs($js);
    }
}
