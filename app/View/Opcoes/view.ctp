<div class="opcoes view">
<h2><?php  echo __('Opcao'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pergunta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opcao['Pergunta']['titulo'], array('controller' => 'perguntas', 'action' => 'view', $opcao['Pergunta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($opcao['Questionario']['titulo'], array('controller' => 'questionarios', 'action' => 'view', $opcao['Questionario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resposta'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['resposta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Opcao'), array('action' => 'edit', $opcao['Opcao']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Opcao'), array('action' => 'delete', $opcao['Opcao']['id']), null, __('Are you sure you want to delete # %s?', $opcao['Opcao']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Opcoes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opcao'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perguntas'), array('controller' => 'perguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pergunta'), array('controller' => 'perguntas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionarios'), array('controller' => 'questionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionario'), array('controller' => 'questionarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
