<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h1 class="page-header">Atas Candidato - <?=$candidato['Candidato']['nome']?></h1>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Adicionar</h4>
    				    <ul class="links">
                            <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), 'javascript:window.history.go(-1)', array('escape'=>false)); ?></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('AtasCandidato', array('role' => 'form')); ?>
                            <?php echo $this->Form->input('candidato_id', array('type' => 'hidden', 'value'=>$this->params['pass'][0]));?>
                            <div class="row no-gutter">
                              <div class="col-lg-6 col-sm-6 col-sx-6">
                                <div class="form-group">
                    			    <?php echo $this->Form->input('tipo', array('class' => 'form-control', 'empty'=>'Selecione', 'options'=>$this->Util->tiposAtas()));?>
                    		    </div>
                    		  </div>
                              <div class="col-lg-6 col-sm-6 col-sx-6">
                    		    <div class="form-group">
                    			    <?php echo $this->Form->input('local', array('class' => 'form-control'));?>
                    			</div>
                    		  </div>
                    		</div>
                            <div class="row no-gutter">
                              <div class="col-lg-3 col-sm-3 col-sx-3">
                				<div class="form-group">
                					<?php echo $this->Form->input('repsonsavel_contato', array('class' =>'form-control', 'label'=>'Nome do Contato'));?>
                				</div>
                			  </div>
                              <div class="col-lg-3 col-sm-3 col-sx-3">
                				<div class="form-group">
                					<?php echo $this->Form->input('data', array('class' =>'form-control datepicker', 'type'=>'text', 'onkeyup' => "formataData(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                				</div>
                			  </div>
                              <div class="col-lg-3 col-sm-3 col-sx-3">
                			    <div class="form-group">
                				    <?php echo $this->Form->input('inicio', array('class' => 'form-control', 'label'=>'Início', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                				</div>
                			  </div>
                              <div class="col-lg-3 col-sm-3 col-sx-3">
                				<div class="form-group">
                				    <?php echo $this->Form->input('termino', array('class' => 'form-control', 'label'=>'Término', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                				</div>
                			  </div>
                			</div>
                            <div class="row no-gutter">
                              <div class="col-lg-12 col-sm-12 col-sx-12">
                  				<div class="form-group">
                  					<?php echo $this->Form->input('assuntos_discutidos', array('class' => 'form-control', 'label'=>'Assunto Discutido'));?>
                  				</div>
                  			  </div>
                  			</div>
                            <div class="row no-gutter">
                              <div class="col-lg-12 col-sm-12 col-sx-12">
                  				<div class="form-group">
                  					<?php echo $this->Form->input('conclucoes', array('class' => 'form-control', 'label'=>'Conclusões'));?>
                  				</div>
              				  </div>
              				</div>
                            <div class="row no-gutter">
                              <div class="col-lg-12 col-sm-12 col-sx-12">
                  				<div class="form-group">
                  					<?php echo $this->Form->input('presentes', array('class' => 'form-control'));?>
                  				</div>
              				  </div>
              				</div>
                            <div class="row no-gutter">
                              <div class="col-lg-6 col-sm-6 col-sx-6">
                    		    <div class="form-group">
                    			    <?php echo $this->Form->input('arquivo', array('type'=>'file', 'class' => 'filestyle form-control', 'data-buttonText'=>'Selecionar Arquivo'));?>
                    			</div>
              				  </div>
              				</div>
           					<button class="btn btn-primary" type="submit">Salvar</button>
              			<?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>