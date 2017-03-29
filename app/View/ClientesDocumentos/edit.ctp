<div class="candidatosDocumentos form">
<?php echo $this->Form->create('ClientesDocumento', array('type'=>'file')); ?> 
	<fieldset>
		<legend><?php echo __('Editar Documento'); ?> - <?=$this->data['Cliente']['razao_social']?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cliente_id', array('type'=>'hidden'));
		echo $this->Form->input('descricao', array('label'=>'Descrição'));
		echo $this->Form->input('arquivo', array('type'=>'file'));
		echo $this->Form->input('dir', array('type'=>'hidden'));
		echo $this->Form->input('user_id', array('type'=>'hidden'));
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
