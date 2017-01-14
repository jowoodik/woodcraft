<div class="bordered">
    <div class="row">
        <?php foreach ($items as $item):?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <?php if (is_file(Yii::getAlias('@webroot') . $item['image'])):?>
            <div class="image">
                <img src="<?php echo $item['image']?>">
            </div>
             <?php endif;?>
            <h3 class="blue"><a href="<?php echo $item['path'] ?>"><?php echo $item['item_title']?></a></h3>

            <p><a href="<?php echo $item['category_path']?>"><?php echo $item['category_title']?></a></p>

            <?php if ($item['price']){?>
            <div class="price"><?php echo $item['price']?></div>
            <?php }?>
        </div>
        <?php endforeach;?>
    </div>
</div>