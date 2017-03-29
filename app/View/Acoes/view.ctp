 <div class="modal-header">
     <button id="modalClose" type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Visualizar Tarefa - <?=$tarefa['Tarefa']['tarefa']?></h4>
 </div>
 <div class="modal-body">
   <div class="row no-gutter">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-pills">
                    <li class="active"><a href="#tarefa" data-toggle="tab">Cadastro</a></li>
                    <li><a href="#acoes" data-toggle="tab">Ações</a></li>
              </ul>
              <p style="clear: both"></p>
              <div class="tab-content">
                  <div class="tab-pane fade in active" id="tarefa">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row no-gutter">
                                    <div class="col-lg-12 col-sm-3 col-sx-3">
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
                                    <div class="col-lg-3 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Quem fará ?</label>
                                            <div><?=$tarefa['Tarefa']['quem_fara']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Quando ?</label>
                                            <div><?=$tarefa['Tarefa']['inicio']?> - <?=$tarefa['Tarefa']['termino']?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutter">
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Quanto vai custar?</label>
                                            <div><?=$tarefa['Tarefa']['quanto_vai_custar']?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
                                        <div class="form-group">
                                            <label>Staus</label>
                                            <div><?=!empty($tarefa['Tarefa']['status'])?$this->Util->statusAtividades($tarefa['Tarefa']['status']):''?></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-3 col-sx-3">
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
                                <div class="row no-gutter">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <div class="form-group">
                                            <?php
                                                if(!empty($tarefa['Tarefa']['anexo'])):
                                                    echo '<div>'.$this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/'.$tarefa['Tarefa']['dir'].'/'.$tarefa['Tarefa']['anexo'], array('target'=>'_blank', 'escape' => false)).'</div>';
                                                endif;
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="tab-pane fade" id="acoes">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4>Listagem</h4>
            				    <ul class="links">
                                  <li><a href="<?=$this->base?>/ProjetosProcessosAtividades/add/<?=$projetosProcesso['ProjetosProcesso']['id']?>/<?=$projetosProcesso['ProjetosTiposProcesso']['id']?>" data-toggle="modal", data-target="#subModal"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a></li>
                              </ul>
                          </div>
                          <div class="panel-body">
                              <div class="table-dataTable_wrapper panel-body">
                                  <table class="table table-striped table-bordered table-hover">
                                  	<tr>
                                  		<th><?php echo __('Descrição'); ?></th>
                                  		<th><?php echo __('Quando'); ?></th>
                                  		<th><?php echo __('Responsável'); ?></th>
                                  		<th><?php echo __('Status'); ?></th>
                                  		<th class="actions"><?php echo __('Actions'); ?></th>
                                  	</tr>
                                	<?php
                                		$i = 0;
                                		foreach($projetosProcesso['ProjetosProcessosAtividade'] as $atividade):   ?>
                                		<tr>
                                			<td><?php echo $this->Util->mostraProjetosTiposProcessosAtividade($atividade['projeto_tipo_processo_atividade_id']); ?></td>
                                			<td><?php echo $this->Util->format_date($atividade['inicio']); ?> - <?php echo $this->Util->format_date($atividade['termino']); ?></td>
                                			<td><?php echo (!empty($atividade['colaborador_id']))?$this->Util->mostraNomeColaborador($atividade['colaborador_id']):''; ?></td>
                                			<td><?php echo (!empty($atividade['status']))?$this->Util->statusAtividades($atividade['status']):''; ?></td>
                                			<td class="actions">
                                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'ProjetosProcessosAtividades', 'action' => 'view', $atividade['id']), array('data-toggle'=>'modal', 'data-target'=>'#subModal', 'escape' => false)); ?>
                                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'ProjetosProcessosAtividades', 'action' => 'edit', $atividade['id']), array('data-toggle'=>'modal', 'data-target'=>'#subModal', 'escape' => false)); ?>
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