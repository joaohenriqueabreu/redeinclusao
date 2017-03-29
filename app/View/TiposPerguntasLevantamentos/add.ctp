<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h4><div class="fs1" aria-hidden="true"></div>ProjetosTiposPerguntasLevantamentos</h4>
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
                        <h4>Adicionar</h4>
    				    <ul class="links">
                            							<li><?php echo $this->Html->link(__('<i class="fa  fa-list "></i>&nbsp;&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?></li>
    					</ul>
  			        </div>
                    <div class="panel-body">
                        			<?php echo $this->Form->create('ProjetosTiposPerguntasLevantamento', array('role' => 'form')); ?>

                        				<div class="form-group">
					<?php echo $this->Form->input('nome', array('class' => 'form-control'));?>
				</div>
					<button class="btn btn-success" type="submit">Enviar</button>
			<?php echo $this->Form->end() ?>

                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>