<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */

use app\assets\AppAsset;
use app\assets\FontAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


AppAsset::register($this);
//FontAsset::register($this);

$bodyClass = ArrayHelper::getValue($this, 'params.bodyClass');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html;">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="yandex-verification" content="6706d76e831dd509" />
    <link href="https://fonts.googleapis.com/css?family=Scada" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body<?/*= $bodyClass ? ' class="' . $bodyClass . '"' : null */?>>
<div class="wrapper">

    <?php $this->beginBody() ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter42925179 = new Ya.Metrika({
                        id:42925179,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/42925179" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <?= $this->render('_header') ?>

    <?php if (isset($this->params['contentOnly'])): ?>
        <div id="content" class="content">
            <?= $content ?>
        </div>
    <?php else: ?>
        <div id="content" class="content">

            <div class="container">
                <?= $content ?>
            </div>
        </div>
    <?php endif ?>

    <?= $this->render('_footer') ?>

    <?= $this->render('_yandex')?>

    <?php $this->endBody() ?>
</div>
</body>
</html>
<?php $this->endPage() ?>
