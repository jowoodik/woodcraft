<?php

namespace app\modules\admin\widgets\tinymce;

/**
 * Created by PhpStorm.
 * User: mt4
 * Date: 31.03.16
 * Time: 15:42
 */
use mihaildev\elfinder\AssetsCallBack;
use yii\bootstrap\InputWidget;
use yii\bootstrap\Html;
use app\modules\admin\assets\TinyMceAsset;

class TinyMce extends InputWidget
{

    public $language;
    public $clientOptions = [];
    public $triggerSaveOnBeforeValidateForm = true;

    public function run()
    {
        if ($this->hasModel()) {
            echo Html::activeTextarea($this->model, $this->attribute, $this->options);
        } else {
            echo Html::textarea($this->name, $this->value, $this->options);
        }
        $this->registerClientScript();
    }

    protected function registerClientScript()
    {
        $view = $this->getView();

        TinyMceAsset::register($view);
        AssetsCallBack::register($view);

        $elFinderUrl = \mihaildev\elfinder\ElFinder::getManagerUrl('elfinder',
            ['callback' => 'my_return_id']);
        $elFinderUrl = \yii\helpers\Json::encode($elFinderUrl);

        $js = <<<JS

mihaildev.elFinder.register('my_return_id', function(URL){
    window.tinymce.activeEditor.windowManager.getParams().setUrl(URL);
    var t = window.tinymce.activeEditor.windowManager.windows[0];
    // t.find('#src').fire('change');
    window.tinymce.activeEditor.windowManager.close();
});

function elFinderBrowser (field_name, url, type, win) {
  tinymce.activeEditor.windowManager.open({
    file: $elFinderUrl,
    title: 'elFinder 2.0',
    width: 900,
    height: 450,
    resizable: 'yes'
  }, {
    setUrl: function (url) {
      // console.log(url.url);
      win.document.getElementById(field_name).value = url.url;
    }
  });
  return false;
}

tinymce.init({
  selector: 'textarea',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css',
    '/css/site.css'
  ],
  extended_valid_elements: 'span[*],script[*]',
  language: 'ru',
  file_browser_callback: elFinderBrowser,
  // file_browser_callback_types: "image"
});

JS;
        $view->registerJs($js);

    }

}