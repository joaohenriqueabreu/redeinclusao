<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Questionários</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Questionario'); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/questionarios" data-original-title="" title=""><i class="fa  fa-list "></i>&nbsp;&nbsp;Listar</a></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-sm-12">
                        <div class="form-group">
      				        <?php echo $this->Form->input('titulo', array('class' => 'form-control', 'label' => 'Título')); ?>
      				    </div>
      				</div>
                </div>
                <div class="row no-gutter">
                    <div class="col-sm-12">
                        <div class="form-group">
      				        <?php echo $this->Form->input('descricao', array('class' => 'form-control', 'label' => 'Descrição')); ?>
      				    </div>
      				</div>
                </div>
                <div class="row no-gutter">
                    <div class="col-sm-2">
                        <div class="form-group">
      				        <?php echo $this->Form->input('ativo', array('class' => 'form-control', 'label' => 'Ativo', 'empty' => 'Selecione', 'options'=>array('S'=>'Sim', 'N'=>'Não'))); ?>
      				    </div>
      				</div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
