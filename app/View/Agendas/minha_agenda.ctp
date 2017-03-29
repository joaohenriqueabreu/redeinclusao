<?php
    echo $this->Html->script('calendar/moment.min', array('block'=>'customArchives'));
    echo $this->Html->script('calendar/fullcalendar.min', array('block'=>'customArchives'));
    echo $this->Html->script('calendar/custom', array('block'=>'customArchives'));
    echo $this->Html->css('fullcalendar');
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
<?php echo $this->Html->scriptEnd(); ?>
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
                <h4>Minha Agenda&nbsp;</h4>
                <ul class="links">
                    <li>
                        <?php echo $this->Html->link(__('<i class="fa  fa-plus"></i>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape' => false)); ?>
                    </li>
            	</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <input type="hidden" value="<?=$this->Session->read('Auth.User.id')?>" id="usuario">
                <input type="hidden" value="0" id="origem">
                <div id='calendar'></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">

      </div>
  </div>
</div>
<!-- Modal HTML -->
<div id="myLargeModalLabel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

    </div>
  </div>
</div>
<!-- Modal HTML -->
<div id="subModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
      <div class="modal-content">

      </div>
  </div>
</div>