<div class="clientesContatos view">
<h2><?php  echo __('Clientes Contato'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cliente'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesContato['Cliente']['razao_social'], array('controller' => 'clientes', 'action' => 'view', $clientesContato['Cliente']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesContato['Cargo']['nome'], array('controller' => 'cargos', 'action' => 'view', $clientesContato['Cargo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefone'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['telefone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Celular'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacoes'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['observacoes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($clientesContato['User']['id'], array('controller' => 'useres', 'action' => 'view', $clientesContato['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($clientesContato['ClientesContato']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Clientes Contato'), array('action' => 'edit', $clientesContato['ClientesContato']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Clientes Contato'), array('action' => 'delete', $clientesContato['ClientesContato']['id']), null, __('Are you sure you want to delete # %s?', $clientesContato['ClientesContato']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes Contatos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Clientes Contato'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clientes'), array('controller' => 'clientes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cliente'), array('controller' => 'clientes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cargos'), array('controller' => 'cargos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cargo'), array('controller' => 'cargos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Useres'), array('controller' => 'useres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'useres', 'action' => 'add')); ?> </li>
	</ul>
</div>
