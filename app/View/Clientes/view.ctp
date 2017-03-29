<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
            if ($cliente['Cliente']['tipo'] == 'S') {
                echo 'Escola - ';
            } else {
                echo 'Empresa - ';
            }
            echo $this->Util->tipoCliente($cliente['Cliente']['status']) . ' - ' . $cliente['Cliente']['razao_social'];
            ?>
        </h1>
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
                <?php
                if ($cliente['Cliente']['tipo'] == 'E'):
                    ?>
                    <li class=""><a href="#atas" data-toggle="tab">Atas</a></li>
                    <li><a href="#imgi" data-toggle="tab">IMGI</a></li>
                    <li><a href="#acoes" data-toggle="tab">Ações</a></li>
                    <li class=""><a href="#vagas" data-toggle="tab">Vagas</a></li>
                    <li class=""><a href="#historicos" data-toggle="tab">Arquivo</a></li>
                    <?php
                    if ($cliente['Cliente']['status'] == 'E'):
                        ?>
                        <li class=""><a href="#contratos" data-toggle="tab">Contratos</a></li>
                        <?php
                    endif;
                endif;
                ?>
                <?php
                if ($cliente['Cliente']['tipo'] == 'S'):
                    ?>
                    <li class=""><a href="#atas" data-toggle="tab">Atas</a></li>
                    <li><a href="#acoes" data-toggle="tab">Ações</a></li>
                    <?php
                endif;
                ?>
                <li class=""><a href="#questionarios" data-toggle="tab">Questionários</a></li>
                <li class=""><a href="#contatos" data-toggle="tab">Contatos</a></li>
            </ul>
            <!-- Tab panes -->
            <p style="clear: both"></p>
            <div class="tab-content">
                <div class="tab-pane fade in active" id = "cadastro">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Visualizar</h4>
                            <ul class="links">
                                <li><?php echo $this->Html->link(__('<span class="fa fa-building"></span>PA'), array('controller' => 'tarefas', 'action' => 'plano_acao', $cliente['Cliente']['id'], 'ext' => 'pdf'), array('title' => 'Plano de Ação', 'escape' => false, 'target' => '_blank')); ?></li>
                                <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'), array('action' => 'edit', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $cliente['Cliente']['id'], '?' => 'status=' . $cliente['Cliente']['status'] . '&tipo=' . $cliente['Cliente']['tipo']), array('escape' => false), __('Deseja remover o cliente # %s?', $cliente['Cliente']['razao_social'])); ?> </li>
                                <li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index?status=' . $cliente['Cliente']['status'] . '&tipo=' . $cliente['Cliente']['tipo'] . '&ativo=' . $cliente['Cliente']['ativo']), array('escape' => false)); ?> </li>
                                <li><?php echo $this->Html->link(__('<i class="fa fa-angle-double-left"></i>&nbsp; Voltar'), 'javascript:window.history.go(-1)', array('escape' => false)); ?></li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-1 col-sm-1 col-sx-1">
                                    <label>Cód.</label>
                                    <p><?php echo h($cliente['Cliente']['id']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Razão Social</label>
                                    <p><?php echo h($cliente['Cliente']['razao_social']); ?></p>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-sx-2">
                                    <label>CNPJ</label>
                                    <p><?php echo h($cliente['Cliente']['cnpj']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Inscrição Estadual</label>
                                    <p><?php echo h($cliente['Cliente']['inscricao_estadual']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Inscrição Municipal</label>
                                    <p><?php echo h($cliente['Cliente']['inscricao_municipal']); ?></p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-1 col-sm-1 col-sx-1">
                                    <label>CEP</label>
                                    <p><?php echo h($cliente['Cliente']['cep']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Logradouro</label>
                                    <p><?php echo h($cliente['Cliente']['logradouro']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Nº</label>
                                    <p><?php echo h($cliente['Cliente']['numero']); ?>  <?php echo (!empty($cliente['Cliente']['complemento'])) ? ' - ' . $cliente['Cliente']['complemento'] : ''; ?> </p>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-sx-2">
                                    <label>Bairro</label>
                                    <p><?php echo h($cliente['Cliente']['bairro']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Cidade</label>
                                    <p><?php echo h($cliente['Cliente']['cidade']); ?> | <?php echo h($cliente['Cliente']['estado']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 col-sx-6">
                                    <label>Contato</label>
                                    <p>
                                        <?= $cliente['Cliente']['contato'] ?>
                                    </p>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-sx-6">
                                    <label>Cargo</label>
                                    <p>
                                        <?= $cliente['Cargo']['nome'] ?>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-9 col-sm-9 col-sx-9">
                                    <label>Telefone (s)</label>
                                    <p><?php echo h($cliente['Cliente']['telefone']); ?> <?php echo h($cliente['Cliente']['telefone_2']); ?> <?php echo h($cliente['Cliente']['telefone_3']); ?> <?php echo h($cliente['Cliente']['telefone_4']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>FAX</label>
                                    <p><?php echo h($cliente['Cliente']['fax']); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-sm-9 col-sx-9">
                                    <label>E-Mail (s)</label>
                                    <p><?php echo h($cliente['Cliente']['e_mail']); ?> <?php echo h($cliente['Cliente']['e_mail_2']); ?> <?php echo h($cliente['Cliente']['e_mail_3']); ?> <?php echo h($cliente['Cliente']['e_mail_4']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Site</label>
                                    <p>	<?php echo h($cliente['Cliente']['site']); ?></p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Nº de Deficiêntes</label>
                                    <p><?php echo h($cliente['Cliente']['num_pessoas_deficiencia']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Indicação</label>
                                    <p><?php echo h($cliente['Cliente']['indicado_por']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Status</label>
                                    <p><?php echo $this->Util->tipoCliente($cliente['Cliente']['status']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Ativo</label>
                                    <p><?php echo h($cliente['Cliente']['ativo'] == 'S') ? 'Sim' : 'Não'; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-sx-12">
                                    <label>Observações</label>
                                    <p><?php echo h($cliente['Cliente']['observacoes']); ?></p>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-sx-12">
                                    <label>Serviço(s)</label>
                                    <p>&nbsp;
                                        <?php
                                        if (!empty($cliente['ClientesServico'])) {
                                            foreach ($cliente['ClientesServico'] as $servico):
                                                echo $this->Util->servicos($servico['servico']) . ', ';
                                            endforeach;
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Classe</label>
                                    <p><?php echo $this->Util->classeCliente($cliente['Cliente']['classe']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Cadastrado por</label>
                                    <p><?php echo $cliente['User']['nome']; ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Criado em</label>
                                    <p><?php echo h($cliente['Cliente']['created']); ?></p>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Modificado em</label>
                                    <p><?php echo h($cliente['Cliente']['modified']); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Turnos</label>
                                    <ul class="list-unstyled">
                                        <?php foreach ($cliente['TurnosEscola'] as $turno) : ?>
                                            <li>
                                                <?php echo $turno['turno']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-3 col-sx-3">
                                    <label>Tipos de Educação</label>
                                    <ul class="list-unstyled">
                                        <?php foreach ($cliente['TipoEducacao'] as $tipo) : ?>
                                            <li>
                                                <?php echo $tipo['descricao']; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-sx-2">
                                    <label>Qtd. de Professores</label>
                                    <p>
                                        <?php
                                        echo $cliente['Cliente']['num_professores'];
                                        ?>
                                    </p>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-sx-2">
                                    <label>Sala com recursos</label>
                                    <p>
                                        <?php
                                        if ($cliente['Cliente']['sala_recursos'] == 1) {
                                            echo 'Sim';
                                        } else {
                                            echo 'Não';
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-sx-2">
                                    <label>Tipo de Escola</label>
                                    <p>
                                        <?php
                                        if ($cliente['Cliente']['tipo_escola'] == 'R') {
                                            echo 'Privada';
                                        } else {
                                            echo 'Pública';
                                        }
                                        ?>
                                    </p>
                                </div>
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
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Ata'), array('controller' => 'atas', 'action' => 'add', $cliente['Cliente']['id']), array('escape' => false)); ?></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('Ata', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="imgi">
                    <p style="clear: both"></p>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Listagem</h4>
                            <ul class="links">
                                <?php
                                if (!empty($cliente['RespostasLevantamento'])):
                                    ?>
                                    <li><a href="<?= $this->base ?>/RespostasLevantamentos/grafico/<?= $cliente['Cliente']['id'] ?>" target="_blank"><i class="fa fa-bar-chart-o fa-fw"></i>&nbsp;Gráfico de Radar</a></li>
                                    <?php
                                endif;
                                ?>
                                <li><a href="<?= $this->base ?>/RespostasLevantamentos/add/<?= $cliente['Cliente']['id'] ?>"><i class="fa fa-pencil fa-fw"></i>&nbsp;&nbsp;Preencher</a></li>
                            </ul>
                        </div>
                        <?php
                        if (!empty($cliente['RespostasLevantamento'])):
                            $respostas = array();
                            foreach ($cliente['RespostasLevantamento'] as $resposta) {
                                $respostas[$resposta['chave']] = array('preenchido_em' => $resposta['created'], 'preenchido_por' => $resposta['user_id']);
                            }
                            ?>
                            <div class="table-dataTable_wrapper panel-body">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th><?php echo __('Preenchido por'); ?></th>
                                        <th><?php echo __('Preenchido em'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    foreach ($respostas as $chave => $dados):
                                        ?>
                                        <tr>
                                            <td><?php echo $this->Util->mostraNomeUsuario($dados['preenchido_por']); ?></td>
                                            <td><?php echo $this->Util->format_date($dados['preenchido_em']); ?></td>
                                            <td class="actions">
                                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'RespostasLevantamentos', 'action' => 'view', $chave), array('escape' => false)); ?>
                                                <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'RespostasLevantamentos', 'action' => 'edit', $chave), array('escape' => false)); ?>
                                                <?php echo $this->Html->link(__('<span class="fa fa-building"></span>'), array('controller' => 'RespostasLevantamentos', 'action' => 'view', $chave, 'ext' => 'pdf'), array('title' => 'Plano de Ação', 'escape' => false, 'target' => '_blank')); ?>
                                                <?php echo $this->Html->link(__('<span class="fa fa-bar-chart-o fa-fw"></span>'), array('controller' => 'RespostasLevantamentos', 'action' => 'grafico', $cliente['Cliente']['id'], $chave), array('escape' => false, 'target' => '_blank')); ?>
                                                <?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'RespostasLevantamentos', 'action' => 'delete', $chave, $cliente['Cliente']['id']), array('escape' => false), __('Deseja remover o questionário com a data # %s?', $this->Util->format_date($dados['preenchido_em']))); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="acoes">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                                <ul class="links">
                                    <li><a href="<?= $this->base ?>/Tarefas/add/<?= $cliente['Cliente']['id'] ?>" data-toggle="modal", data-target="#myLargeModalLabel"><i class="glyphicon glyphicon-plus"></i>&nbsp;Adicionar</a></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php
                                $todasTarefas = array();
                                $tarefas = array();
                                $tarefasIMG = array();
                                $tarefasAvulsas = array();
                                foreach ($cliente['Tarefa'] as $tarefa) {
                                    $todasTarefas[] = $tarefa;
                                    $tarefas[$tarefa['status']][] = $tarefa;
                                    if (!empty($tarefa['resposta_levantamento_id'])) {
                                        $tarefasIMG[$tarefa['status']][] = $tarefa;
                                    } else {
                                        $tarefasAvulsas[$tarefa['status']][] = $tarefa;
                                    }
                                }
                                $status = $this->Util->statusAtividades();
                                if ($cliente['Cliente']['tipo'] == 'E'):
                                    ?>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills">
                                        <li class="active"><a href="#acoesGeral" data-toggle="tab">Geral</a></li>
                                        <li class=""><a href="#acoesIMGI" data-toggle="tab">IMGI</a></li>
                                        <li class=""><a href="#acoesAvulsas" data-toggle="tab">PA</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <p style="clear: both"></p>
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id = "acoesGeral">
                                            <ul class="nav nav-pills">
                                                <li class="active"><a href="#acoesGeralTodas" data-toggle="tab" style="background-color: #398ab9; color:#fff">Todas</a></li>
                                                <?php
                                                foreach ($status as $key => $nome):
                                                    ?>
                                                    <li class=""><a href="#acoesGeral<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                                    <?php
                                                endforeach;
                                                ?>
                                            </ul>
                                            <!-- Tab panes -->
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
                                                        if (isset($tarefas)):
                                                            foreach ($todasTarefas as $key => $tarefa):
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $tarefa['tarefa']; ?></td>
                                                                    <td><?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                                    <td><?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                                    <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                                    <td class="actions">
                                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
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
                                                foreach ($status as $key => $nome):
                                                    ?>
                                                    <div class="tab-pane fade in" id = "acoesGeral<?= $key ?>">
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
                                                            if (isset($tarefas[$key])):
                                                                foreach ($tarefas[$key] as $tarefa):
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $tarefa['tarefa']; ?></td>
                                                                        <td><?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                                        <td><?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                                        <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                                        <td class="actions">
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
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
                                        <div class="tab-pane fade in" id = "acoesIMGI">
                                            <ul class="nav nav-pills">
                                                <?php
                                                $i = 0;
                                                foreach ($status as $key => $nome):
                                                    $active = '';
                                                    if ($i == 0) {
                                                        $active = 'active';
                                                    }
                                                    ?>
                                                    <li class="<?= $active ?>"><a href="#acoesIMGI<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </ul>
                                            <!-- Tab panes -->
                                            <p style="clear: both"></p>
                                            <div class="tab-content">
                                                <?php
                                                $i = 0;
                                                foreach ($status as $key => $nome):
                                                    $active = '';
                                                    if ($i == 0) {
                                                        $active = 'active';
                                                    }
                                                    ?>
                                                    <div class="tab-pane fade in <?= $active ?>" id = "acoesIMGI<?= $key ?>">
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
                                                            if (isset($tarefasIMG[$key])):
                                                                foreach ($tarefasIMG[$key] as $tarefa):
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $tarefa['tarefa']; ?></td>
                                                                        <td><?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                                        <td><?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                                        <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                                        <td class="actions">
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
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
                                        <div class="tab-pane fade in" id = "acoesAvulsas">
                                            <ul class="nav nav-pills">
                                                <?php
                                                $i = 0;
                                                foreach ($status as $key => $nome):
                                                    $active = '';
                                                    if ($i == 0) {
                                                        $active = 'active';
                                                    }
                                                    ?>
                                                    <li class="<?= $active ?>"><a href="#acoesAvulsas<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </ul>
                                            <!-- Tab panes -->
                                            <p style="clear: both"></p>
                                            <div class="tab-content">
                                                <?php
                                                $i = 0;
                                                foreach ($status as $key => $nome):
                                                    $active = '';
                                                    if ($i == 0) {
                                                        $active = 'active';
                                                    }
                                                    ?>
                                                    <div class="tab-pane fade in <?= $active ?>" id = "acoesAvulsas<?= $key ?>">
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
                                                            if (isset($tarefasAvulsas[$key])):
                                                                foreach ($tarefasAvulsas[$key] as $tarefa):
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $tarefa['tarefa']; ?></td>
                                                                        <td><?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                                        <td><?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                                        <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                                        <td class="actions">
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                                            <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
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
                                    <?php
                                else:
                                    ?>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-pills">
                                        <?php
                                        $i = 0;
                                        foreach ($status as $key => $nome):
                                            $active = '';
                                            if ($i == 0) {
                                                $active = 'active';
                                            }
                                            ?>
                                            <li class="<?= $active ?>"><a href="#acoes<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                            <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </ul>
                                    <!-- Tab panes -->
                                    <p style="clear: both"></p>
                                    <div class="tab-content">
                                        <?php
                                        $i = 0;
                                        foreach ($status as $key => $nome):
                                            $active = '';
                                            if ($i == 0) {
                                                $active = 'active';
                                            }
                                            ?>
                                            <div class="tab-pane fade in <?= $active ?>" id = "acoes<?= $key ?>">
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
                                                    if (isset($tarefas[$key])):
                                                        foreach ($tarefas[$key] as $tarefa):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $tarefa['tarefa']; ?></td>
                                                                <td><?php echo (!empty($tarefa['inicio'])) ? $this->Util->format_date($tarefa['inicio']) : ''; ?> - <?php echo (!empty($tarefa['termino'])) ? $this->Util->format_date($tarefa['termino']) : ''; ?></td>
                                                                <td><?php echo (!empty($tarefa['colaborador_id'])) ? $this->Util->mostraNomeColaborador($tarefa['colaborador_id']) : ''; ?></td>
                                                                <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['status']) ?>" type="button"><?php echo (!empty($tarefa['status'])) ? $this->Util->statusAtividades($tarefa['status']) : ''; ?></button></td>
                                                                <td class="actions">
                                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
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
                                <?php
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id = "vagas">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                                <ul class="links">
                                    <?php
                                    if ($cliente['Cliente']['status'] <> 'R'):
                                        ?>
                                        <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Vaga'), array('controller' => 'vagas', 'action' => 'add', $cliente['Cliente']['id']), array('escape' => false)); ?></li>
                                        <?php
                                    endif;
                                    ?>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('Vaga', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id = "contratos">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                                <ul class="links">
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Contrato'), array('controller' => 'contratos', 'action' => 'add', $cliente['Cliente']['id']), array('data-toggle' => 'modal', 'data-target' => '#myModal', 'escape' => false)); ?></li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('Contrato', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('Contrato.cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id = "questionarios">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                                <ul class="links">
                                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp; Questinário'), array('controller' => 'clientes_questionarios', 'action' => 'add', $cliente['Cliente']['id']), array('escape' => false)); ?> </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('ClientesQuestionario', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('ClientesQuestionario.cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id = "historicos">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                            </div>
                            <div class="panel-body">
                                <?php echo $this->DataTable->render('ClientesHistorico', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('ClientesHistorico.cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id = "contatos">
                    <div class="table-dataTable_wrapper panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Listagem</h4>
                                <ul class="links">
                                    <li><?php echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span>&nbsp; Contato', array('controller' => 'clientes_contatos', 'action' => 'add', $cliente['Cliente']['id']), array('data-toggle' => 'modal', 'data-target' => '#myModal', 'escape' => false)); ?> </li>
                                </ul>
                            </div>
                            <div class="panel-body">
                                <table class="dataTable table table-striped table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Cargo</th>
                                            <th>Telefone</th>
                                            <th>Celular</th>
                                            <th>E-mail</th>
                                            <th>Observações</th>
                                            <th>Cadastrado por</th>
                                            <th>Cadastrado em</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($contatos as $contato) : ?>
                                            <tr>
                                                <td><?php echo $contato['ClientesContato']['nome'] ?></td>
                                                <td><?php echo $contato['Cargo']['nome'] ?></td>
                                                <td><?php echo $contato['ClientesContato']['telefone'] ?></td>
                                                <td><?php echo $contato['ClientesContato']['celular'] ?></td>
                                                <td><?php echo $contato['ClientesContato']['email'] ?></td>
                                                <td><?php echo $contato['ClientesContato']['observacoes'] ?></td>
                                                <td><?php echo $contato['User']['nome'] ?></td>
                                                <td><?php echo $contato['ClientesContato']['created'] ?></td>
                                                <td>
                                                    <?php
                                                    echo $this->Html->link('', ['controller' => 'clientes_contatos',
                                                        'action' => 'edit', $contato['ClientesContato']['id']], [
                                                        'class' => 'glyphicon glyphicon-edit']);
                                                    echo $this->Html->link('', ['controller' => 'clientes_contatos',
                                                        'action' => 'delete', $contato['ClientesContato']['id']], [
                                                        'class' => 'glyphicon glyphicon-remove']);
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <div class="panel-body">
                                <?php echo $this->DataTable->render('ClientesContato', array(), array('sAjaxSource' => array('action' => 'processDataTableRequest'), 'conditions' => array('ClientesContato.cliente_id' => $cliente['Cliente']['id']))) ?>
                            </div> -->
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
</div>