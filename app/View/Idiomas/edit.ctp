<div class="idiomas form">
<?php echo $this->Form->create('Idioma'); ?>
	<fieldset>
		<legend><?php echo __('Editar Idioma'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Idioma.id')), null, __('Deseja remover o idioma # %s?', $this->Form->value('Idioma.nome'))); ?></li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
