<?php
if (isset($this->params->query['Acesso']) and $this->params->query['Acesso'] == 'externo'):
    ?>
    <? $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $( "#<?= $this->params->query['tarefa'] ?>" ).trigger( "click" );
    <? $this->Html->scriptEnd(); ?>
    <?php
endif;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Minhas Ações</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
            </div>
            <div class="panel-body">
                <?php
                //pr($tarefas);
                $todasTarefas = array();
                $tarefas = array();
                $todasTarefasIMGI = [];
                $todasTarefasAvulsas = [];
                $tarefasIMG = array();
                $tarefasAvulsas = array();
                foreach ($tarefasColaborador as $tarefa) {
                    $todasTarefas[] = $tarefa;
                    $tarefas[$tarefa['Tarefa']['status']][] = $tarefa;
                    if (!empty($tarefa['Tarefa']['resposta_levantamento_id'])) {
                        $todasTarefasIMGI[] = $tarefa;
                        $tarefasIMG[$tarefa['Tarefa']['status']][] = $tarefa;
                    } else {
                        $todasTarefasAvulsas[] = $tarefa;
                        $tarefasAvulsas[$tarefa['Tarefa']['status']][] = $tarefa;
                    }
                }
                $status = $this->Util->statusAtividades();
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
                                        <th><?php echo __('Por que fazer?'); ?></th>
                                        <th><?php echo __('Empresa'); ?></th>
                                        <th><?php echo __('Quando'); ?></th>
                                        <th><?php echo __('Anexo'); ?></th>
                                        <th><?php echo __('Status'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    if (isset($tarefas)):
                                        foreach ($todasTarefas as $key => $tarefa):
                                            ?>
                                            <tr>
                                                <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($tarefa['Tarefa']['anexo'])):
                                                        echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                <td class="actions">
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>

                                                    <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                        $tarefa['Tarefa']['id']], [
                                                        'class' => 'glyphicon glyphicon-remove',
                                                        'title' => 'Excluir registro',
                                                        'confirm' => 'Deseja excluir este registro?'
                                                    ]);?>
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
                                            <th><?php echo __('Por que fazer?'); ?></th>
                                            <th><?php echo __('Empresa'); ?></th>
                                            <th><?php echo __('Quando'); ?></th>
                                            <th><?php echo __('Anexo'); ?></th>
                                            <th><?php echo __('Status'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        if (isset($tarefas[$key])):
                                            foreach ($tarefas[$key] as $tarefa):
                                                ?>
                                                <tr>
                                                    <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                    <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                    <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                    <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                    <td>
                                                        <?php
                                                        if (!empty($tarefa['Tarefa']['anexo'])):
                                                            echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                        endif;
                                                        ?>
                                                    </td>
                                                    <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                    <td class="actions">
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                            $tarefa['Tarefa']['id']], [
                                                            'class' => 'glyphicon glyphicon-remove',
                                                            'title' => 'Excluir registro',
                                                            'confirm' => 'Deseja excluir este registro?'
                                                        ]);?>
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
                            <li class="active"><a href="#acoesIMGIG" data-toggle="tab" style="background-color: #398ab9; color:#fff">Todas</a></li>
                            <?php
                            $i = 0;
                            foreach ($status as $key => $nome):
                                ?>
                                <li class=""><a href="#acoesIMGI<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </ul>
                        <!-- Tab panes -->
                        <p style="clear: both"></p>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id = "acoesIMGIG">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th><?php echo __('Ação'); ?></th>
                                        <th><?php echo __('Por que fazer?'); ?></th>
                                        <th><?php echo __('Empresa'); ?></th>
                                        <th><?php echo __('Quando'); ?></th>
                                        <th><?php echo __('Anexo'); ?></th>
                                        <th><?php echo __('Status'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                    <?php
                                    if (isset($tarefas)):
                                        foreach ($todasTarefasIMGI as $key => $tarefa):
                                            ?>
                                            <tr>
                                                <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($tarefa['Tarefa']['anexo'])):
                                                        echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                <td class="actions">
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                    <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                        $tarefa['Tarefa']['id']], [
                                                        'class' => 'glyphicon glyphicon-remove',
                                                        'title' => 'Excluir registro',
                                                        'confirm' => 'Deseja excluir este registro?'
                                                    ]);?>
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
                                <div class="tab-pane fade in" id = "acoesIMGI<?= $key ?>">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th><?php echo __('Ação'); ?></th>
                                            <th><?php echo __('Por que fazer?'); ?></th>
                                            <th><?php echo __('Empresa'); ?></th>
                                            <th><?php echo __('Quando'); ?></th>
                                            <th><?php echo __('Anexo'); ?></th>
                                            <th><?php echo __('Status'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php
                                        if (isset($tarefasIMG[$key])):
                                            $i = 0;
                                            foreach ($tarefasIMG[$key] as $tarefa):
                                                ?>
                                                <tr>
                                                    <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                    <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                    <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                    <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                    <td>
                                                        <?php
                                                        if (!empty($tarefa['Tarefa']['anexo'])):
                                                            echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                        endif;
                                                        ?>
                                                    </td>
                                                    <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                    <td class="actions">
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                            $tarefa['Tarefa']['id']], [
                                                            'class' => 'glyphicon glyphicon-remove',
                                                            'title' => 'Excluir registro',
                                                            'confirm' => 'Deseja excluir este registro?'
                                                        ]);?>
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
                            <li class="active"><a href="#acoesAvulsasG" data-toggle="tab" style="background-color: #398ab9; color:#fff">Todas</a></li>
                            <?php
                            $i = 0;
                            foreach ($status as $key => $nome):
                                ?>
                                <li><a href="#acoesAvulsas<?= $key ?>" data-toggle="tab" style="background-color: <?= $this->Util->coresStatusAtividades($key) ?>; color:#fff"><?= $nome ?></a></li>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </ul>
                        <!-- Tab panes -->
                        <p style="clear: both"></p>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id = "acoesAvulsasG">
                                <table class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th><?php echo __('Ação'); ?></th>
                                        <th><?php echo __('Por que fazer?'); ?></th>
                                        <th><?php echo __('Empresa'); ?></th>
                                        <th><?php echo __('Quando'); ?></th>
                                        <th><?php echo __('Anexo'); ?></th>
                                        <th><?php echo __('Status'); ?></th>
                                        <th class="actions"><?php echo __('Actions'); ?></th>
                                    </tr>
                                    <?php
                                    if (isset($tarefas)):
                                        foreach ($todasTarefasAvulsas as $key => $tarefa):
                                            ?>
                                            <tr>
                                                <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($tarefa['Tarefa']['anexo'])):
                                                        echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                    endif;
                                                    ?>
                                                </td>
                                                <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                <td class="actions">
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                    <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                    <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                        $tarefa['Tarefa']['id']], [
                                                        'class' => 'glyphicon glyphicon-remove',
                                                        'title' => 'Excluir registro',
                                                        'confirm' => 'Deseja excluir este registro?'
                                                    ]);?>
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
                                <div class="tab-pane fade in" id = "acoesAvulsas<?= $key ?>">
                                    <table class="table table-striped table-bordered table-hover">
                                        <tr>
                                            <th><?php echo __('Ação'); ?></th>
                                            <th><?php echo __('Por que fazer?'); ?></th>
                                            <th><?php echo __('Empresa'); ?></th>
                                            <th><?php echo __('Quando'); ?></th>
                                            <th><?php echo __('Anexo'); ?></th>
                                            <th><?php echo __('Status'); ?></th>
                                            <th class="actions"><?php echo __('Actions'); ?></th>
                                        </tr>
                                        <?php
                                        $i = 0;
                                        if (isset($tarefasAvulsas[$key])):
                                            foreach ($tarefasAvulsas[$key] as $tarefa):
                                                ?>
                                                <tr>
                                                    <td><?php echo $tarefa['Tarefa']['tarefa']; ?></td>
                                                    <td><?php echo $tarefa['Tarefa']['por_que_fazer']; ?></td>
                                                    <td><?= $tarefa['Cliente']['razao_social'] ?></td>
                                                    <td><?php echo (!empty($tarefa['Tarefa']['inicio'])) ? $this->Util->format_date($tarefa['Tarefa']['inicio']) : ''; ?> - <?php echo (!empty($tarefa['Tarefa']['termino'])) ? $this->Util->format_date($tarefa['Tarefa']['termino']) : ''; ?></td>
                                                    <td>
                                                        <?php
                                                        if (!empty($tarefa['Tarefa']['anexo'])):
                                                            echo '<div>' . $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/tarefa/anexo/' . $tarefa['Tarefa']['dir'] . '/' . $tarefa['Tarefa']['anexo'], array('target' => '_blank', 'escape' => false)) . '</div>';
                                                        endif;
                                                        ?>
                                                    </td>
                                                    <td><button class="btn btn-default" style="color:#fff; background-color: <?= $this->Util->coresStatusAtividades($tarefa['Tarefa']['status']) ?>" type="button"><?php echo (!empty($tarefa['Tarefa']['status'])) ? $this->Util->statusAtividades($tarefa['Tarefa']['status']) : ''; ?></button></td>
                                                    <td class="actions">
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-cog"></span>'), array('controller' => 'acoes', 'action' => 'add', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#subModal', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'tarefas', 'action' => 'view', $tarefa['Tarefa']['id']), array('id' => $tarefa['Tarefa']['id'], 'data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'tarefas', 'action' => 'edit', $tarefa['Tarefa']['id']), array('data-toggle' => 'modal', 'data-target' => '#myLargeModalLabel', 'escape' => false)); ?>
                                                        <?php echo $this->Form->postLink('', ['action' => 'delete',
                                                            $tarefa['Tarefa']['id']], [
                                                            'class' => 'glyphicon glyphicon-remove',
                                                            'title' => 'Excluir registro',
                                                            'confirm' => 'Deseja excluir este registro?'
                                                        ]);?>
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
<!--</div>
</div>
</div>-->