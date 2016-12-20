
<!--Carousel-->
<?php if (count($articles)): ?>
<div class="container">
    <div id="caro1" class="carousel slide" data-ride="carousel" style=" width: ;">
        <ol class="carousel-indicators">
            <li data-target="#caro1" data-slide-to="0" class="active"></li>
            <li data-target="#caro1" data-slide-to="1"></li>
            <li data-target="#caro1" data-slide-to="2"></li>
            <li data-target="#caro1" data-slide-to="3"></li>
            <li data-target="#caro1" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">
            <?php $i = 1; ?>
            <?php foreach ($articles as $article): ?>
                <?php $item_class = ($i == 1) ? 'item active' : 'item'; ?>
            <div class="<?=$item_class ?>">
                <a href="<?= article_link($article); ?>">
                <img src="<?= image_link($article->image_name); ?>">
                <div class="carousel-caption">
                    <h3><?= e($article->title); ?></h3>
                    <p><?= e(limit_to_numwords(strip_tags($article->body), 20)); ?></p>
                </a>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
        </div>

        <a href="#caro1" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a href="#caro1" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div>
</div>
<?php  endif; ?>