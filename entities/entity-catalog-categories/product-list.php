<div class="col-md-4 col-sm-6 item">
    <?php if (!empty($route['image'])) { ?>
        <a href="<?= $route['path'] ?>">
            <img src="/<?= $route['image'] . '-preview.jpg' ?>" class="img-responsive my-thumb"/>
        </a>
    <?php } else { ?>
        <a href="<?= $route['path'] ?>">
            <img src="/uploads/no-image.jpg" class="my-thumb"/>
        </a>
    <?php } ?>
    <div class="dark-block">
        <?= $route['title'] ?>
    </div>
</div>