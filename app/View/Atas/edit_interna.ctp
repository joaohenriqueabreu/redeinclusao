<?php
     //Form Wizard CSS
    echo $this->Html->css('form-wizard/prettify');
    echo $this->Html->script('form-wizard/jquery.bootstrap.wizard', array('block'=>'customArchives'));
    echo $this->Html->script('form-wizard/prettify', array('block'=>'customArchives'));

    echo $this->Html->script('jquery.validate.min', array('block'=>'customArchives'));
    echo $this->Html->script('bootstrap-filestyle', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
  $(document).ready(function(){

  	  var $validator = $("#AtaEditInternaForm").validate({
        errorPlacement: function(error,element) {
        return true;
      }});

      $('#rootwizard').bootstrapWizard({
     		'tabClass': 'nav nav-pills',
     		'onNext': function(tab, navigation, index) {
     			var $valid = $("#AtaEditInternaForm").valid();
     			if(!$valid) {
     				$validator.focusInvalid();
     				return false;
     			}
     		},
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
          		if($current >= $total) {
          			$('#rootwizard').find('.pager .next').hide();
          			$('#rootwizard').find('.pager .finish').show();
          			$('#rootwizard').find('.pager .finish').removeClass('disabled');
          		} else {
          			$('#rootwizard').find('.pager .next').show();
          			$('#rootwizard').find('.pager .finish').hide();
          		}
            }
      });

      $('#rootwizard .finish').click(function() {
            var $valid = $("#AtaEditInternaForm").valid();
    		if(!$valid) {
    			$validator.focusInvalid();
    			return false;
    		}else{
                $("#AtaEditInternaForm").submit();
    		}
      });
      window.prettyPrint && prettyPrint()
  });
<?php echo $this->Html->scriptEnd(); ?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h1 class="page-header">Ata Interna</h1>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <?php echo $this->Form->create('Ata', array('role' => 'form', 'type'=>'file')); ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Editar</h4>
    				    <ul class="links">
                            <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), 'javascript:window.history.go(-1)', array('escape'=>false)); ?></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
        				<div id="rootwizard">
                            <!-- Nav tabs -->
                            <ul>
                                <li><a href="#tabs-1" data-toggle="tab">Identificação</a></li>
                                <li><a href="#tabs-2" data-toggle="tab">Colaboradores</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <p style="clear: both"></p>
                            <div class="tab-content">
                                <div class="tab-pane" id = "tabs-1">
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
                      			</div>
                                <div class="tab-pane" id = "tabs-2">
                                    <div class="row no-gutter">
                                        <div class="col-lg-6 col-sm-6 col-sx-6">
                                            <div class="form-group">
                                                <label>Selecione o(s) participante(s)</label>
                                                <?php
                                                    $colaboradoresSelecionados = array();
                                                    foreach($this->request->data['Colaborador'] as $colaborador){
                                                        $colaboradoresSelecionados[$colaborador['id']] = $colaborador['id'];
                                                    }
                                                    foreach($colaboradores as $key=>$colaborador):
                                                        $checked = '';
                                                        if(isset($colaboradoresSelecionados[$key])){
                                                          $checked = 'checked="checked"';
                                                        }
                                                        if($key <> $this->Session->read('Auth.User.colaborador_id')):
                                                ?>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input <?=$checked?> name="data[Colaborador][]" type="checkbox" value="<?=$key?>"><?=$colaborador?>
                                                                </label>
                                                            </div>
                                                 <?php
                                                        endif;
                                                    endforeach;
                                                 ?>
                                                 <input name="data[Colaborador][]" type="hidden" value="<?=$this->Session->read('Auth.User.colaborador_id')?>">
                                            </div>
                            			</div>
                        			</div>
                                </div>
                                <p style="clear: both"></p>
                                <ul class="pager wizard">
            					    <li class="previous first" style="display:none;"><a href="#">Primeiro</a></li>
            					    <li class="previous"><a href="#">Anterior</a></li>
            					    <li class="next last finish" style="display:none;"><a href="#">Salvar</a></li>
            				  	    <li class="next"><a href="#">Próximo</a></li>
            			        </ul>
                      		</div>
                      	</div>
                    </div>
                </div>
              	<?php echo $this->Form->end() ?>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>