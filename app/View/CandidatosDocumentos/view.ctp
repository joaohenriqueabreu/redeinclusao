<div class="candidatosDocumentos view">
<h2><?php  echo __('Candidatos Documento'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Candidato Id'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['candidato_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Arquivo'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['arquivo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dir'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['dir']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($candidatosDocumento['CandidatosDocumento']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Candidatos Documento'), array('action' => 'edit', $candidatosDocumento['CandidatosDocumento']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Candidatos Documento'), array('action' => 'delete', $candidatosDocumento['CandidatosDocumento']['id']), null, __('Are you sure you want to delete # %s?', $candidatosDocumento['CandidatosDocumento']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidatos Documentos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidatos Documento'), array('action' => 'add')); ?> </li>
	</ul>
</div>
