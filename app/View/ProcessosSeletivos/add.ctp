<div class="processosSeletivos form">
<?php echo $this->Form->create('ProcessosSeletivo'); ?>
	<fieldset>
		<legend><?php echo __('Add Processos Seletivo'); ?></legend>
	<?php
		echo $this->Form->input('candidato_id');
		echo $this->Form->input('vaga_id');
		echo $this->Form->input('observacoes');
		echo $this->Form->input('entrevista_triagem');
		echo $this->Form->input('entrevista_psicologica');
		echo $this->Form->input('entrevista_tecnica');
		echo $this->Form->input('teste_psicologica');
		echo $this->Form->input('resultado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Processos Seletivos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Candidatos'), array('controller' => 'candidatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidato'), array('controller' => 'candidatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vagas'), array('controller' => 'vagas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaga'), array('controller' => 'vagas', 'action' => 'add')); ?> </li>
	</ul>
</div>
