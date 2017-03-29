<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h4><div class="fs1" aria-hidden="true"></div>ProjetosTiposPerguntasLevantamentos</h4>
	</div>
</div>
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Visualizar</h4>
    				    <ul class="links">
                            		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>&nbsp&nbsp;Editar'), array('action' => 'edit', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-remove"></i>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']), array('escape' => false), __('Deseja remover o registro # %s?', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-list"></i>&nbsp&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i>&nbsp&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?> </li>
    					</ul>
  			        </div>
                    <div class="panel-body">
            			<table cellpadding="0" cellspacing="0" class="table table-striped">
            				<tbody>
            				<tr>
		<th style="width:10%"><?php echo __('Cód.'); ?></th>
		<td>
			<?php echo h($projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th style="width:10%"><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['nome']); ?>
			&nbsp;
		</td>
</tr>
            				</tbody>
            			</table>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Spacer ends -->
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <div class="panel panel-default">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                            </ul>
            <p style="clear: both"></p>
            <div class="tab-content">

                        </div>
        </div>
	</div>
	<!-- Spacer ends -->
</div>