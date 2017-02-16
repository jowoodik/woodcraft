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
            'build_foundation' => 'Ваш комментарий',
            'file_route' => 'Товар',
            'outer_length' => 'Цена товара'
        ];
    }

    public function rules()
    {
        return [
            [['user_name', 'user_telephone', 'user_email'], 'required'],
            [['user_name', 'user_email', 'user_telephone', 'build_foundation', 'file_route', 'outer_length'], 'default'],
            [['user_name', 'user_telephone', 'build_foundation', 'file_route', 'outer_length'], 'string'],
            ['user_email', 'email'],
        ];
    }

    public function contact()
    {
        $body = <<<HTML
<table border="1">
  <tr style="text-align: center; font-weight: 600;">
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Имя</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Телефон</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">E-mail</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Комментарий</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Товар</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">Цена товара</td>
  </tr>
  <tr>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_name</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_telephone</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->user_email</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->build_foundation</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->file_route</td>
    <td style="padding-left: 0.5em; padding-right: 0.5em;">$this->outer_length</td>
  </tr>
</table>
HTML;

        $adminEmail = ArrayHelper::getValue(Yii::$app->params, 'adminEmail');
        $adminName = ArrayHelper::getValue(Yii::$app->params, 'adminName');
        $siteName = ArrayHelper::getValue(Yii::$app->params, 'siteName');

        Yii::$app->mailer->compose()
            ->setTo($adminEmail)
            ->setFrom([$adminEmail => $adminName])
            ->setSubject('Заявка с сайта ' . $siteName)
            ->setHtmlBody(Html::decode($body))
            ->send();

        unset($_POST);
        unset($_SESSION);
        return true;
    }
}