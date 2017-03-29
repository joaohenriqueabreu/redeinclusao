<?php
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h1 class="page-header">Ata Cliente</h1>
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
                        <h4>Editar</h4>
    				    <ul class="links">
                            <li><?php echo $this->Form->postLink(__('<i class="fa  fa-trash-o"></i>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $this->Form->value('Ata.id'), $this->Form->value('Ata.cliente_id')), array('escape' => false), __('Deseja remover o registro # %s?', $this->Form->value('Ata.id'))); ?></li>
                            <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), 'javascript:window.history.go(-1)', array('escape'=>false)); ?></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('Ata', array('role' => 'form', 'type'=>'file')); ?>
                            <?php echo $this->Form->input('id', array('type' => 'hidden'));?>
                            <?php echo $this->Form->input('cliente_id', array('type' => 'hidden'));?>
                            <div class="row no-gutter">
                                <div class="col-lg-4 col-sm-4 col-sx-4">
              			            <div class="form-group">
              					        <?php echo $this->Form->input('titulo', array('class' =>'form-control', 'label'=>'Título'));?>
              				        </div>
              			        </div>
                                <div class="col-lg-4 col-sm-4 col-sx-4">
                                    <div class="form-group">
                    			        <?php echo $this->Form->input('tipo', array('class' => 'form-control', 'empty'=>'Selecione', 'options'=>$this->Util->tiposAtas()));?>
                    		        </div>
                    		    </div>
                                <div class="col-lg-4 col-sm-4 col-sx-4">
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
                				    <?php echo $this->Form->input('inicio', array('class' => 'form-control', 'label'=>'Hora de Início', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                				</div>
                			  </div>
                              <div class="col-lg-3 col-sm-3 col-sx-3">
                				<div class="form-group">
                				    <?php echo $this->Form->input('termino', array('class' => 'form-control', 'label'=>'Hora de Término', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
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
                              <div class="col-md-12 col-sm-12 col-sx-12">
                                  <div class="panel panel-default">
                                      <div style="text-align: center" class="panel-heading">
                                          <h4>Proxima Reunião</h4>
                    			      </div>
                                      <div class="panel-body">
                                        <div class="row no-gutter">
                                            <div class="col-lg-3 col-sm-3 col-sx-3">
                          				        <div class="form-group">
                          					        <?php echo $this->Form->input('px_reuniao_data', array('label' => 'Data', 'class' =>'form-control datepicker', 'type'=>'text', 'onkeyup' => "formataData(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                          				        </div>
                          			        </div>
                                            <div class="col-lg-3 col-sm-3 col-sx-3">
                                			    <div class="form-group">
                                				    <?php echo $this->Form->input('px_reuniao_inicio', array('class' => 'form-control', 'label'=>'Hora de Início', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                                				</div>
                                			</div>
                                            <div class="col-lg-3 col-sm-3 col-sx-3">
                                			    <div class="form-group">
                                				    <?php echo $this->Form->input('px_reuniao_termino', array('class' => 'form-control', 'label'=>'Hora de Término', 'onkeyup' => "formataHora(this,event)", 'onkeypress'=>'return OnlyNumbers(event)'));?>
                                				</div>
                                			</div>
                                            <div class="col-lg-3 col-sm-3 col-sx-3">
                                		        <div class="form-group">
                                			        <?php echo $this->Form->input('px_reuniao_local', array('label' => 'Local', 'class' => 'form-control'));?>
                                			    </div>
                                		    </div>
                          				</div>
                                        <div class="row no-gutter">
                                            <div class="col-lg-12 col-sm-12 col-sx-12">
                                		        <div class="form-group">
                                			        <?php echo $this->Form->input('px_reuniao_pauta', array('label' => 'Pauta', 'class' => 'form-control'));?>
                                			    </div>
                                		    </div>
                          			    </div>
                          			  </div>
                          		  </div>
                          	  </div>
              				</div>
                            <div class="row no-gutter">
                              <div class="col-lg-6 col-sm-6 col-sx-6">
                                <div class="form-group" style="position: sticky">   
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