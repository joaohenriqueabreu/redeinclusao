<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    function addProcesso(candidato){
        var vaga = <?=$vaga['Vaga']['id']?>;
        $('#processing-modal').modal({
            "backdrop"  : "static",
            "keyboard"  : true,
            "show"      : true
        });
        $.post('<?php echo $this->base; ?>/processos_seletivos/salva_candidato/',{candidato: candidato, vaga: vaga},function(retorno){
             if(retorno!=0){
                bootbox.dialog({
                  message: "Candidato incluso com sucesso!",
                  buttons: {
                    success: {
                      label: "Finalizar!",
                      className: "btn-success",
                      callback: function() {
                        location.reload();
                      }
                    },
                    main: {
                      label: "Continuar",
                      className: "btn-primary",
                      callback: function() {
                        $('#processing-modal').modal('hide');
                      }
                    }
                  }
                });
            }else{
                bootbox.alert("Ocorreu algum erro, por favor tente novamente", function() {
                    $('#processing-modal').modal('hide');
                });
            }
        });
    }
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Vaga</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tabs-1" data-toggle="tab">Cadastro</a></li>
                <li><a href="#tabs-2" data-toggle="tab">Processo Seletivo</a></li>
                <li><a href="#tabs-3" data-toggle="tab">Pesquisar candidatos</a></li>
            </ul>
            <!-- Tab panes -->
            <p style="clear: both"></p>
            <div class="tab-content">
                <div class="tab-pane fade in active" id = "tabs-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Visualizar</h4>
                            <ul class="links">
                        		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i> Editar'), array('action' => 'edit', $vaga['Vaga']['id']), array('escape'=>false)); ?> </li>
                        		<li><?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i> Excluir'), array('action' => 'delete', $vaga['Vaga']['id']), array('escape'=>false), __('Deseja remover a vaga # %s?', $vaga['Vaga']['cargo'])); ?> </li>
                        		<li><?php echo $this->Html->link(__('<i class="fa  fa-list "></i>&nbsp;&nbsp; Listar'), array('action' => 'index'), array('escape'=>false)); ?> </li>
                        		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar'), array('action' => 'add', $vaga['Vaga']['cliente_id']), array('escape'=>false)); ?> </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-1 col-sm-4 col-sx-4">
                                        <label>Cód.</label>
                                        <p><?php echo h($vaga['Vaga']['id']); ?></p>
                                    </div>
                                    <div class="col-lg-4 col-sm-10 col-sx-10">
                                        <label>Cliente</label>
                                        <p><?php echo h($vaga['Cliente']['razao_social']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Cargo</label>
                                        <p><?php echo h($vaga['Vaga']['cargo']); ?></p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                        <label>Gestor da Área</label>
                                        <p><?php echo h($vaga['Vaga']['gestor_area']); ?></p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                        <label>Número Vagas</label>
                                        <p><?php echo h($vaga['Vaga']['numero_vagas']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-1 col-sm-6 col-sx-6">
                                        <label>Salário</label>
                                        <p><?php echo h($vaga['Vaga']['salario']); ?></p>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 col-sx-6">
                                        <label>Benefícios</label>
                                        <p><?php echo h($vaga['Vaga']['beneficios']); ?></p>
                                    </div>
                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                        <label>Sexo</label>
                                        <p><?php echo h($sexo[$vaga['Vaga']['sexo']]); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Descrição da Vaga</label>
                                        <p><?php echo h($vaga['Vaga']['descricao_vaga']); ?></p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                  <div class="col-lg-1 col-sm-1 col-sx-1">
                                      <label>CEP</label>
                                      <p><?php echo h($vaga['Vaga']['cep']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Logradouro</label>
                                      <p><?php echo h($vaga['Vaga']['logradouro']); ?></p>
                                  </div>
                                  <div class="col-lg-2 col-sm-2 col-sx-2">
                                      <label>Nº</label>
                                      <p><?php echo h($vaga['Vaga']['numero']); ?>  <?php echo (!empty($vaga['Vaga']['complemento']))?' - '.$vaga['Vaga']['complemento']:''; ?> </p>
                                  </div>
                                  <div class="col-lg-2 col-sm-2 col-sx-2">
                                      <label>Bairro</label>
                                      <p><?php echo h($vaga['Vaga']['bairro']); ?></p>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-sx-4">
                                      <label>Cidade</label>
                                      <p><?php echo h($vaga['Vaga']['cidade']); ?> | <?php echo h($vaga['Vaga']['uf']); ?> | <?php echo h($vaga['Vaga']['geocode']); ?></p>
                                  </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Horário Trabalho</label>
                                        <p><?php echo h($vaga['Vaga']['horario_trabalho']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-sx-12">
                                        <label>Horário Trabalho Finais de Semana</label>
                                        <p><?php echo h($vaga['Vaga']['horario_trabalho_fds']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Carga Horária Semanal</label>
                                        <p><?php echo h($vaga['Vaga']['carga_horario_semanal']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Dias de Trabalho</label>
                                        <p>2º a 6º :<?php echo h($vaga['Vaga']['dias_trabalho_ss'] == 'S')?' Sim':'Não'; ?> |
                                            Sábado  :<?php echo h($vaga['Vaga']['dias_trabalho_s'] == 'S')?' Sim':'Não'; ?> |
                                            Domingo :<?php echo h($vaga['Vaga']['dias_trabalho_d'] == 'S')?' Sim':'Não'; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Observações Horário</label>
                                        <p><?php echo h($vaga['Vaga']['observacoes_horario']); ?></p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Deficiência Auditiva</label>
                                        <p><?php echo h($vaga['Vaga']['deficiencia_auditiva'] == 1)?'Sim':'Não'; ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 col-sx-12">
                                        <label>Deficiência Fisica</label>
                                        <p><?php echo h($vaga['Vaga']['deficiencia_fisica'] == 1)?'Sim':'Não'; ?> </p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Deficiência Intelectual</label>
                                        <p><?php echo h($vaga['Vaga']['deficiencia_intelectual'] == 1)?'Sim':'Não'; ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Deficiência Visual</label>
                                        <p><?php echo h($vaga['Vaga']['deficiencia_visual'] == 1)?'Sim':'Não'; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Descrição Deficiência</label>
                                        <p><?php echo h($vaga['Vaga']['descricao_deficiencia']); ?></p>
                                    </div>
                                </div>
                                <hr />
                                <label>Formação Acadêmica</label>
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <p>Alfabetizado :<?php echo h($vaga['Vaga']['ensino_alfabetizado'] == 'S')?' Sim':'Não'; ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <p>Ensino Fundamental :<?php echo h($vaga['Vaga']['ensino_fundamental'] == 'S')?' Sim':'Não'; ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <p>Ensino Médio :<?php echo h($vaga['Vaga']['ensino_medio'] == 'S')?' Sim':'Não'; ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <p>Ensino Superior :<?php echo h($vaga['Vaga']['ensino_superior'] == 'S')?' Sim':'Não'; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Observações Formação Acadêmica</label>
                                        <p><?php echo h($vaga['Vaga']['observacoes_formacao_academica']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Habilidades ou conhecimentos técnicos</label>
                                        <p><?php echo h($vaga['Vaga']['experiencias_necessarias']); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-6 col-sx-6">
                                        <label>Habilidades Comportamentais</label>
                                        <p><?php echo h($vaga['Vaga']['habilidades_comportamentais']); ?></p>
                                    </div>
                                </div>
                                <hr />
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Status</label>
                                        <p><?php echo h($status[$vaga['Vaga']['status']]); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Cadastrado por</label>
                                        <p><?php echo h($vaga['User']['nome']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Cadastrada em</label>
                                        <p><?php echo h($vaga['Vaga']['created']); ?></p>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                        <label>Última Atualização</label>
                                        <p><?php echo h($vaga['Vaga']['modified']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
                <div class="tab-pane fade" id = "tabs-2">
                    <p style="clear: both"></p>
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
               				    <ul class="links">
                                    <li><?php echo $this->Html->link('<i class="glyphicon glyphicon-export"></i>&nbsp; Exportar Excel', array('action' => 'export_excel', $vaga['Vaga']['id']), array('target'=>'_blank', 'escape'=>false)); ?> </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('ProcessosSeletivo', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('vaga_id'=>$vaga['Vaga']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id = "tabs-3">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4>Pesquisar</h4>
                          </div>
                          <div class="panel-body">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <?php
                                          $listPretensoes = array();
                                          foreach($pretensoesSalariais as $pretensao){
                                              if($pretensao['PretensoesSalarial']['final'] == 99){
                                                $texto = 'acima de R$3.000,00';
                                              }else{
                                                $texto = $this->Formatacao->moeda($pretensao['PretensoesSalarial']['inicial']).' - '.$this->Formatacao->moeda($pretensao['PretensoesSalarial']['final']);
                                              }
                                              $listPretensoes[$pretensao['PretensoesSalarial']['id']] = $texto;
                                          }
                                          ksort($listPretensoes);
                                          $listCidades = array();
                                          foreach($cidadesGroup as $cidade){
                                              $listCidades[$cidade['Candidato']['cidade']] = $cidade['Candidato']['cidade'];
                                          }
                                          ksort($listCidades);
                                          echo $this->Form->create('VagaCandidato', array('role'=>'form', 'type'=>'get', 'url'=>'view/'.$vaga['Vaga']['id'].'#tabs-3'));
                                          $auditiva = '';
                                          $fisica = '';
                                          $visual = '';
                                          $intelectual = '';
                                          $reabilitado = '';
                                          if(!empty($_GET)){
                                            if(isset($_GET['possui_deficiencia_auditiva'])){
                                                $auditiva = 'checked';
                                            }
                                            if(isset($_GET['possui_deficiencia_fisica'])){
                                                $fisica = 'checked';
                                            }
                                            if(isset($_GET['possui_deficiencia_intelectual'])){
                                                $intelectual = 'checked';
                                            }
                                            if(isset($_GET['possui_deficiencia_visual'])){
                                                $visual = 'checked';
                                            }
                                            if(isset($_GET['condicao_comprimento_cota'])){
                                                $reabilitado = 'checked';
                                            }
                                          }
                                      ?>
                                      <div class="row">
                                          <?
                                              echo $this->Form->input('escolaridade_id', array('class' => 'form-control', 'div'=>array('class'=>'col-xs-3'), 'options'=>$escolaridades, 'empty'=>'Selecione', 'value' => (isset($_GET['escolaridade_id'])?$_GET['escolaridade_id']:'')));
                                              echo $this->Form->input('pretensao_salarial_id', array('class' => 'form-control', 'div'=>array('class'=>'col-xs-3'), 'options'=>$listPretensoes,'label'=>'Pretesenção Salarial', 'empty'=>'Selecione', 'value' => (isset($_GET['pretensao_salarial_id'])?$_GET['pretensao_salarial_id']:'')));
                                              echo $this->Form->input('sexo', array('class' => 'form-control', 'div'=>array('class'=>'col-xs-3'), 'options'=>$sexo, 'label'=>'Sexo', 'empty'=>'Selecione', 'value' => (isset($_GET['sexo'])?$_GET['sexo']:'')));
                                              echo $this->Form->input('cidade', array('class' => 'form-control', 'div'=>array('class'=>'col-xs-3'), 'options'=>$listCidades, 'label'=>'Cidade', 'empty'=>'Selecione', 'value' => (isset($_GET['cidade'])?$_GET['cidade']:'')));
                                          ?>
                                      </div>
                                      <p style="clear: both"></p>
                                      <div class="form-group">
                                          <label>Tipo de Deficiência</label>
                                          <p style="clear: both"></p>
                                          <label class="checkbox-inline" for="CandidatoPossuiDeficienciaAuditiva">
                                              <input type="checkbox" id="CandidatoPossuiDeficienciaAuditiva" value="1" name="possui_deficiencia_auditiva" <?=$auditiva?>>Auditiva
                                          </label>
                                          <label class="checkbox-inline" for="CandidatoPossuiDeficienciaFisica">
                                              <input type="checkbox" id="CandidatoPossuiDeficienciaFisica" value="1" name="possui_deficiencia_fisica" <?=$fisica?>>Fisíca
                                          </label>
                                          <label class="checkbox-inline" for="CandidatoPossuiDeficienciaIntelectual">
                                              <input type="checkbox" id="CandidatoPossuiDeficienciaIntelectual" value="1" name="possui_deficiencia_intelectual" <?=$intelectual?>>Intelectual
                                          </label>
                                          <label class="checkbox-inline" for="CandidatoPossuiDeficienciaVisual">
                                              <input type="checkbox" id="CandidatoPossuiDeficienciaVisual" value="1" name="possui_deficiencia_visual" <?=$visual?>>Visual
                                          </label>
                                          <label class="checkbox-inline" for="CandidatoCondicaoComprimentoCota">
                                              <input type="checkbox" id="CandidatoCondicaoComprimentoCota" value="1" name="condicao_comprimento_cota" <?=$reabilitado?>>Reabilitado
                                          </label>
                                      </div>
                                      <button class="btn btn-primary" type="submit">Pesquisar</button>
                                      <a href="<?=$this->base?>/vagas/view/<?=$vaga['Vaga']['id']?>#tabs-3" class="btn btn-primary">Todos</a>
                                      <?php
                                          echo $this->Form->end();
                                      ?>
                                    </div>
                                </div>
                          </div>
                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4>Listagem</h4>
                              <?php if(!empty($candidatos)): ?>
            				    <ul class="links">
                                    <li><?php echo $this->Html->link('<i class="fa  fa-map-marker"></i>&nbsp; Mapa', array('action' => 'geo_localizacao', $vaga['Vaga']['id']), array('target'=>'_blank', 'escape'=>false)); ?> </li>
                                </ul>
                              <?php endif; ?>
                          </div>
                          <!-- /.panel-heading -->
                          <div class="panel-body">
                              <div class="table-dataTable_wrapper panel-body table-responsive">
                                  <?php
                                    $conditions = array();
                                    $candidatosParticipantes = array();
                                    if(!empty($vaga['ProcessosSeletivo'])){
                                        foreach($vaga['ProcessosSeletivo'] as $processo){
                                            $candidatosParticipantes[$processo['candidato_id']] = $processo['candidato_id'];
                                        }
                                    }
                                    if(!empty($_GET)):
                                        foreach($_GET as $key=>$value){
                                            if(!empty($value)){
                                                if($key == 'sexo' and $value == 'A'){
                                                    $conditions['Candidato.'.$key] = array('M', 'F');
                                                }else{
                                                    $conditions['Candidato.'.$key] = $value;
                                                }
                                            }
                                        }
                                     endif;
                                     $conditions['NOT'] = array('Candidato.id'=>$candidatosParticipantes);
                                     echo $this->DataTable->render('Candidato', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$conditions));
                                  ?>
                              </div>
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
                </div>
            </div>
        </div>
    </div>