<div class="pretensoesSalariais form">
<?php echo $this->Form->create('PretensoesSalarial'); ?>
	<fieldset>
		<legend><?php echo __('Editar Pretensão Salarial'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('inicial', array('label'=>'Inícial', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)'));
		echo $this->Form->input('final', array('label'=>'Final', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PretensoesSalarial.id')), null, __('Deseja remover a pretensão salarial # %s?', $this->Form->value('PretensoesSalarial.inicio').' a '.$this->Form->value('PretensoesSalarial.final'))); ?></li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
