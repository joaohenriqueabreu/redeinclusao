<div class="indicadoresAreas index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Areas'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Visualizar</h4>
					<ul class="links">
    							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar'), array('action' => 'edit', $indicadoresArea['IndicadoresArea']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $indicadoresArea['IndicadoresArea']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $indicadoresArea['IndicadoresArea']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;Listar'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?> </li>
					</ul>
                </div>
                <div class="panel-body">
        			<table cellpadding="0" cellspacing="0" class="table table-striped">
        				<tbody>
        				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($indicadoresArea['IndicadoresArea']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Nome'); ?></th>
		<td>
			<?php echo h($indicadoresArea['IndicadoresArea']['nome']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ativo'); ?></th>
		<td>
			<?php echo h($indicadoresArea['IndicadoresArea']['ativo']); ?>
			&nbsp;
		</td>
</tr>
        				</tbody>
        			</table>
                </div>
		    </div>
	    </div><!-- end col md 12 -->
	</div><!-- end row -->
</div><!-- end containing of content -->