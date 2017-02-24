<?php
/**
 * @var \yii\web\View $this
 * @var \app\widgets\Elfinder\Elfinder $model
 */
use app\lib\Js;

?>
<?php Js::begin() ?>
<script>
    elFinder.prototype.i18.en.messages['cmdwatermark'] = 'Edit Image';
    elFinder.prototype._options.commands.push('watermark');
    elFinder.prototype.commands.watermark = function() {
        this.exec = function(hashes) {
            var file = this.files(hashes);

            console.log(file);
            var hash = file[0].hash;
            console.log(hash);

            var fm = this.fm;
            var url = fm.url(hash);

            console.log(url);
            $.ajax({
                type: "GET",
                url: '/admin/file-manager/watermark',
                data: {url: url},
                //dataType: 'json',
            });
//            var scope = angular.element("body").scope();
//            scope.openEditorEdit(url);
        };

        this.getstate = function() {
            //return 0 to enable, -1 to disable icon access
            return 0;
        }
    };

    var elf = $('#elfinder').elfinder({
        lang: 'ru',
        url: '/elfinder/connect',
        commands: [
            'info',
            'custom'
        ],
        uiOptions: {
            // toolbar configuration
            toolbar: [
                ['watermark']
            ]
        }


        }).elfinder('instance');
    
</script>
<?php Js::end() ?>

<!-- Element where elFinder will be created (REQUIRED) -->
<div id="elfinder"></div>
