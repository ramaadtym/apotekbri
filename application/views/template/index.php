<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

        <title>Klinik Brimedika Bandung</title>
        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo base_url();?> assets/img/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url();?>assets/img/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/img/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?php echo base_url();?>assets/css/codebase.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
    <?php
        echo $konten;
    ?>
     <!-- Codebase Core JS -->
        <script src="<?php echo base_url();?>assets/js/core/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/jquery.appear.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/jquery.countTo.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/core/js.cookie.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/codebase.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/op_auth_signin.js"></script>
    </body>
</html>