<div class="respostas view">
<h2><?php  echo __('Resposta'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($resposta['Resposta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resposta['Questionario']['titulo'], array('controller' => 'questionarios', 'action' => 'view', $resposta['Questionario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pergunta'); ?></dt>
		<dd>
			<?php echo $this->Html->link($resposta['Pergunta']['titulo'], array('controller' => 'perguntas', 'action' => 'view', $resposta['Pergunta']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Resposta'); ?></dt>
		<dd>
			<?php echo h($resposta['Resposta']['resposta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($resposta['Resposta']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resposta'), array('action' => 'edit', $resposta['Resposta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Resposta'), array('action' => 'delete', $resposta['Resposta']['id']), null, __('Are you sure you want to delete # %s?', $resposta['Resposta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Respostas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resposta'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionarios'), array('controller' => 'questionarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionario'), array('controller' => 'questionarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perguntas'), array('controller' => 'perguntas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pergunta'), array('controller' => 'perguntas', 'action' => 'add')); ?> </li>
	</ul>
</div>
