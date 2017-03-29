<div class="etapas form">
<?php echo $this->Form->create('Etapa'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Ações'); ?></legend>
	<?php
		echo $this->Form->input('grupo_etapa_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
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
		<li><?php echo $this->Html->link(__('Voltar'), 'javascript:window.history.go(-1)'); ?></li>
	</ul>
</div>
