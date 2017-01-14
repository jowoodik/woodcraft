<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 22.03.16
 * Time: 12:21
 */

namespace app\modules\admin\widgets\editor;


use mihaildev\elfinder\ElFinder;
use yii\bootstrap\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class TinyMce extends InputWidget
{
    public function init()
    {
        $this->view->registerAssetBundle(TinyMceLangAsset::className());
    }

    public function run()
    {
        $id = $this->getId();

        $elFinderUrl = ElFinder::getManagerUrl('elfinder', ['callback' => 'my_return_id']);
        $elFinderUrl = Json::encode($elFinderUrl);

        $js = <<<JS
//mihaildev.elFinder.register('my_return_id', function(URL) {
   //window.tinymce.activeEditor.windowManager.getParams().setUrl(URL);
   // window.tinymce.activeEditor.windowManager.close();
//});

function elFinderBrowser (field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
        file: $elFinderUrl,
        title: 'elFinder 2.0',
        width: 900,
        height: 450,
        resizable: 'yes'
    }, {
    setUrl: function (url) {
        console.log(url.url);
        win.document.getElementById(field_name).value = url.url;
    }
    });
    return false;
}

tinymce.init({
  selector: '#$id',
  height: 500,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code'
  ],
  extended_valid_elements : 'iframe[src]',
  toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  //language_url: "/js/tinymce/ru.js",            
  file_browser_callback: elFinderBrowser,

});
JS;

        $this->view->registerJs($js);

        return Html::activeTextarea($this->model, $this->attribute, [
            'id' => $id,
        ]);
    }
}
