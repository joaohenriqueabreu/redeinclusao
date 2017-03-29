<!DOCTYPE html>
<html lang="en">

<head>

    <?php echo $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title_for_layout; ?></title>
    <?php
        //Bootstrap CSS
        echo $this->Html->css('bootstrap/css/bootstrap');
        //jQuery UI CSS
        echo $this->Html->css('jquery/jquery-ui');
        //MetisMenu CSS
        echo $this->Html->css('metisMenu/metisMenu.min');
        //DataTables CSS
        echo $this->Html->css('datatables/dataTables.bootstrap');
        //DataTables Responsive
        echo $this->Html->css('datatables/dataTables.responsive');
        //Custom CSS
        echo $this->Html->css('sb-admin-2');
        //Custom Fonts
        echo $this->Html->css('font-awesome/css/font-awesome.min');
        //Css das views
        echo $this->fetch('css');
    ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=$this->base?>"><img src="<?=$this->base?>/img/logorede.png" width="80%" /></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 <!-- /.dropdown-alerts -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> <?=$_SESSION['Auth']['User']['nome']?></a></li>
                        <li><a href="<?=$this->base?>/configuracao"><i class="fa fa-gear fa-fw"></i> Configuração</a></li>
                        <li class="divider"></li>
                        <li><a href="<?=$this->base?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->

        <div class="container-fluid">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

        <!-- /#page-wrapper -->
        <!-- Static Modal Start -->
        <div class="modal fade bs-example-modal-sm" id="processing-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="text-center">
                            <img src="<?=$this->base?>/img/loading.gif" class="icon" />
                            <h4>Processando...</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Modal End -->
    </div>
        <!-- Static Modal Start -->
        <div class="modal fade modal-fullscreen force-fullscreen" id="modalFull" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- Static Modal End -->
    <!-- /#wrapper -->

    <script>
        var urlBase = '<?=$this->base?>';
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?=$this->base?>/js/html5shiv.js"></script>
        <script src="<?=$this->base?>/js/respond.min.js"></script>
    <![endif]-->
    <?php
        //jQuery
        echo $this->Html->script('jquery');

        //jQuery UI
        echo $this->Html->script('jquery-ui');

        //Bootbox Core JavaScript
        echo $this->Html->script('bootstrap/bootstrap.min');

        //Bootbox Core JavaScript
        echo $this->Html->script('bootstrap/bootbox');

        //Metis Menu Plugin JavaScript
        echo $this->Html->script('metisMenu/metisMenu.min');

        //DataTables JavaScript
        echo $this->Html->script('datatables/jquery.dataTables.min');
        echo $this->Html->script('datatables/dataTables.bootstrap.min');

        echo $this->Html->script('bootstrap-filestyle');
        echo $this->Html->script('global');

        //Custom Theme JavaScript
        echo $this->Html->script('sb-admin-2');

        //Custom JavaScript
        echo $this->Html->script('scripts');

        //Java Scripts das views
        echo $this->fetch('customArchives');
        echo $this->fetch('codesJavaScripts');
        echo $this->fetch('dataTableSettings');
        echo $this->fetch('script');
    ?>
</body>
</html>