    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ata Cliente</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#cadastro" data-toggle="tab">Cadastro</a></li>
                    <li><a href="#acao" data-toggle="tab">Ações</a></li>
                </ul>
                <!-- Tab panes -->
                <p style="clear: both"></p>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id = "cadastro">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Visualizar</h4>
            				    <ul class="links">
                                    <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-print"></i>&nbsp&nbsp;Impressão'), 'javascript:abreJanela("'.$this->base.'/atas/impressao/'.$ata['Ata']['id'].'");' , array('escape' => false)); ?> </li>
                                    <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>&nbsp&nbsp;Editar'), array('action' => 'edit', $ata['Ata']['id']), array('escape' => false)); ?> </li>
                            		<li><?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $ata['Ata']['id'], $ata['Ata']['cliente_id']), array('escape' => false), __('Deseja remover o registro # %s?', $ata['Ata']['id'])); ?> </li>
                                    <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), array('controller'=>'clientes', 'action' => 'view', $ata['Ata']['cliente_id']), array('escape'=>false)); ?></li>
                            		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>&nbsp&nbsp;Adicionar'), array('action' => 'add', $ata['Ata']['cliente_id']), array('escape' => false)); ?> </li>
            					</ul>
          			        </div>
                            <div class="panel-body">
                                <div class="row no-gutter">
                                  <div class="col-lg-2 col-sm-6 col-sx-6">
                                    <label>Cód.</label>
                                    <p><?=$ata['Ata']['id']?></p>
                        		  </div>
                                  <div class="col-lg-2 col-sm-6 col-sx-6">
                                    <label>Tipo</label>
                                    <p><?php echo $this->Util->tiposAtas($ata['Ata']['tipo']); ?></p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Cliente</label>
                                    <p><?php echo h($ata['Cliente']['razao_social']); ?></p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-4 col-sx-4">
                                    <label>Título</label>
                                    <p><?=$ata['Ata']['titulo']?></p>
                        		  </div>
                        		</div>
                                <div class="row no-gutter">
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Local</label>
                                    <p><?php echo h($ata['Ata']['local']); ?></p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Data</label>
                                    <p><?php echo h($ata['Ata']['data']); ?></p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Horário</label>
                                    <p><?php echo h($ata['Ata']['inicio']); ?> a <?php echo h($ata['Ata']['termino']); ?></p>
                        		  </div>
                        		</div>
                                <div class="row no-gutter">
                                  <div class="col-lg-12 col-sm-6 col-sx-6">
                                    <label>Assunto Discutido</label>
                                    <p><?php echo h($ata['Ata']['assuntos_discutidos']); ?></p>
                        		  </div>
                        		</div>
                                <div class="row no-gutter">
                                  <div class="col-lg-12 col-sm-6 col-sx-6">
                                    <label>Conclusões</label>
                                    <p><?php echo h($ata['Ata']['conclucoes']); ?></p>
                        		  </div>
                        		</div>
                                <div class="row no-gutter">
                                  <div class="col-lg-12 col-sm-6 col-sx-6">
                                    <label>Presentes</label>
                                    <p><?php echo h($ata['Ata']['presentes']); ?></p>
                        		  </div>
                        		</div>
                                <div class="row no-gutter">
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Anexo</label>
                                    <p>
                                        <?php
                                            if(!empty($ata['Ata']['arquivo'])):
                                                echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/ata/arquivo/'.$ata['Ata']['id'].'/'.$ata['Ata']['arquivo'], array('target'=>'_blank', 'escape' => false));
                                            endif;
                                        ?>
                                    </p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Cadastrado por</label>
                                    <p><?php echo h($ata['User']['nome']); ?></p>
                        		  </div>
                                  <div class="col-lg-4 col-sm-6 col-sx-6">
                                    <label>Cadastrado em</label>
                                    <p><?php echo h($ata['Ata']['created']); ?> </p>
                        		  </div>
                        		</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id = "acao">
                        <div class="table-dataTable_wrapper panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Listagem</h4>
                                    <ul class="links">
                                        <li><a href="<?=$this->base?>/Tarefas/add?cliente=<?=$ata['Cliente']['id']?>&ata=<?=$ata['Ata']['id']?>" data-toggle="modal", data-target="#myLargeModalLabel"><i class="glyphicon glyphicon-plus"></i>&nbsp;Adicionar</a></li>
                                        <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), array('controller'=>'clientes', 'action' => 'view', $ata['Ata']['cliente_id']), array('escape'=>false)); ?></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#acoesGeralTodas" data-toggle="tab" style="background-color: #398ab9; color:#fff">Todas</a></li>
                                        <?php
                                          $i = 0;
                                          $tarefas = array();
                                          $todasTarefas = array();
                                          $status = $this->Util->statusAtividades();
                                          foreach($ata['Tarefa'] as $tarefa){
                                            $todasTarefas[] = $tarefa;
                                            $tarefas[$tarefa['status']][] = $tarefa;
                                          }
                                          foreach($status as $key=>$nome):
                                              $active = '';
                                              if($i == 0){
                                                  $active = 'active';
                                              }
                                        ?>
                                              <li class=""><a href="#acoes<?=$key?>" data-toggle="tab" style="background-color: <?=$this->Util->coresStatusAtividades($key)?>; color:#fff"><?=$nome?></a></li>
                                        <?php
                                              $i++;
                                          endforeach;
                                        ?>
                                    </ul>
                                    <p style="clear: both"></p>
                                    <div class="tab-content">
                                      <div class="tab-pane fade in active" id = "acoesGeralTodas">
                                          <table class="table table-striped table-bordered table-hover">
                                          	<tr>
                                          		<th><?php echo __('Ação'); ?></th>
                                          		<th><?php echo __('Quando'); ?></th>
                                          		<th><?php echo __('Responsável'); ?></th>
                                          		<th><?php echo __('Status'); ?></th>
                                          		<th class="actions"><?php echo __('Actions'); ?></th>
                                          	</tr>
                                            	<?php
                                            		$i = 0;
                                                  if(!empty($todasTarefas)):
                                            		    foreach($todasTarefas as $key=>$tarefa):

                                              ?>
                                                  		<tr>
                                                  			<td><?php echo $tarefa['tarefa']; ?></td>
                                                  			<td><?php echo (!empty($tarefa['inicio']))?$this->Util->format_date($tarefa['inicio']):''; ?> - <?php echo (!empty($tarefa['termino']))?$this->Util->format_date($tarefa['termino']):''; ?></td>
                                                  			<td><?php echo (!empty($tarefa['colaborador_id']))?$this->Util->mostraNomeColaborador($tarefa['colaborador_id']):''; ?></td>
                                                  			<td><button class="btn btn-default" style="color:#fff; background-color: <?=$this->Util->coresStatusAtividades($tarefa['status'])?>" type="button"><?php echo (!empty($tarefa['status']))?$this->Util->statusAtividades($tarefa['status']):''; ?></button></td>
                                                  			<td class="actions">
                                                                  <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#subModal', 'escape' => false)); ?>
                                                                  <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#myLargeModalLabel', 'escape' => false)); ?>
                                                                  <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#myLargeModalLabel', 'escape' => false)); ?>
                                                  			</td>
                                                  		</tr>
                                        	    <?php
                                                          endforeach;
                                                      endif;
                                              ?>
                                	        </table>
                                      </div>
                                        <?php
                                          $i = 0;
                                          foreach($status as $key=>$nome):
                                              $active = '';
                                              if($i == 0){
                                                  $active = 'active';
                                              }
                                        ?>
                                              <div class="tab-pane fade in" id = "acoes<?=$key?>">
                                                  <table class="table table-striped table-bordered table-hover">
                                                  	<tr>
                                                  		<th><?php echo __('Ação'); ?></th>
                                                  		<th><?php echo __('Quando'); ?></th>
                                                  		<th><?php echo __('Responsável'); ?></th>
                                                  		<th><?php echo __('Status'); ?></th>
                                                  		<th class="actions"><?php echo __('Actions'); ?></th>
                                                  	</tr>
                                                    <?php
                                                        $i = 0;
                                                        if(isset($tarefas[$key])):
                                                    	    foreach($tarefas[$key] as $tarefa):
                                                      ?>
                                                          		<tr>
                                                          			<td><?php echo $tarefa['tarefa']; ?></td>
                                                          			<td><?php echo (!empty($tarefa['inicio']))?$this->Util->format_date($tarefa['inicio']):''; ?> - <?php echo (!empty($tarefa['termino']))?$this->Util->format_date($tarefa['termino']):''; ?></td>
                                                          			<td><?php echo (!empty($tarefa['colaborador_id']))?$this->Util->mostraNomeColaborador($tarefa['colaborador_id']):''; ?></td>
                                                          			<td><button class="btn btn-default" style="color:#fff; background-color: <?=$this->Util->coresStatusAtividades($tarefa['status'])?>" type="button"><?php echo (!empty($tarefa['status']))?$this->Util->statusAtividades($tarefa['status']):''; ?></button></td>
                                                          			<td class="actions">
                                                                          <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#subModal', 'escape' => false)); ?>
                                                                          <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#myLargeModalLabel', 'escape' => false)); ?>
                                                                          <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle'=>'modal', 'data-target'=>'#myLargeModalLabel', 'escape' => false)); ?>
                                                          			</td>
                                                          		</tr>
                                                  	  <?php
                                                            endforeach;
                                                        endif;
                                                      ?>
                                          	        </table>
                                                </div>
                                          <?php
                                                $i++;
                                            endforeach;
                                          ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tab panes -->
                    </div>
                </div>
            </div>
            <!-- Modal HTML -->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">

                  </div>
              </div>
            </div>
            <!-- Modal HTML -->
            <div id="myLargeModalLabel" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                </div>
              </div>
            </div>
            <!-- Modal HTML -->
            <div id="subModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
                  <div class="modal-content">

                  </div>
              </div>
            </div>
        </div>
    </div>