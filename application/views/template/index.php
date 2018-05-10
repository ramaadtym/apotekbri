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
        <link rel="stylesheet" href="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Codebase framework -->
        <link rel="stylesheet" id="css-main" href="<?php echo base_url();?>assets/css/codebase.css">

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
        <script src="<?php echo base_url();?>assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="<?php echo base_url();?>assets/js/pages/op_auth_signin.js"></script>
        <script src="<?php echo base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/pages/be_tables_datatables.js"></script>
    </body>
</html>
<script type="text/javascript">
      $(function(){
    $("#qty").on("input",function(){
        var qty = $("#qty").val();
        var hrg = $("#hrg").val();
        $('#tot').val(qty*hrg);
    });

  });
      $(function(){
          $("#hrg2").on("input",function(){
              var qty = $("#qty2").val();
              var hrg = $("#hrg2").val();
              $('#tot2').val(qty*hrg);
          });

      });

</script>