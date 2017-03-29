<div class="origens form">
<?php echo $this->Form->create('Origem'); ?>
	<fieldset>
		<legend><?php echo __('Editar Origem'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Origem.id')), null, __('Deseja remover a origem # %s?', $this->Form->value('Origem.nome'))); ?></li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
