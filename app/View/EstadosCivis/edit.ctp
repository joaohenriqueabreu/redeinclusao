<div class="estadosCivis form">
<?php echo $this->Form->create('EstadosCivil'); ?>
	<fieldset>
		<legend><?php echo __('Editar Estado Civil'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EstadosCivil.id')), null, __('Deseja remover o estado civil # %s?', $this->Form->value('EstadosCivil.nome'))); ?></li>
		<li><?php echo $this->Html->link(__('Lists'), array('action' => 'index')); ?></li>
	</ul>
</div>
