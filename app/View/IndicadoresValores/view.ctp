<div class="indicadoresValores index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Indicadores Valores'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->

	<div class="row">
		<div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Visualizar</h4>
					<ul class="links">
    							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Editar'), array('action' => 'edit', $indicadoresValor['IndicadoresValor']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Deletar'), array('action' => 'delete', $indicadoresValor['IndicadoresValor']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $indicadoresValor['IndicadoresValor']['id'])); ?> </li>
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
			<?php echo h($indicadoresValor['IndicadoresValor']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Indicadores Item'); ?></th>
		<td>
			<?php echo $this->Html->link($indicadoresValor['IndicadoresItem']['id'], array('controller' => 'indicadores_itens', 'action' => 'view', $indicadoresValor['IndicadoresItem']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ano'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['ano']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mes'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['mes']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Meta'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['meta']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Realizado'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['realizado']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($indicadoresValor['User']['id'], array('controller' => 'useres', 'action' => 'view', $indicadoresValor['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($indicadoresValor['IndicadoresValor']['modified']); ?>
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