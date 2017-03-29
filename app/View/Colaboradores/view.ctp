<div class="colaboradores view">
<h2><?php  echo __('Colaborador'); ?></h2>
	<dl>
		<dt><?php echo __('Cód'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['nome']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Cargo'); ?></dt>
		<dd>
			<?php echo $colaborador['Cargo']['nome']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($colaborador['Colaborador']['ativo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $colaborador['Colaborador']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $colaborador['Colaborador']['id']), null, __('Deseja remover o colaborador # %s?', $colaborador['Colaborador']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?> </li>
	</ul>
</div>