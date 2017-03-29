<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Histórico
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Historico', array('role' => 'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li>
                        <a
                            href="<?= $this->base ?>/Historicos"
                            data-original-title="" title=""> <i class="fa  fa-list "></i>&nbsp;&nbsp;Voltar
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <?php echo $this->Session->flash('historicos'); ?>
                    <div class="col-lg-3 col-sm-3 col-sx-3">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('id');
                            echo $this->Form->input('cliente_id', array('class' => 'form-control', 
                                'label' => 'Escola', 'options' => $escolas));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-sx-2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('data', array('class' => 'form-control', 'label' => 'Data',
                                'value' => date('d/m/Y'), 'type' => 'text'));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-sx-2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('hora', array('class' => 'form-control', 'label' => 'Hora',
                                'value' => date('H:i'), 'type' => 'text'));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-sx-2">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Usuário',
                                'default' => $logado['id'], 'options' => $users));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-sx-3">
                        <div class="form-group">
                            <?php
                            echo $this->Form->input('tipo_historico_id', array('class' => 'form-control', 
                                'label' => 'Tipo de histórico', 'options' => $tiposHistorico));
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 col-sx-12">
                        <div class="form-group">
                            <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'label' => 'Descrição')); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
