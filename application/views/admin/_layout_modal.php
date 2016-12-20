<?php $this->load->view('admin/components/page_head') ?>


    <body style="background: #555;">


<div class="modal modal-dialog show" role="dialog">


    <?php $this->load->view($subview); // Subview is set in controller ?>



</div>




<?php $this->load->view('admin/components/page_tail') ?>