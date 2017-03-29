<div class="pretensoesSalariais view">
<h2><?php  echo __('Pretensoes Salarial'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pretensoesSalarial['PretensoesSalarial']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Inicial'); ?></dt>
		<dd>
			<?php echo h($pretensoesSalarial['PretensoesSalarial']['inicial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Final'); ?></dt>
		<dd>
			<?php echo h($pretensoesSalarial['PretensoesSalarial']['final']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pretensoes Salarial'), array('action' => 'edit', $pretensoesSalarial['PretensoesSalarial']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pretensoes Salarial'), array('action' => 'delete', $pretensoesSalarial['PretensoesSalarial']['id']), null, __('Are you sure you want to delete # %s?', $pretensoesSalarial['PretensoesSalarial']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pretensoes Salariais'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pretensoes Salarial'), array('action' => 'add')); ?> </li>
	</ul>
</div>
