<div class="pretensoesSalariais form">
<?php echo $this->Form->create('PretensoesSalarial'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Pretensão Salarial'); ?></legend>
	<?php
		echo $this->Form->input('inicial', array('label'=>'Inícial', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)'));
		echo $this->Form->input('final', array('label'=>'Final', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pretensoes Salariais'), array('action' => 'index')); ?></li>
	</ul>
</div>
