<!-- Main content -->
<div class="col-sm-7 main">
        <article class="">
            <h2><?php echo e($article->title); ?></h2>
            <p class="pubdate"><?php echo e($article->pubdate); ?></p>
            <img class="img-thumbnail" src="<?php echo image_link($article->image_name); ?>">
            <?php echo $article->body; ?>
        </article>
</div>

<!-- Sidebar -->
<div class="col-sm-push-1 col-sm-4 sidebar">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Recent news</h2>
        </div>
        <div class="panel-body">
            <?php $this->load->view('sidebar'); ?>
        </div>
    </div>
</div>