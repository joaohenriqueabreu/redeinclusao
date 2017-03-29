<div class="indicadoresAnos index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Painel de Indicadores'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Adicionar Ano</h4>
					<ul class="links">
					    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
			        <?php echo $this->Form->create('IndicadoresAno', array('role' => 'form')); ?>
    				<div class="form-group">
    					<?php echo $this->Form->input('ano', array('class' => 'form-control', 'label' => 'Ano', 'type' => 'text', 'onkeypress'=>'return OnlyNumbers(event)'));?>
    				</div>
    				<div class="form-group">
    					<?php echo $this->Form->input('metas', array('class' => 'form-control', 'label' => 'Metas', ));?>
    				</div>
    				<div class="form-group">
    					<?php echo $this->Form->input('conclusoes', array('class' => 'form-control', 'label' => 'Conclusões'));?>
    				</div>					
                    <div class="col-lg-12 col-sm-12 col-sx-12">
						<div class="form-group">
							<?php
							echo $this->Form->input('Area', [
								'label' => 'Áreas:', 'class' => 'form-control', 'required' => 'required','multiple' => 'multiple'
							]);
							?>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-sx-12">
						<div class="form-group">
							<label>Tipo:</label><br />
							<label class="radio-inline">
								<input type="radio" value="V" id="TipoV" name="data[IndicadorAno][tipo]" required="required">Antigo
							</label>
							<label class="radio-inline">
								<input type="radio" value="N" id="TipoN" checked="checked" name="data[IndicadorAno][tipo]" required="required">Novo
							</label>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-sx-12">
    				<div class="form-group">
    					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-primary')); ?>
    				</div>
					</div>
        			<?php echo $this->Form->end() ?>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->