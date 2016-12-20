<!-- Main content -->
<div class="col-sm-7 main">


    <?php if(count($audios)): foreach($audios as $audio): ?>
        <div class="panel">
            <div class="panel panel-body">
                <div class="lead">
                    <b><?php echo e($audio->title); ?> - </b>
                    <i>By: <?php echo e($audio->artist); ?></i>
                </div>
            <audio controls>
                <source src="<?php echo audio_link($audio->slug); ?>" type="audio/mpeg" />
                An html5-capable browser is required to play this audio.
            </audio></div>
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