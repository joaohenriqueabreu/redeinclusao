 <div class="modal-header">
     <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Ação - <?=$tarefa['Tarefa']['tarefa']?></h4>
 </div>
 <div class="modal-body">
   <div class="row no-gutter">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tarefa" data-toggle="tab">Cadastro</a></li>
                    <li><a href="#tarefaacoes" data-toggle="tab">Tarefas</a></li>
              </ul>
              <p style="clear: both"></p>
              <div class="tab-content">
                  <div class="tab-pane fade in active" id="tarefa">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row no-gutter">
                                    <?php
                                        if(!empty($tarefa['Cliente']['razao_social'])):
                                    ?>
                                          <div class="col-lg-6 col-sm-3 col-sx-3">
                                              <div class="form-group">
                                                  <label>Cliente</label>
                                                  <div><?=$tarefa['Cliente']['razao_social'];?></div>
                                              </div>
                                          </div>
                                    <?php
                                        endif;
                                    ?>
                                    <div class="col-lg-6 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Por que fazer?</label>
                                            <div><?=$tarefa['Tarefa']['por_que_fazer'];?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutter">
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Onde faremos ?</label>
                                            <div><?=$tarefa['Tarefa']['onde_faremos']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Responsável no Cliente ?</label>
                                            <div><?=$tarefa['Tarefa']['quem_fara']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Quando ?</label>
                                            <div><?=$tarefa['Tarefa']['inicio']?> - <?=$tarefa['Tarefa']['termino']?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutter">
                                    <div class="col-lg-3 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Tempo planejado</label>
                                            <div><?=$tarefa['Tarefa']['tempo_planejado']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Quanto vai custar?</label>
                                            <div><?=$tarefa['Tarefa']['quanto_vai_custar']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Staus</label>
                                            <div><?=!empty($tarefa['Tarefa']['status'])?$this->Util->statusAtividades($tarefa['Tarefa']['status']):''?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Responsável</label>
                                            <div><?=$tarefa['Colaborador']['nome']?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutter">
                                    <div class="col-lg-12 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Como fazer?</label>
                                            <div><?=$tarefa['Tarefa']['como_fazer'];?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutter">
                                    <div class="col-lg-12 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Parecer</label>
                                            <div><?=$tarefa['Tarefa']['parecer'];?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    if(!empty($tarefa['Tarefa']['anexo'])):
                                ?>
                                      <div class="row no-gutter">
                                          <div class="col-lg-12 col-sm-6 col-sx-6">
                                              <div class="form-group">
                                                  <label>Anexo</label>
                                                  <?php
                                                    echo '<div>'.$this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/'.$tarefa['Tarefa']['dir'].'/'.$tarefa['Tarefa']['anexo'], array('target'=>'_blank', 'escape' => false)).'</div>';
                                                  ?>                                                  
                                              </div>
                                          </div>
                                      </div>
                                <?php
                                    endif;
                                ?>
                            </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="tarefaacoes">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4>&nbsp;</h4>
            				    <ul class="links">
                                  <li><a href="<?=$this->base?>/acoes/add/<?=$tarefa['Tarefa']['id']?>" data-toggle="modal", data-target="#subModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a></li>
                              </ul>
                          </div>
                          <div class="panel-body">
                              <div class="table-dataTable_wrapper panel-body">
                                  <table class="table table-striped table-bordered table-hover">
                                  	<tr>
                                  		<th><?php echo __('Quando'); ?></th>
                                  		<th><?php echo __('Descrição'); ?></th>
                                  		<th><?php echo __('Tempo'); ?></th>
                                  		<th><?php echo __('Responsável'); ?></th>
                                  		<th><?php echo __('Anexo'); ?></th>
                                  		<th class="actions"><?php echo __('Actions'); ?></th>
                                  	</tr>
                                	<?php
                                		$i = 0;
                                		foreach($tarefa['Acao'] as $acao):   ?>
                                		<tr>
                                			<td><?php echo $this->Util->format_date($acao['quando']); ?></td>
                                			<td><?php echo $acao['descricao']; ?></td>
                                			<td><?php echo $acao['tempo_gasto']; ?> minuto(s)</td>
                                			<td><?php echo (!empty($acao['colaborador_id']))?$this->Util->mostraNomeColaborador($acao['colaborador_id']):''; ?></td>
                                			<td>
                                                <?php
                                                    if(!empty($acao['anexo'])):
                                                        echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/acao/anexo/'.$acao['dir'].'/'.$acao['anexo'], array('target'=>'_blank', 'escape' => false));
                                                    endif;
                                                ?>
                                            </td>
                                			<td class="actions">
                                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'acoes', 'action' => 'edit', $acao['id']), array('data-toggle'=>'modal', 'data-target'=>'#subModal', 'escape' => false)); ?>
                                                <?php echo $this->Form->postLink('', ['controller' => 'acoes', 'action' => 'delete',
                                                        $acao['id']], [
                                                        'class' => 'glyphicon glyphicon-remove',
                                                        'title' => 'Excluir registro',
                                                        'confirm' => 'Deseja excluir este registro?'
                                                ]);?>
                                            </td>
                                		</tr>
                                	<?php endforeach; ?>
                        	      </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
   </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
 </div>