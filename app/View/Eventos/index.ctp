<?php
    echo $this->Html->script('calendar/fullcalendar.min', array('block'=>'customArchives'));
    echo $this->Html->script('calendar/fullcalendar', array('block'=>'customArchives'));
    echo $this->Html->css('fullcalendar');
?>
<? $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
<? $this->Html->scriptEnd(); ?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h4><div class="fs1" aria-hidden="true"></div>&nbsp;</h4>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Agenda&nbsp;</h4>
                <ul class="links">
                    <li>
                        <?php echo $this->Html->link(__('<i class="fa  fa-plus"></i>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape' => false)); ?>
                    </li>
            	</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id='calendar'></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>