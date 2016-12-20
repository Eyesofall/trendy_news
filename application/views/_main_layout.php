<?php $this->load->view('components/page_head'); ?>

    <body>


<div class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('/')?>">
                <?= config_item('site_name') ?>
            </a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <div class="row">

            <?php echo get_menu($menu); ?>

            </div>
        </div>


    </div>
</div>



<div id="top" class="container">
    <div class="row">
        <?php $this->load->view('templates/' . $subview); ?>
    </div>
</div>

    

<?php $this->load->view('components/page_tail'); ?>