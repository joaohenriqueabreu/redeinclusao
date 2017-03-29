<div class="etapas view">
<h2><?php  echo __('Etapa'); ?></h2>
	<dl>
		<dt><?php echo __('Cód'); ?></dt>
		<dd>
			<?php echo h($etapa['Etapa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grupos Etapa'); ?></dt>
		<dd>
			<?php echo $etapa['GruposEtapa']['nome']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($etapa['Etapa']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descrição'); ?></dt>
		<dd>
			<?php echo h($etapa['Etapa']['descricao']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Ordem'); ?></dt>
		<dd>
			<?php echo h($etapa['Etapa']['ordem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ativo'); ?></dt>
		<dd>
			<?php echo h($etapa['Etapa']['ativo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $etapa['Etapa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $etapa['Etapa']['id']), null, __('Deseja remover a etapa # %s?', $etapa['Etapa']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?> </li>
	</ul>
</div>