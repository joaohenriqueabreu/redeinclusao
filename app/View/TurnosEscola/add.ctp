<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Turnos escolares
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('TurnosEscola', array('role' => 'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li>
                        <a
                            href="<?= $this->base ?>/turnosEscola"
                            data-original-title="" title=""> <i class="fa  fa-list "></i>&nbsp;&nbsp;Voltar
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <?php echo $this->Session->flash('turnos'); ?>
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('turno', array('class' => 'form-control', 'label' => 'Turno')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
