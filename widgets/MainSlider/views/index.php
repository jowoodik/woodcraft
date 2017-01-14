<div class="wrapper grey">
    <div class="container">
        <div class="slider" id="main-slider">
            <?php foreach ($items as $key => $item) :?>
            <div class="slide">
                <div class="count"><?=$item['text']?></div>
                <a href = "<?= $item['link']?>"><div class="title"><?=$item['title']?></div></a>
                <?php if (is_file(Yii::getAlias('@webroot') . $item['image'])):?>
                <div class="image"><img src="<?=$item['image']?>"></div>
                <?php endif;?>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>