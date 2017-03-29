<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title_for_layout; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=$this->base?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?=$this->base?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=$this->base?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=$this->base?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?=$this->base?>/js/html5shiv.js"></script>
        <script src="<?=$this->base?>/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container">
      <?php
 	    echo $this->fetch('content');
      ?>
   </div>
    <script>
        var urlBase = '<?=$this->base?>';
    </script>

    <!-- jQuery -->
    <script src="<?=$this->base?>/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=$this->base?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Bootbox Core JavaScript -->
    <script src="<?=$this->base?>/bower_components/bootstrap/dist/js/bootbox.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=$this->base?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=$this->base?>/dist/js/sb-admin-2.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?=$this->base?>/js/autenticacao.js"></script>

</body>

</html>