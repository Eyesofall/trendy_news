<!-- Main content -->
<div class="col-sm-7 main">
    <?php if($pagination): ?>
        <div class="pager"><?php echo $pagination; ?></div>
    <?php endif; ?>
    <div class="">
        <?php if (count($articles)): foreach ($articles as $article): ?>
            <article class=""><?php echo get_excerpt($article); ?><hr></article>
        <?php endforeach; endif; ?>
    </div>
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