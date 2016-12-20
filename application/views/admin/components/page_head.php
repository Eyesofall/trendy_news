<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title><?php echo $meta_title; ?></title>

    <link rel="stylesheet" href="<?=site_url('../assets/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?=site_url('../assets/css/datepicker.css')?>">
    <link rel="stylesheet" href="<?=site_url('../assets/css/admin.css')?>">

    <script src="<?php echo site_url('../assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo site_url('../assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('../assets/js/bootstrap-datepicker.js'); ?>"></script>

    <?php if(isset($sortable) && $sortable === TRUE): ?>
        <script src="<?php echo site_url('../assets/js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo site_url('../assets/js/jquery.mjs.nestedSortable.js'); ?>"></script>
    <?php endif; ?>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

    <!-- TinyMCE -->
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
</head>
