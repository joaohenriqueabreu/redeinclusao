<div class="unidadesMedidas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Unidades Medidas'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4><?php echo __('Unidades Medidas'); ?></h4>
					<ul class="links">
					    <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $this->Form->value('UnidadesMedida.id')), array('escape' => false), __('Deseja remover o registro # %s?', $this->Form->value('UnidadesMedida.nome'))); ?></li>
						<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
			        <?php echo $this->Form->create('UnidadesMedida', array('role' => 'form')); ?>
					<?php echo $this->Form->input('id');?>
                    <div class="row no-gutter">
	    	            <div class="col-lg-8">
            				<div class="form-group">
            					<?php echo $this->Form->input('nome', array('class' => 'form-control'));?>
            				</div>
        				</div>
	    	            <div class="col-lg-4">
            				<div class="form-group">
            					<?php echo $this->Form->input('tipo_valor', array('class' => 'form-control', 'empty' => 'Selecione', 'options' => $this->Util->tiposValores()));?>
            				</div>
        				</div>
        			</div>
				    <div class="form-group">
					    <?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
				    </div>
			        <?php echo $this->Form->end() ?>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->