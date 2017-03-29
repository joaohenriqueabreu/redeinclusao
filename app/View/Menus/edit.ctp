<?php
echo $this->Html->script('cep', array(
    'block' => 'customArchives'
));
echo $this->Html->script('global', array(
    'block' => 'customArchives'
));
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Menu
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?= $this->Session->flash('menu') ?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Menu', array('role' => 'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><a href="javascript:history.back(1);"
                           data-original-title="" title=""> <i
                                class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar
                        </a></li>
                    <li><a
                            href="<?= $this->base ?>/menus/index"
                            data-original-title="" title=""> <i class="fa  fa-list "></i>&nbsp;&nbsp;Listar
                        </a></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('titulo', array('label' => 'Título:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('icone', array('label' => 'Ícone:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('controller', array('label' => 'Controller:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('action', array('label' => 'Action:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('ordem', array('label' => 'Ordem:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('parent', array(
                                'type' => 'select', 'options' => $parent,
                                'empty' => array('0' => 'Padrão'), 'label' => 'Menu Principal:',
                                'class' => 'form-control'));
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row no-gutter">
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('Group', [
                                'label' => 'Grupos:', 'class' => 'form-control'
                            ]);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>