<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Tipos de Educação
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
                        <a href="<?= $this->base ?>/tipoEducacao/add" 
                           data-original-title="" title="">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;Adicionar</a>
                    </li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php echo $this->Session->flash('educacoes'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?php echo $this->Paginator->sort('descricao'); ?></th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($educacoes as $educacao) : ?>
                                <tr>
                                    <td>
                                        <?php echo $educacao['TipoEducacao']['descricao']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $this->Html->link('', ['action' => 'edit',
                                            $educacao['TipoEducacao']['id']], [
                                            'class' => 'glyphicon glyphicon-edit',
                                            'title' => 'Editar registro'
                                        ]);
                                        echo $this->Form->postLink('', ['action' => 'delete',
                                            $educacao['TipoEducacao']['id']], [
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