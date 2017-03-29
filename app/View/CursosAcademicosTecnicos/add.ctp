<div class="cursosAcademicosTecnicos form">
<?php echo $this->Form->create('CursosAcademicosTecnico'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Curso Acadêmico | Técnico'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo', array('type'=>'radio', 'options'=>$tipos));
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
