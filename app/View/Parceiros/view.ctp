    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Parceiro</h1>
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
                </ul>
                <!-- Tab panes -->
                <p style="clear: both"></p>
                <div class="tab-content">
                      <div class="tab-pane fade in active" id = "cadastro">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Visualizar</h4>
                                <ul class="links">
                            		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'), array('action' => 'edit', $parceiro['Parceiro']['id']), array('escape'=>false)); ?> </li>
                            		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $parceiro['Parceiro']['id'], '?'=>'ativo='.$parceiro['Parceiro']['ativo']), array('escape'=>false), __('Deseja remover o cliente # %s?', $parceiro['Parceiro']['nome'])); ?> </li>
                            		<li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index?ativo='.$parceiro['Parceiro']['ativo']), array('escape'=>false)); ?> </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                  <div class="col-lg-1 col-sm-1 col-sx-1">
                                      <label>Cód.</label>
                                      <p><?php echo h($parceiro['Parceiro']['id']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Nome</label>
                                      <p><?php echo h($parceiro['Parceiro']['nome']); ?></p>
                                  </div>
                                  <div class="col-lg-2 col-sm-2 col-sx-2">
                                      <label><?=($parceiro['Parceiro']['tipo'] == 'PJ')?'CNPJ':'CPF'?></label>
                                      <p><?php echo h($parceiro['Parceiro']['cpf_cnpj']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Categoria</label>
                                      <p><?php echo $this->Util->categoriaParceiro($parceiro['Parceiro']['categoria']); ?></p>
                                  </div>
                                </div>
                                <hr />
                                <div class="row">
                                  <div class="col-lg-1 col-sm-1 col-sx-1">
                                      <label>CEP</label>
                                      <p><?php echo h($parceiro['Parceiro']['cep']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Logradouro</label>
                                      <p><?php echo h($parceiro['Parceiro']['logradouro']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Nº</label>
                                      <p><?php echo h($parceiro['Parceiro']['numero']); ?>  <?php echo (!empty($parceiro['Parceiro']['complemento']))?' - '.$parceiro['Parceiro']['complemento']:''; ?> </p>
                                  </div>
                                  <div class="col-lg-2 col-sm-2 col-sx-2">
                                      <label>Bairro</label>
                                      <p><?php echo h($parceiro['Parceiro']['bairro']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Cidade</label>
                                      <p><?php echo h($parceiro['Parceiro']['cidade']); ?> | <?php echo h($parceiro['Parceiro']['uf']); ?></p>
                                  </div>
                                </div>
                                <hr />
                                <div class="row">
                                  <div class="col-lg-4 col-sm-4 col-sx-4">
                                      <label>Telefone (s)</label>
                                      <p><?php echo h($parceiro['Parceiro']['telefone_1']); ?> <?php echo h($parceiro['Parceiro']['telefone_2']); ?></p>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-sx-4">
                                      <label>E-mail</label>
                                      <p><?php echo h($parceiro['Parceiro']['e_mail']); ?></p>
                                  </div>
                                  <div class="col-lg-4 col-sm-4 col-sx-4">
                                      <label>Contato</label>
                                      <p><?php echo h($parceiro['Parceiro']['contato']); ?></p>
                                  </div>
                                </div>
                                <hr />
                                <div class="row">
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Indicação</label>
                                      <p><?php echo h($parceiro['Parceiro']['indicacao']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Formação Acadêmica</label>
                                      <p><?php echo h($parceiro['Parceiro']['formacao_academica']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Currículo</label>
                                      <p><?php
                                          if(!empty($parceiro['Parceiro']['curriculo'])):
                                              echo '<div>'.$this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/parceiro/curriculo/'.$parceiro['Parceiro']['dir'].'/'.$parceiro['Parceiro']['curriculo'], array('target'=>'_blank', 'escape' => false)).'</div>';
                                          endif;
                                      ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Ramo Atuação</label>
                                      <p><?php echo h($parceiro['Parceiro']['ramo_atuacao']); ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-sm-12 col-sx-12">
                                      <label>Historico de Atuação</label>
                                      <p><?php echo h($parceiro['Parceiro']['historico_atuacao']); ?></p>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-sm-12 col-sx-12">
                                      <label>Descrição</label>
                                      <p><?php echo h($parceiro['Parceiro']['descricao']); ?></p>
                                  </div>
                                </div>
                                <hr />
                                <div class="row">
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Ativo</label>
                                      <p><?php echo h($parceiro['Parceiro']['ativo'] == 'S')? 'Sim' : 'Não'; ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Cadastrado por</label>
                                      <p><?php echo $parceiro['User']['nome']; ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Criado em</label>
                                      <p><?php echo h($parceiro['Parceiro']['created']); ?></p>
                                  </div>
                                  <div class="col-lg-3 col-sm-3 col-sx-3">
                                      <label>Modificado em</label>
                                      <p><?php echo h($parceiro['Parceiro']['modified']); ?></p>
                                  </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>