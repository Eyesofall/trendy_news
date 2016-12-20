
<!-- Main content -->
<div class="col-sm-7 main">


    <?php if(count($videos)): foreach($videos as $video): ?>
        <div class="panel">
            <div class="panel panel-body">
                <div class="lead">
                    <b><?php echo e($video->title); ?> </b>
                </div>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" height="476" src="https://www.youtube.com/embed/<?php echo $video->youtube_id ?>" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>


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