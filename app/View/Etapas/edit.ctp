<div class="etapas form">
<?php echo $this->Form->create('Etapa'); ?>
	<fieldset>
		<legend><?php echo __('Editar Ações'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('grupo_etapa_id', array('type'=>'hidden'));
		echo $this->Form->input('nome');
		echo $this->Form->input('descricao', array('label'=>'Descrição'));
        echo $this->Form->input('ordem', array('onkeypress'=>'return OnlyNumbers(event)'));
		echo $this->Form->input('ativo', array('type'=>'radio', 'options'=>array('S'=>'Sim', 'N'=>'Não')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Etapa.id')), null, __('Deseja remover a etapa # %s?', $this->Form->value('Etapa.nome'))); ?></li>
		<li><?php echo $this->Html->link(__('Voltar'), 'javascript:window.history.go(-1)'); ?></li> 
	</ul>
</div>
