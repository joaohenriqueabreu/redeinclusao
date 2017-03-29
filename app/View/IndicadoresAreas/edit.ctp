<div class="indicadoresAreas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Areas'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo __('Indicadores Areas'); ?></h4>
					<ul class="links">
												<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $this->Form->value('IndicadoresArea.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('IndicadoresArea.id'))); ?></li>
												<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
			<?php echo $this->Form->create('IndicadoresArea', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ativo', array('class' => 'form-control', 'placeholder' => 'Ativo'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

                
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->