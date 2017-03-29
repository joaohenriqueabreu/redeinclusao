<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Grupos
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?= $this->Session->flash('grupos') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li>
                        <a href="<?= $this->base ?>/groups/add" 
                           data-original-title="" title="">
                            <i class="glyphicon glyphicon-plus"></i>
                            &nbsp;&nbsp;Adicionar</a>
                    </li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-bordered">
                        <tr>
                            <th><?php echo $this->Paginator->sort('id', 'Código'); ?></th>
                            <th><?php echo $this->Paginator->sort('name', 'Nome'); ?></th>
                            <th class="actions">Ações</th>
                        </tr>
                        <?php foreach ($groups as $group): ?>
                            <tr>
                                <td>
                                    <?php echo $group['Group']['id']; ?>
                                </td>
                                <td>
                                    <?php echo $group['Group']['name']; ?>
                                </td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link('', array(
                                        'action' => 'edit', $group['Group']['id']), array(
                                        'class' => 'glyphicon glyphicon-edit'));
                                    ?>
                                    <?php
                                    echo $this->Form->postLink('', array(
                                        'action' => 'delete',
                                        $group['Group']['id']), [
                                        'class' => 'glyphicon glyphicon-remove'
                                            ], __('Deseja remover o grupo # %s?', $group['Group']['name']));
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <ul class="pagination">
                        <?php
                        echo $this->Paginator->prev('<', ['tag' => 'li',
                            'disabledTag' => 'a']);
                        echo $this->Paginator->numbers(['tag' => 'li',
                            'separator' => '', 'currentClass' => 'active',
                            'currentTag' => 'a']);
                        echo $this->Paginator->next('>', ['tag' => 'li',
                            'disabledTag' => 'a']);
                        ?>
                    </ul>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
