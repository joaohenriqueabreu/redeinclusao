<div class="indicadoresItens index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Listagem</h4>
					<ul class="links">
					    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <?php echo $this->DataTable->render('IndicadoresItem', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$this->params->query)) ?>
                    </div>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->