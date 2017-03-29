<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Grupo
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<?= $this->Session->flash('grupo') ?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Group', array('role' => 'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><a href="javascript:history.back(1);"
                           data-original-title="" title=""> <i
                                class="fa fa-angle-double-left"></i>&nbsp;&nbsp;Voltar
                        </a></li>
                    <li><a
                            href="<?= $this->base ?>/groups/index"
                            data-original-title="" title=""> <i class="fa  fa-list "></i>&nbsp;&nbsp;Listar
                        </a></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('name', array('label' => 'Título:',
                                'class' => 'form-control'));
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