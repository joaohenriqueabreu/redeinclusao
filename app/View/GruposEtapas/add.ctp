<div class="gruposEtapas form">
<?php echo $this->Form->create('GruposEtapa'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Grupo de Ação'); ?></legend>
	<?php
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
