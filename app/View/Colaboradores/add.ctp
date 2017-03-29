<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Colaborador</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Colaborador', array('role'=>'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
        					<?php echo $this->Form->input('nome', array('label'=>'Nome', 'required'=>'required', 'class' => 'form-control'));?>
      				    </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-sx-6">
                        <div class="form-group">
        			        <?php echo $this->Form->input('cargo_id', array('empty'=>'Selecione', 'options'=>$cargos, 'required'=>'required', 'class' => 'form-control')); ?>
        			    </div>
                    </div>
               </div>
               <div class="row no-gutter">
                  <div class="col-lg-3 col-sm-3 col-sx-3">
                      <div class="form-group">
        					<?php echo $this->Form->input('ativo', array('empty' => 'Selecione', 'required'=>'required', 'class' => 'form-control', 'options' => $this->Util->statusAtivo())); ?>
        				</div>
                  </div>
              </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
    </div>
    <?php echo $this->Form->end(); ?>
</div>