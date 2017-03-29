<div class="estadosCivis view">
<h2><?php  echo __('Estados Civil'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($estadosCivil['EstadosCivil']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($estadosCivil['EstadosCivil']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Estados Civil'), array('action' => 'edit', $estadosCivil['EstadosCivil']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Estados Civil'), array('action' => 'delete', $estadosCivil['EstadosCivil']['id']), null, __('Are you sure you want to delete # %s?', $estadosCivil['EstadosCivil']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Estados Civis'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Estados Civil'), array('action' => 'add')); ?> </li>
	</ul>
</div>
