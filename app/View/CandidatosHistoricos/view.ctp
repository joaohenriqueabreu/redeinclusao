<div class="candidatosHistoricos view">
<h2><?php  echo __('Candidatos Historico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($candidatosHistorico['CandidatosHistorico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Candidato'); ?></dt>
		<dd>
			<?php echo $this->Html->link($candidatosHistorico['Candidato']['nome'], array('controller' => 'candidatos', 'action' => 'view', $candidatosHistorico['Candidato']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data'); ?></dt>
		<dd>
			<?php echo h($candidatosHistorico['CandidatosHistorico']['data']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($candidatosHistorico['CandidatosHistorico']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($candidatosHistorico['User']['id'], array('controller' => 'useres', 'action' => 'view', $candidatosHistorico['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($candidatosHistorico['CandidatosHistorico']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Candidatos Historico'), array('action' => 'edit', $candidatosHistorico['CandidatosHistorico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Candidatos Historico'), array('action' => 'delete', $candidatosHistorico['CandidatosHistorico']['id']), null, __('Are you sure you want to delete # %s?', $candidatosHistorico['CandidatosHistorico']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidatos Historicos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidatos Historico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidatos'), array('controller' => 'candidatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidato'), array('controller' => 'candidatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Useres'), array('controller' => 'useres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'useres', 'action' => 'add')); ?> </li>
	</ul>
</div>
