<?php

namespace app\modules\admin\widgets\alias;

use yii\helpers\Html;
use yii\widgets\InputWidget;


/**
 * Created by PhpStorm.
 * User: Leman
 * Date: 22.09.2015
 * Time: 17:35
 */
class GenerateAlias extends InputWidget
{
    public $depends;

    public function run()
    {
        $formName = $this->model->formName();
        $depends = "$('input[name=\"{$formName}[{$this->depends}]\"]')";
        $alias = "$('input[name=\"{$formName}[{$this->attribute}]\"]')";
        $js = <<<JS
{$alias}.on('blur change keyup', function() {
    var value = $(this).val();
    if (!value){
        $(this).removeAttr('data-pre-load');
    } else {
        $(this).attr('data-pre-load', value);
    }
});
{$depends}.on('focus blur change keyup', function() {
    var value = $(this).val();
    var jAlias = {$alias};
    if (!jAlias.attr('data-pre-load')){
        jAlias.val(toLink(value));
    }
})
JS;
        $this->view->registerJs($js);

        $value = $this->model[$this->attribute];

        return Html::activeInput('text', $this->model, $this->attribute, [
            'class' => 'form-control',
            'data' => [
                'pre-load' => $value,
            ]
        ]);
    }

    public function init()
    {
        parent::init();
        $js = <<<JS
function toLink(str) {
    var space = '-';
    str = str.toLowerCase();
    var transl = {
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh',
        'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
        'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
        'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu', 'я': 'ya'
    };
    var link = '';
    for (var i = 0; i < str.length; i++) {
        if (/[а-яё]/.test(str.charAt(i))) { //если текущий символ - русская буква, то меняем его
            link += transl[str.charAt(i)];
        } else if (/[a-z0-9]/.test(str.charAt(i))) {
            link += str.charAt(i); //если текущий символ - английская буква или цифра, то оставляем как есть
        } else {
            if (link.slice(-1) !== space) link += space; // если не то и не другое то вставляем space
        }
    }
    return link.replace(/-$/, '');
}
JS;
        $this->view->registerJs($js);
    }
}
