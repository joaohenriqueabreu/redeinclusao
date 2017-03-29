<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Menus
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?= $this->Session->flash('menu') ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li>
                        <a href="<?= $this->base ?>/menus/add" 
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
                            <th><?php echo $this->Paginator->sort('titulo', 'Título'); ?></th>
                            <th><?php echo $this->Paginator->sort('controller', 'Controlador'); ?></th>
                            <th><?php echo $this->Paginator->sort('action', 'Ação executada'); ?></th>
                            <th><?php echo $this->Paginator->sort('ordem', 'Posição no menu'); ?></th>
                            <th><?php echo $this->Paginator->sort('parent', 'Menu Principal'); ?></th>
                            <th>Grupos permitidos</th>
                            <th class="actions">Ações</th>
                        </tr>
                        <?php
                        $i = 0;
                        foreach ($menus as $menu):
                            $class = null;
                            if ($i++ % 2 == 0) {
                                $class = ' class="altrow"';
                            }
                            ?>
                            <tr<?php echo $class; ?>>
                                <td>
                                    <?php echo $menu['Menu']['titulo']; ?>
                                </td>
                                <td>
                                    <?php echo $menu['Menu']['controller']; ?>
                                </td>
                                <td>
                                    <?php echo $menu['Menu']['action']; ?>
                                </td>
                                <td>
                                    <?php echo $menu['Menu']['ordem']; ?>
                                </td>
                                <td>
                                    <?php if (array_key_exists($menu['Menu']['parent'], $menuParent) || $menu['Menu']['parent'] == 0) : ?>
                                        <?= ($menu['Menu']['parent'] == 0) ? 'Padrão' : $menuParent[$menu['Menu']['parent']]; ?>
                                    <?php else : ?>
                                        <span class="text-danger">Menu não existe!</span>
                                    <?php endif; ?>
                                </td>
                                <td class="col-sm-3">
                                    <?php foreach ($menu['Group'] as $group) : ?>
                                        <?= $group['name'] ?> - 
                                    <?php endforeach; ?>
                                </td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link('', array(
                                        'action' => 'edit', $menu['Menu']['id']), array(
                                        'class' => 'glyphicon glyphicon-edit'));
                                    ?>
                                    <?php
                                    echo $this->Form->postLink('', array(
                                        'action' => 'delete',
                                        $menu['Menu']['id']), [
                                        'class' => 'glyphicon glyphicon-remove'
                                            ], __('Deseja remover o menu # %s?', $menu['Menu']['titulo']));
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
