<div class="indicadoresValores index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Valores'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo __('Indicadores Valores'); ?></h4>
					<ul class="links">
												<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
			<?php echo $this->Form->create('IndicadoresValor', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('indicador_item_id', array('class' => 'form-control', 'placeholder' => 'Indicador Item Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('ano', array('class' => 'form-control', 'placeholder' => 'Ano'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mes', array('class' => 'form-control', 'placeholder' => 'Mes'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('meta', array('class' => 'form-control', 'placeholder' => 'Meta'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('realizado', array('class' => 'form-control', 'placeholder' => 'Realizado'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
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