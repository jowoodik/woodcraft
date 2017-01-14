<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * @property string user_company
 * @property string user_telephone
 * @property string outer_length
 * @property string build_foundation
 * @property string outer_width
 * @property string inner_length
 * @property string build_appointment
 * @property string inner_width
 * @property string inner_height
 * @property string outer_height
 * @property string file_route
 */
class Applications extends BaseApplications
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'Имя',
            'user_email' => 'Email',
            'user_telephone' => 'Телефон',
            'user_company' => 'Компания',
            'build_appointment' => 'Назначение здания',
            'outer_length' => 'Внешняя длинна',
            'outer_width' => 'Внешняя ширина',
            'outer_height' => 'Внешняя высота',
            'inner_length' => 'Внутренняя длинна',
            'inner_width' => 'Внутренняя ширина',
            'inner_height' => 'Внутренняя высота',
            'build_foundation' => 'Фундамент здания',
            'file_route' => 'Файл'
        ];
    }

    public function rules()
    {
        return [
            [['user_name', 'user_telephone', 'file_route'], 'required'],
            [['file_route'], 'file', 'extensions' => 'doc, docx, pdf, txt, png, jpeg, jpg, odt', 'maxSize' => 52428800, 'tooBig' => 'Максимальный размер файла не должен превышать 50мб'],
            [['user_name', 'user_email', 'user_telephone', 'user_company', 'build_appointment', 'build_foundation', 'outer_length', 'outer_width', 'outer_height', 'inner_length', 'inner_width', 'inner_height'], 'default'],
            ['user_email', 'email'],
        ];
    }

    public function contact()
    {
        $body = <<<HTML
<table border="1">
  <tr style="text-align: center; font-weight: 600;">
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Имя</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Компания</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Телефон</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Наименование организации</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">E-mail</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Внешние параметры модульного здание (ДхШхВ)</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Внутренние параметры модульного здание (ДхШхВ)</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Фундамент здания</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Назначение здания</td>
  </tr>
  <tr>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_name</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_company</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_telephone</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_company</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_email</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->outer_length x $this->outer_width x $this->outer_height</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->inner_length x $this->inner_width x $this->inner_height</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->build_foundation</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->build_appointment</td>
  </tr>
</table>
HTML;

        $adminEmail = ArrayHelper::getValue(Yii::$app->params, 'adminEmail');
        $adminName = ArrayHelper::getValue(Yii::$app->params, 'adminName');
        $siteName = ArrayHelper::getValue(Yii::$app->params, 'siteName');

        $path = Yii::getAlias('@webroot/');

        if ($this->file_route) {
            $file = $path . $this->file_route;
        }

        if (isset($file)) {
            Yii::$app->mailer->compose()
                ->setTo($adminEmail)
                ->setFrom([$adminEmail => $adminName])
                ->setSubject('Заявка с сайта ' . $siteName)
                ->setHtmlBody(Html::decode($body))
                ->attach($file, ['fileName' => 'Пользовательский файл: ' . $this->user_name])
                ->send();
        } else {
            Yii::$app->mailer->compose()
                ->setTo($adminEmail)
                ->setFrom([$adminEmail => $adminName])
                ->setSubject('Заявка с сайта ' . $siteName)
                ->setHtmlBody(Html::decode($body))
                ->send();
        }

        unset($_POST);
        unset($_SESSION);
        return true;
    }
}