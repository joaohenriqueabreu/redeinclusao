<?php
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h1 class="page-header">Questionário de Levantamento</h1>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Adicionar Pergunta</h4>
    				    <ul class="links">
                            <li><?php echo $this->Html->link(__('<i class="fa  fa-list "></i>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        <?php echo $this->Form->create('PerguntasLevantamento', array('role' => 'form')); ?>
                        <div class="form-group">
        					<?php echo $this->Form->input('tipo_pergunta_levantamento_id', array('label'=>'Tipo', 'required'=>'required', 'empty'=>'Selecione', 'options'=>$tiposPerguntasLevantamentos, 'class' => 'form-control'));?>
        				</div>
        				<div class="form-group">
        					<?php echo $this->Form->input('pergunta', array('class' => 'form-control', 'required'=>'required'));?>
        				</div>
        				<div class="form-group">
        					<?php echo $this->Form->input('peso', array('class' => 'form-control', 'onkeypress'=>'return OnlyNumbers(event)', 'required'=>'required'));?>
        				</div>
        				<div class="form-group">
        					<?php echo $this->Form->input('ativa', array('required'=>'required', 'empty'=>'Selecione', 'class' => 'form-control', 'options'=>$this->Util->statusAtivo()));?>
        				</div>
					    <button class="btn btn-primary" type="submit">Salvar</button>
			            <?php echo $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>