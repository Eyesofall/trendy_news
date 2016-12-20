<?php $this->load->view('admin/components/page_head') ?>


<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('admin/dashboard')?>">
                <?php echo $meta_title; ?>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?=anchor('admin/user', 'users')?>
                </li>
                <li>
                    <?=anchor('admin/page', 'pages')?>
                </li>
                <li>
                    <?=anchor('admin/page/order', 'order pages')?>
                </li>
                <li>
                    <?=anchor('admin/article', 'articles')?>
                </li>
                <li>
                    <?=anchor('admin/audio', 'audios')?>
                </li>
                <li>
                    <?=anchor('admin/video', 'videos')?>
                </li>
                <li>
                    <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-log-out"></i> logout'); ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- sidebar -->
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="<?=site_url('admin/dashboard')?>">Overview <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li>
                    <?php echo anchor('admin/user/logout', '<i class="glyphicon glyphicon-log-out"></i> logout'); ?>
                </li>
                <li>
                    <?php echo anchor('/', '<i class="glyphicon glyphicon-home"></i> Go to Homepage', array('target' => '_blank')); ?>
                </li>
            </ul>

            <ul class="nav nav-sidebar">
                <li>
                    <?=anchor('admin/user', 'users')?>
                </li>
                <li>
                    <?=anchor('admin/page', 'pages')?>
                </li>
                <li>
                    <?=anchor('admin/page/order', 'order pages')?>
                </li>
                <li>
                    <?=anchor('admin/article', 'articles')?>
                </li>
                <li>
                    <?=anchor('admin/audio', 'audios')?>
                </li>
                <li>
                    <?=anchor('admin/video', 'videos')?>
                </li>
            </ul>
        </div>

        <!-- main content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>

            <!-- Main column -->
            <div>
                <?php $this->load->view($subview); // Subview is set in controller ?>
            </div>




        </div>
    </div>
</div>

<?php $this->load->view('admin/components/page_tail') ?>
