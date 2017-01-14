<?php

namespace app\lib;

use Imagine\Image\Box;
use Imagine\Image\ManipulatorInterface;
use Yii;
use yii\imagine\Image;

class My
{
    
    public static function getThumb($src, $size='')
    {
        switch ($size){
            case 'partners':
                $width = 160;
                $height = 44;
                break;
            case 'slider':
                $width = 2044;
                $height = 475;
                break;
            case 'about':
                $width = 255;
                $height = 275;
                break;
            case 'news':
                $width = 555;
                $height = 400;
                break;
            case 'gallery':
                $width = 270;
                $height = 350;
                break;
            case 'news-preview':
                $width = 270;
                $height = 185;
                break;
            default:
                $width = 300;
                $height = 400;
        }

        $height = $height ?: $width;

        $webRoot = Yii::getAlias('@webroot');
        $web = Yii::getAlias('@web');


        $thumbPath = "/thumbs$src";

        if (!is_file($webRoot . $thumbPath)) {
            if (is_file($webRoot . $src)) {
                /** Создание рекурсивного дерева папок для миниатюры */
                $pathInfo = pathinfo($src);
                $dirs = explode('/', trim($pathInfo['dirname'], '/'));
                $dirPath = '';
                foreach ($dirs as $dir) {
                    $dirPath .= "/$dir";
                    $path = "$webRoot/thumbs$dirPath";
                    //dd($path);

                    if (!is_dir($path)) {
                        mkdir($path);
                        chmod($path, 0777);
                    }
                }

                $size = new Box($width, $height);

                Image::getImagine()
                    ->open($webRoot . $src)
                    ->thumbnail($size, ManipulatorInterface::THUMBNAIL_OUTBOUND)
                    ->save($webRoot . $thumbPath);

//                chmod($webRoot . $thumbPath);

                /*
                Image::thumbnail($src, $width, $height)
                    ->save(Yii::getAlias($path), ['quality' => 50]);*/
//                Image($webRoot.$src , 120, 120)
//                    ->save(Yii::getAlias($webRoot.$path), ['quality' => 50]);


            } else {
                return '/uploads/no-image.jpg';
            }
        }

        return $web . $thumbPath;

//        return is_file($path) ? $src : '/images/no-thumb.png';
    }
}
