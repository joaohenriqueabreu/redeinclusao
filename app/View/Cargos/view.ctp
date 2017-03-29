<div class="cargos view">
<h2><?php  echo __('Cargo'); ?></h2>
	<dl>
		<dt><?php echo __('Cód.'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($cargo['Cargo']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cargo['Cargo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cargo['Cargo']['id']), null, __('Deseja remover o cargo # %s?', $cargo['Cargo']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?> </li>
	</ul>
</div>