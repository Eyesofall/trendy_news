<?php $this->load->view('carousel'); ?>
<!-- Main content -->
<div class="col-sm-8 main">
    <div class="row">
        <div class="col-md-12"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
        <div class="col-md-6"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6"><?php if(isset($articles[3])) echo get_excerpt($articles[3]); ?></div>
        <div class="col-md-6"><?php if(isset($articles[4])) echo get_excerpt($articles[4]); ?></div>
    </div>
</div>

<!-- Sidebar -->
<div class="col-sm-4 sidebar">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Recent news</h2>
        </div>
        <div class="panel-body">
<!--            --><?php //$recent_news = array_slice($recent_news, 5); ?>
            <?php $this->load->view('sidebar'); ?>
        </div>
    </div>
</div>