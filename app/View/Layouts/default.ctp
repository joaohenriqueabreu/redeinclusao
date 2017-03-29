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
        <style>

        </style>
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

                    <!-- <a role="button" data-toggle="offcanvas" class="navbar-btn sidebar-toggle" href="#">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a> -->

                    <!-- <a class="navbar-brand" href="<?= $this->base ?>"><img src="<?= $this->base ?>/img/logorede.png" width="80%" /></a> -->
                    <a class="navbar-brand" href="/clientes/view/<?= $this->Session->read('CID') ?>"><img src="<?= $this->base ?>/img/logorede.png" width="80%" /></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <!-- /.
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <strong>John Smith</strong>
                                        <span class="pull-right text-muted">
                                            <em>Yesterday</em>
                                        </span>
                                    </div>
                                    <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>Read All Messages</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- /.dropdown-messages -->
                    <!-- /.dropdown -->
                    <!-- /.
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks">
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 1</strong>
                                            <span class="pull-right text-muted">40% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 2</strong>
                                            <span class="pull-right text-muted">20% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 3</strong>
                                            <span class="pull-right text-muted">60% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <p>
                                            <strong>Task 4</strong>
                                            <span class="pull-right text-muted">80% Complete</span>
                                        </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">80% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Tasks</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                    <!-- /.dropdown-tasks -->
                    <!-- /.dropdown -->
                    <!-- /.
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    -->
                    <!-- /.dropdown-alerts -->
                    <!-- /.dropdown -->
                    <li>
                        <h5>
                            <?php if (date('H') < 12) : ?>
                                Bom dia
                            <?php elseif (date('H') > 12 && date('H') < 18) : ?>
                                Boa tarde
                            <?php else : ?>
                                Boa noite
                            <?php endif; ?>
                            , <?= $logado['nome'] ?>!
                        </h5>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!--<li><a href="#"><i class="fa fa-user fa-fw"></i> <?= $_SESSION['Auth']['User']['nome'] ?></a></li>-->
                            <li>
                                <a href="<?= $this->base ?>/configuracao">
                                    <i class="fa fa-gear fa-fw"></i>
                                    Perfil de <?= $_SESSION['Auth']['User']['nome'] ?>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?= $this->base ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <!--<div class="navbar-default sidebar" role="navigation">-->
                <div class="navbar-default sidebar collapse-left" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <!-- <?php echo $this->Menu->generateMenu(); ?> -->
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper" class="strech">
                <div class="container-fluid">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
            <!-- Static Modal Start -->
            <div class="modal fade bs-example-modal-sm" id="processing-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="<?= $this->base ?>/img/loading.gif" class="icon" />
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
            var urlBase = '<?= $this->base ?>';
        </script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="<?= $this->base ?>/js/html5shiv.js"></script>
            <script src="<?= $this->base ?>/js/respond.min.js"></script>
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
        <script>
            $(function () {
                $('.navbar-nav').on('click', function () {
                    if ($('.navbar-header .navbar-toggle').css('display') != 'none') {
                        $(".navbar-header .navbar-toggle").trigger("click");
                    }
                });
            });
        </script>
    </body>
</html>