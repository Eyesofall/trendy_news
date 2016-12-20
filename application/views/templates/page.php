<!-- Main content -->
<div class="col-sm-7 main">
            <article>
                <h2><?php echo e($page->title); ?></h2>
                <?php echo $page->body; ?>
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