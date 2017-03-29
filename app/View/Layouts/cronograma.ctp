<?
    $link = '';
    if(isset($_GET['projeto'])){
      $link = '?projeto='.$_GET['projeto'];
    }
    if(isset($_GET['cliente'])){
      $link = '?cliente='.$_GET['cliente'];
    }
?>
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
        echo $this->Html->script('charts/dhtmlxgantt');
        echo $this->Html->script('charts/locale_pt');
        echo $this->Html->script('charts/codebase/ext/dhtmlxgantt_marker');
        echo $this->Html->css('charts/dhtmlxgantt');
        echo $this->Html->script('jquery-1.11.1.min');
        echo $this->Html->css('bootstrap/css/bootstrap.min');
        echo $this->Html->css('bootstrap/css/bootstrap-theme.min');
        echo $this->Html->script('bootstrap/bootstrap.min');
        echo $this->Html->css('sb-admin-2');
    ?>

	<style type="text/css">
  		.weekend{ background: #f4f7f4 !important;}
		.gantt_selected .weekend{ background:#FFF3A1 !important; }
		.well {
			text-align: right;
		}

		.container-fluid .row {
			margin-bottom: 10px;
		}
		.container-fluid .gantt_wrapper {
			height: 700px;
			width: 100%;
		}
		.gantt_container {
			border-radius: 4px;
		}
		.gantt_grid_scale { background-color: transparent; }
		.gantt_hor_scroll { margin-bottom: 1px; }


        .gantt_task_progress{
        	text-align:left;
        	padding-left:10px;
            box-sizing: border-box;
        	color:white;
        	font-weight: bold;
        }
    	.status_line{
    		background-color: #0ca30a;
    	}
	</style>
</head>
<body>
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Cronograma</h4>
                        <ul class="links">
                            <li><a href="javascript:window.close();" data-original-title="" title=""><i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Fechar</a> </li>
            			</ul>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="gantt_wrapper panel" id="gantt_here"></div>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
     <!-- /.container-fluid -->
    <script type="text/javascript">
        	gantt.config.columns = [
        		{name:"text",       label:"Projeto",  width:"*", tree:true },
        		{name:"start_time",   label:"Início",  template:function(obj){
        			return gantt.templates.date_grid(obj.start_date);
        		}, align: "center", width:70 },
        		{name:"duration",   label:"Duração", align:"center", width:70}
        	];
    		gantt.templates.progress_text = function(start, end, task){
    			return "<span style='text-align:left;'>"+Math.round(task.progress*100)+ "% </span>";
    		};
          	var date_to_str = gantt.date.date_to_str(gantt.config.task_date);
    	    var today = new Date(<?=date('Y')?>, <?=date('m')?>-1, <?=date('d')?>);

          	gantt.addMarker({
          		start_date: today,
          		css: "today",
          		text: "Hoje",
          		title:"Today: "+ date_to_str(today)
          	});
        	gantt.config.grid_width = 400;
        	gantt.config.date_grid = "%d/%m/%Y";
        	gantt.config.scale_height  = 30;
    		gantt.init("gantt_here");
    		gantt.load("<?=$this->base?>/clientes/datasCronograma/<?=$link?>", "json");
    </script>
</body>
</html>
