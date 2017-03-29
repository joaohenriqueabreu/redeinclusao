<div class="clientesContatos index">
	<h2><?php echo __('Clientes Contatos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cliente_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('cargo_id'); ?></th>
			<th><?php echo $this->Paginator->sort('telefone'); ?></th>
			<th><?php echo $this->Paginator->sort('celular'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('observacoes'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($clientesContatos as $clientesContato): ?>
	<tr>
		<td><?php echo h($clientesContato['ClientesContato']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientesContato['Cliente']['razao_social'], array('controller' => 'clientes', 'action' => 'view', $clientesContato['Cliente']['id'])); ?>
		</td>
		<td><?php echo h($clientesContato['ClientesContato']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientesContato['Cargo']['nome'], array('controller' => 'cargos', 'action' => 'view', $clientesContato['Cargo']['id'])); ?>
		</td>
		<td><?php echo h($clientesContato['ClientesContato']['telefone']); ?>&nbsp;</td>
		<td><?php echo h($clientesContato['ClientesContato']['celular']); ?>&nbsp;</td>
		<td><?php echo h($clientesContato['ClientesContato']['email']); ?>&nbsp;</td>
		<td><?php echo h($clientesContato['ClientesContato']['observacoes']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($clientesContato['User']['id'], array('controller' => 'useres', 'action' => 'view', $clientesContato['User']['id'])); ?>
		</td>
		<td><?php echo h($clientesContato['ClientesContato']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $clientesContato['ClientesContato']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientesContato['ClientesContato']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientesContato['ClientesContato']['id']), null, __('Are you sure you want to delete # %s?', $clientesContato['ClientesContato']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Clientes Contato'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Useres'), array('controller' => 'useres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'useres', 'action' => 'add')); ?> </li>
	</ul>
</div>
