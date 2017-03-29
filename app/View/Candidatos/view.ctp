    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Candidato</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#dados_cadastrais" data-toggle="tab">Cadastro</a></li>
                    <li><a href="#atas" data-toggle="tab">Atas</a></li>
                    <li><a href="#processo_seletivo" data-toggle="tab">Processos Seletivos</a></li>
                    <li><a href="#hisotrico" data-toggle="tab">Arquivo</a></li>
                    <li><a href="#documento" data-toggle="tab">Documentos</a></li>
                </ul>
                <!-- Tab panes -->
                <p style="clear: both"></p>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id = "dados_cadastrais">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Visualizar</h4>
                                <ul class="links">
                            		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'), array('action' => 'edit', $candidato['Candidato']['id']), array('escape'=>false)); ?></li>
                            		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $candidato['Candidato']['id']), array('escape'=>false), __('Deseja remover o candidato # %s?', $candidato['Candidato']['nome'])); ?></li>
                            		<li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
                            		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('escape'=>false)); ?></li>
                            		<li><?php echo $this->Html->link(__('<span class="fa fa-file-text"></span>&nbsp;Currículo'), array('action' => 'curriculo_pdf', $candidato['Candidato']['id']), array('escape'=>false)); ?></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Identificação</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                              <div class="row">
                                                <?php
                                                    if(!empty($candidato['Candidato']['foto'])){
                                                        $urlImagem = $this->base.'/files/candidato/foto/'.$candidato['Candidato']['id'].'/'.$candidato['Candidato']['foto'];
                                                    }elseif($candidato['Candidato']['sexo'] == 'M'){
                                                        $urlImagem = $this->base.'/img/AvataM.png';
                                                    }elseif($candidato['Candidato']['sexo'] == 'F'){
                                                        $urlImagem = $this->base.'/img/AvataF.png';
                                                    }
                                                ?>
                                                <div class="col-lg-1 col-sm-6 col-sx-6" style="text-align: center; padding-top: 20px">
                                                      <img src="<?=$urlImagem?>" alt="" class="img-rounded" width="75px">
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-sx-6">
                                                    <label>Nome</label>
                                                    <p><?php echo h($candidato['Candidato']['nome']); ?></p>
                                                </div>
                                                <div class="col-lg-2 col-sm-4 col-sx-4">
                                                    <label>CPF</label>
                                                    <p><?php echo h($candidato['Candidato']['cpf']); ?></p>
                                                </div>
                                                <div class="col-lg-2 col-sm-4 col-sx-4">
                                                    <label>Identidade</label>
                                                    <p><?php echo h($candidato['Candidato']['identidade']); ?></p>
                                                </div>
                                                <div class="col-lg-2 col-sm-4 col-sx-4">
                                                    <label>Data de Nascimento</label>
                                                    <p><?php echo h($candidato['Candidato']['data_nascimento']); ?></p>
                                                </div>
                                                <div class="col-lg-2 col-sm-4 col-sx-4">
                                                    <label>Sexo</label>
                                                    <p><?php echo $this->Util->sexo($candidato['Candidato']['sexo']); ?></p>
                                                </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Estado Civil</label>
                                                      <p><?php echo $candidato['EstadosCivil']['nome']; ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Nacionalidade</label>
                                                      <p><?php echo h($candidato['Candidato']['nacionalidade']); ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Tem Filhos</label>
                                                      <p><?php echo h($candidato['Candidato']['tem_filhos'] == 'S')?'Sim':'Não'; ?></p>
                                                  </div>
                                                  <?php if($candidato['Candidato']['tem_filhos'] == 'S'): ?>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Quantos Filhos</label>
                                                      <p><?php echo h($candidato['Candidato']['quantos_filhos']); ?></p>
                                                  </div>
                                                  <?php endif;?>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Endereço</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                              <div class="row">
                                                  <div class="col-lg-1 col-sm-2 col-sx-2">
                                                      <label>CEP</label>
                                                      <p><?php echo $candidato['Candidato']['cep']; ?></p>
                                                  </div>
                                                  <div class="col-lg-3 col-sm-6 col-sx-6">
                                                      <label>Logradouro</label>
                                                      <p><?php echo h($candidato['Candidato']['logradouro']); ?> <?php echo h($candidato['Candidato']['numero']); ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Complemento</label>
                                                      <p><?php echo h($candidato['Candidato']['complemento']); ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Bairro</label>
                                                      <p><?php echo h($candidato['Candidato']['bairro']); ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Cidade</label>
                                                      <p><?php echo h($candidato['Candidato']['cidade']); ?></p>
                                                  </div>
                                                  <div class="col-lg-2 col-sm-4 col-sx-4">
                                                      <label>Estado</label>
                                                      <p><?php echo h($candidato['Candidato']['estado']); ?></p>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Experiências</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                        <div id="accordion" class="panel-group">
                                                	    <?php
                                                            if (!empty($candidato['ExperienciasProfissional'])):
                                                		        $i = 0;
                                                		        foreach ($candidato['ExperienciasProfissional'] as $experienciasProfissional):
                                                                    $i++;
                                                        ?>
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a href="#collapse<?=$i?>" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" class="collapsed"><?php echo h($experienciasProfissional['empresa']); ?></a>
                                                                            </h4>
                                                                        </div>
                                                                        <div class="panel-collapse collapse" id="collapse<?=$i?>" aria-expanded="false" style="height: 0px;">
                                                                            <div class="panel-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-1 col-sm-2 col-sx-2">
                                                                                        <label>Admissão</label>
                                                                                        <p><?php echo $this->Util->format_date($experienciasProfissional['admissao']); ?></p>
                                                                                    </div>
                                                                                    <div class="col-lg-1 col-sm-2 col-sx-2">
                                                                                        <label>Demissão</label>
                                                                                        <p><?php echo $this->Util->format_date($experienciasProfissional['demissao']); ?></p>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-sm-2 col-sx-2">
                                                                                        <label>Cargo</label>
                                                                                        <p><?php echo $experienciasProfissional['cargo']; ?></p>
                                                                                    </div>
                                                                                    <div class="col-lg-2 col-sm-2 col-sx-2">
                                                                                        <label>Último Salário</label>
                                                                                        <p><?php echo $this->Formatacao->moeda($experienciasProfissional['ultimo_salario']); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                                                        <label>Atividades Desenvolvidas</label>
                                                                                        <p><?php echo h($experienciasProfissional['atividades_desenvolvidas']); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                                                        <label>Motivo Desligamento</label>
                                                                                        <p><?php echo h($experienciasProfissional['motivo_desligamento']); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                        <?php
                                                                endforeach;
                                                            endif;
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Contato</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                                        <label>E-mail</label>
                                                        <p><?php echo h($candidato['Candidato']['e_mail']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Telefone</label>
                                                        <p><?php echo h($candidato['Candidato']['telefone']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 1</label>
                                                        <p><?php echo h($candidato['Candidato']['celular_1']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 2</label>
                                                        <p><?php echo h($candidato['Candidato']['celular_2']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 3</label>
                                                        <p><?php echo h($candidato['Candidato']['celular_3']); ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Nome do Contato</label>
                                                        <p><?php echo h($candidato['Candidato']['contato_nome']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Telefone do Contato</label>
                                                        <p><?php echo h($candidato['Candidato']['contato_telefone']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 1 do Contato</label>
                                                        <p><?php echo h($candidato['Candidato']['contato_celular_1']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 2 do Contato</label>
                                                        <p><?php echo h($candidato['Candidato']['contato_celular_2']); ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-4 col-sx-4">
                                                        <label>Celular 3 do Contato</label>
                                                        <p><?php echo h($candidato['Candidato']['contato_celular_3']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Formação Acadêmica</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                        <label>Escolaridade</label>
                                                        <p><?php
                                                                echo $candidato['Escolaridade']['nome'];
                                                                if(!empty($candidato['Candidato']['observacoes_escolaridade'])){
                                                                  echo ' - '.$candidato['Candidato']['observacoes_escolaridade'];
                                                                }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                        <label>Cursos</label>
                                                        <p>
                                                      	<?php
                                                            if (!empty($candidato['CursosAcademicosTecnico'])):
                                                                $i = 1;
                                                                foreach ($candidato['CursosAcademicosTecnico'] as $cursosAcademicosTecnico):
                                                                    echo $i.' - '.$cursosAcademicosTecnico['nome'].' - '.$tiposFormacoes[$cursosAcademicosTecnico['tipo']].'<br />';
                                                                    $i++;
                                                                endforeach;
                                                            endif;
                                                        ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                        <label>Idiomas</label>
                                                        <p>
                                                      	<?php
                                                            if (!empty($candidato['Idioma'])):
                                                                $i = 1;
                                                                foreach ($candidato['Idioma'] as $idioma):
                                                                    echo $i.' - '.$idioma['nome'].'<br />';
                                                                    $i++;
                                                                endforeach;
                                                            endif;
                                                        ?>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                                        <label>Necessita de Qualificação</label>
                                                        <p><?php echo h($candidato['Candidato']['necessita_qualificacao'] == '1')?'Sim':'Não'; ?></p>
                                                    </div>
                                                    <div class="col-lg-9 col-sm-12 col-sx-12">
                                                        <label>Cursos de Interesses</label>
                                                        <p><?php echo h($candidato['Candidato']['cursos_interesse']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Pretensões</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-4 col-sm-12 col-sx-12">
                                                        <label>Área de Interesse de Trabalho</label>
                                                        <p><?php echo h($candidato['Candidato']['area_interesse_trabalho']); ?></p>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12 col-sx-12">
                                                        <label>Disponibilidade Horário</label>
                                                        <p><?php echo h($candidato['Candidato']['disponibilidade_horario']); ?></p>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-12 col-sx-12">
                                                        <label>Pretensão Salarial</label>
                                                        <p><?php echo $this->Formatacao->moeda($candidato['PretensoesSalarial']['inicial']).' - '.$this->Formatacao->moeda($candidato['PretensoesSalarial']['final']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Captação</div>
                                            <!-- /.panel-heading -->
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                                        <label>Tipo Emprego</label>
                                                        <p><?php echo (!empty($candidato['Candidato']['tipo_emprego']))?$this->Util->tipoEmprego($candidato['Candidato']['tipo_emprego']):''; ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                                        <label>Origem</label>
                                                        <p><?php echo $candidato['Origem']['nome']; ?></p>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                                        <label>Data do Cadastro</label>
                                                        <p><?php echo $candidato['Candidato']['created']; ?></p>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6 col-sx-6">
                                                        <label>Última Atualização</label>
                                                        <p><?php echo $candidato['Candidato']['modified']; ?></p>
                                                    </div>
                                                    <div class="col-lg-2 col-sm-6 col-sx-6">
                                                        <label>Cadastro por</label>
                                                        <p><?php echo $candidato['User']['nome']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-sm-12 col-sx-12">
                                                        <label>Observações de Indicações</label>
                                                        <p><?php echo h($candidato['Candidato']['observacoes_indicacoes']); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Deficiências</div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Condição Cumprimento Cota</label>
                                                            <p>
                                                                <?php
                                                                    if($candidato['Candidato']['condicao_comprimento_cota'] == '0'){
                                                                        echo 'Deficiência';
                                                                    }elseif($candidato['Candidato']['condicao_comprimento_cota'] == '1'){
                                                                        echo 'Reabilitada '.$candidato['Candidato']['descricao_reabilitacao'];
                                                                    }
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Auditiva</label>
                                                            <p><?php echo h($candidato['Candidato']['possui_deficiencia_auditiva'] == 1)?'Sim - '.$candidato['Candidato']['descricao_deficiencia_auditiva']:'Não'; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Fisica</label>
                                                            <p><?php echo h($candidato['Candidato']['possui_deficiencia_fisica'] == 1)?'Sim - '.$candidato['Candidato']['descricao_deficiencia_fisica']:'Não'; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Intelectual</label>
                                                            <p><?php echo h($candidato['Candidato']['possui_deficiencia_intelectual'] == 1)?'Sim - '.$candidato['Candidato']['descricao_deficiencia_intelectual']:'Não'; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Visual</label>
                                                            <p><?php echo h($candidato['Candidato']['possui_deficiencia_visual'] == 1)?'Sim - '.$candidato['Candidato']['descricao_deficiencia_visual']:'Não'; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <label>Necessita Ajudas Tecnicas</label>
                                                            <p><?php echo h($candidato['Candidato']['necessita_ajudas_tecnicas'] == 1)?'Sim - '.$candidato['Candidato']['quais_ajudas_tecnicas']:'Não'; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">Parecer do Entrevistador</div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-sm-12 col-sx-12">
                                                            <?php echo h($candidato['Candidato']['parecer_entrevistador']); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id = "processo_seletivo">
                            <p style="clear: both"></p>
                            <div class="table-dataTable_wrapper panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Listagem</h4>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $this->DataTable->render('ProcessosSeletivo', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('candidato_id'=>$candidato['Candidato']['id']))) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id = "hisotrico">
                            <div class="table-dataTable_wrapper panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Listagem</h4>
<!--                                        <ul class="links">
                                    		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp; Histórico', array('controller'=>'candidatos_historicos', 'action' => 'add', $candidato['Candidato']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false)); ?></li>
                                        </ul>-->
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $this->DataTable->render('CandidatosHistorico', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('candidato_id'=>$candidato['Candidato']['id']))) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id = "atas">
                            <div class="table-dataTable_wrapper panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Listagem</h4>
                                        <ul class="links">
                                          <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Ata'), array('controller'=>'atas_candidatos', 'action' => 'add', $candidato['Candidato']['id']), array('escape'=>false)); ?></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $this->DataTable->render('Ata', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('candidato_id'=>$candidato['Candidato']['id']))) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade in" id = "documento">
                            <div class="table-dataTable_wrapper panel-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Listagem</h4>
                                        <ul class="links">
                                          <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Documento'), array('controller'=>'candidatos_documentos', 'action' => 'add', $candidato['Candidato']['id']), array('data-toggle'=>'modal', 'data-target'=>'#myModal', 'escape'=>false)); ?></li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <?php echo $this->DataTable->render('CandidatosDocumento', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('candidato_id'=>$candidato['Candidato']['id']))) ?>
                                    </div>
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