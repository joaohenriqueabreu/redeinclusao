<div class="processosSeletivos view">
<h2><?php  echo __('Processos Seletivo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Candidato'); ?></dt>
		<dd>
			<?php echo $this->Html->link($processosSeletivo['Candidato']['nome'], array('controller' => 'candidatos', 'action' => 'view', $processosSeletivo['Candidato']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vaga'); ?></dt>
		<dd>
			<?php echo $this->Html->link($processosSeletivo['Vaga']['cargo'], array('controller' => 'vagas', 'action' => 'view', $processosSeletivo['Vaga']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observacoes'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['observacoes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrevista Triagem'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['entrevista_triagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrevista Psicologica'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['entrevista_psicologica']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrevista Tecnica'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['entrevista_tecnica']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teste Psicologica'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['teste_psicologica']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resultado'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['resultado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($processosSeletivo['ProcessosSeletivo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Processos Seletivo'), array('action' => 'edit', $processosSeletivo['ProcessosSeletivo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Processos Seletivo'), array('action' => 'delete', $processosSeletivo['ProcessosSeletivo']['id']), null, __('Are you sure you want to delete # %s?', $processosSeletivo['ProcessosSeletivo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Processos Seletivos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Processos Seletivo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidatos'), array('controller' => 'candidatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidato'), array('controller' => 'candidatos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vagas'), array('controller' => 'vagas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vaga'), array('controller' => 'vagas', 'action' => 'add')); ?> </li>
	</ul>
</div>
