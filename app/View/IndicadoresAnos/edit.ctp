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
                    <h4>Atualizar Ano</h4>
					<ul class="links">
					    <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $this->Form->value('IndicadoresAno.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('IndicadoresAno.id'))); ?></li>
						<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
					</ul>
                </div>
                <div class="panel-body">
        			<?php echo $this->Form->create('IndicadoresAno', array('role' => 'form')); ?>
					<?php echo $this->Form->input('id');?>
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
							echo $this->Form->input('Area', array('label' => 'Áreas:', 'class' => 'form-control', 'required' => 'required', 'multiple' => true, 'options' => $areas, 'selected' => $list));
                           // echo $this->Form->input('Area', [
                           //     'label' => 'Áreas:', 'type' => 'select','class' => 'form-control', 'multiple' => 'multiple', 'selected' => $list,
                          //  ]);
                            ?>
                        </div>
                    </div>
					<div class="col-lg-12 col-sm-12 col-sx-12">
						<div class="form-group">
							<label>Tipo</label><br />
							<label class="radio-inline">
								<input type="radio" value="P" id="AgendaTipoP" name="data[Agenda][tipo]" required="required">Particular
							</label>
							<label class="radio-inline">
								<input type="radio" value="E" id="AgendaTipoE" name="data[Agenda][tipo]" required="required">Equipe
							</label>
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