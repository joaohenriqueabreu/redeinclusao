<div class="cursosAcademicosTecnicos form">
<?php echo $this->Form->create('CursosAcademicosTecnico'); ?>
	<fieldset>
		<legend><?php echo __('Edita Curso Acadêmico | Técnico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('tipo', array('type'=>'radio', 'options'=>$tipos));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CursosAcademicosTecnico.id')), null, __('Deseja remover o curso # %s?', $this->Form->value('CursosAcademicosTecnico.nome'))); ?></li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
