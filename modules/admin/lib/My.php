<?php
namespace app\modules\admin\lib;

use app\modules\admin\models\Categories;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class My
{
    public static function enteredSize($width, $height, $boxWidth, $boxHeight = null)
    {
        /* Если не задана высота рамки то рамка квадратная */
        $boxHeight = $boxHeight ? $boxHeight : $boxWidth;

        /* Если изображение меньше рамки */
        if ($width < $boxWidth && $height < $boxHeight) return [$width, $height];

        /* Отношения длин изображения к рамке */
        $widthRatio = $width / $boxWidth;
        $heightRatio = $height / $boxHeight;

        /* Вписываем по ширине иначе по высоте */
        if ($widthRatio > $heightRatio) {
            $height = round($height / $widthRatio);
            return [$boxWidth, $height];
        } else {
            $width = round($width / $heightRatio);
            return [$width, $boxHeight];
        }
    }

    public static function saveAndCloseBtn(Array $closePath = ['/admin/default/index'])
    {
        $html = '';
        $html .= Html::beginTag('div', ['class' => 'btn-toolbar']);
        $html .= Html::beginTag('div', ['class' => 'btn-group']);
        $html .= Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
        $html .= Html::submitButton('Сохранить и закрыть', ['name' => 'btn-close', 'value' => Url::to($closePath), 'class' => 'btn btn-default']);
        $html .= Html::endTag('div');
        $html .= Html::a('закрыть', $closePath, ['class' => 'btn btn-danger']);
        $html .= Html::endTag('div');

        return $html;
    }

    public static function buttons(Array $deletePath, Array $closePath = ['/admin/default/index'], $isNewRecord = false)
    {
        $html = Html::beginTag('div', ['class' => 'btn-toolbar']);

        $html .= Html::beginTag('div', ['class' => 'btn-group']);
        $html .= Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
        if (!$isNewRecord) $html .= Html::submitButton('Сохранить и закрыть', [
            'name' => 'btn-save-and-close',
            'value' => 1,
            'class' => 'btn btn-default',
        ]);
        $html .= Html::endTag('div');

        $html .= Html::a('закрыть', Url::to($closePath), ['class' => 'btn btn-danger']);
        if (!$isNewRecord) $html .= Html::a('удалить', $deletePath, [
            'class' => 'btn btn-default pull-right',
            'data-confirm' => 'Подтвердите удаление',
            'data-method' => 'post',
        ]);

        $html .= Html::endTag('div');

        return $html;
    }


    public static function sortAttr(&$dataProvider, $attribute, $index = null)
    {
        if (!$index) $index = $attribute;

        $dataProvider->sort->attributes[$attribute] = [
            'asc' => [$index => SORT_ASC],
            'desc' => [$index => SORT_DESC],
        ];
    }

    public static function removeImage($itemDir, $name)
    {
        $thumbs = glob($itemDir . '/thumbs/*');
        foreach ($thumbs as $thumb) {
            if (is_file($thumb . '/' . $name)) {
                unlink($thumb . '/' . $name);
            }
        }

        if (is_file($itemDir . '/' . $name)) {
            unlink($itemDir . '/' . $name);
        }

        $count = count(glob($itemDir . '/*'));

        /** Осталась последняя папка thumbs */
        if ($count <= 1) {
            self::removeDir($itemDir);
        }

        return true;
    }

    public static function removeDir($dir)
    {
        if ($objects = glob($dir . "/*")) {
            foreach ($objects as $obj) {
                is_dir($obj) ? self::removeDir($obj) : unlink($obj);
            }
        }
        if (is_dir($dir)) {
            rmdir($dir);
        }

        return true;
    }

    public static function thumb($src = null)
    {
        $path = Yii::getAlias('@webroot') . $src;
        return is_file($path) ? $src : '/images/no-thumb.png';
    }

    public static function uniqueName($path, $extension = 'jpg', $length = 8)
    {
        $i = 0;
        while (true) {
            $name = Yii::$app->security->generateRandomString($length) . '.' . $extension;

            if (is_file($path . '/' . $name)) {
                if ($i > 10) break;
            } else {
                return $name;
            }

            $i++;
        }

        return false;
    }

    public static function checkDir($path)
    {
        if (is_dir($path)) return true;
        mkdir($path);
        chmod($path, 0777);
        return true;
    }

    /**
     * @param $file \yii\web\UploadedFile
     * @param array $whiteList array
     * @return bool
     */
    public static function validateImageFile($file, $whiteList = ['jpg', 'jpeg', 'png', 'gif', 'bmp'])
    {
        return in_array($file->extension, $whiteList);
    }

    public static function dateTime($timestamp = null)
    {
        if ($timestamp) return date('Y-m-d H:i:s', $timestamp);
        return date('Y-m-d H:i:s');
    }

    /**
     * @return null|\app\models\User
     */
    public static function identify()
    {
        return Yii::$app->user->identity;
    }

    public static function cleanDir($path)
    {
        $path = Yii::getAlias($path);
        if (!is_dir($path)) {
            mkdir($path);
        }
        $files = glob($path . '/*');
        foreach ($files as $file) {
            @unlink($file);
        }
    }
  
}