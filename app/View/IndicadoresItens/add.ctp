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
                    <h4><?php echo __('Adicionar'); ?></h4>
					<ul class="links">
					    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
			        <?php echo $this->Form->create('IndicadoresItem', array('role' => 'form')); ?>
	                <div class="row">
		                <div class="col-lg-4">
            				<div class="form-group">
            					<?php echo $this->Form->input('indicador_area_id', array('label' => 'Área', 'empty' => 'Selecione', 'class' => 'form-control', 'options' => $indicadoresAreas));?>
            				</div>
            			</div>
		                <div class="col-lg-8">
            				<div class="form-group">
            					<?php echo $this->Form->input('nome', array('class' => 'form-control', 'placeholder' => 'Nome'));?>
            				</div>
            			</div>
        			</div>
	                <div class="row">
		                <div class="col-lg-4">
            				<div class="form-group">
            					<?php echo $this->Form->input('unidade_medida_id', array('label' => 'Unidade de Medida', 'empty' => 'Selecione', 'class' => 'form-control', 'options' => $unidadesMedidas));?>
            				</div>
            			</div>
		                <div class="col-lg-4">
            				<div class="form-group">
            					<?php echo $this->Form->input('tolerancia_abaixo_meta', array('type' => 'text', 'label' => '% Tolerância Abaixo', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));?>
            				</div>
            			</div>
		                <div class="col-lg-4">
            				<div class="form-group">
            					<?php echo $this->Form->input('tolerancia_acima_meta', array('type' => 'text', 'label' => '% Tolerância Acima', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));?>
            				</div>
            			</div>
            		</div>
	                <div class="row">
  		                <div class="col-lg-4">
              				<div class="form-group">
                			    <?php echo $this->Form->input('relacao_meta', array('label' => 'Relação com a Meta', 'empty' => 'Selecione', 'class' => 'form-control', 'options' => $this->Util->indicadorRelacaoMeta()));?>
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