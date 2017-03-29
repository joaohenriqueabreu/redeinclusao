<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Tipos de evento
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li>
                        <a href="<?= $this->base ?>/EventosTipos/add" 
                           data-original-title="" title="">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;Adicionar</a>
                    </li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php echo $this->Session->flash('tiposEvento'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('name', 'Descrição'); ?></th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tiposEventos as $tiposEvento) : ?>
                                <tr>
                                    <td>
                                        <?php echo $tiposEvento['EventosTipo']['name']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $this->Html->link('', ['action' => 'edit',
                                            $tiposEvento['EventosTipo']['id']], [
                                            'class' => 'glyphicon glyphicon-edit',
                                            'title' => 'Editar registro'
                                        ]);
                                        echo $this->Form->postLink('', ['action' => 'delete',
                                            $tiposEvento['EventosTipo']['id']], [
                                            'class' => 'glyphicon glyphicon-remove',
                                            'title' => 'Excluir registro',
                                            'confirm' => 'Deseja excluir este registro?'
                                        ]);
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>