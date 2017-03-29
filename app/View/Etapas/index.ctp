<div class="etapas index">
	<h2><?php echo __('Etapas'); ?></h2>
    <p>
    	<?php
    	echo $this->Paginator->counter(array(
        'format' => __('<b>Página {:page}</b> (do total {:pages}) - <b>exibindo de {:start} a {:end}</b> (do total {:count} registro(s))')
    	));
    	?>
    </p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'Cód'); ?></th>
			<th><?php echo $this->Paginator->sort('grupo_etapa_id', 'Grupo'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('ordem'); ?></th>
			<th><?php echo $this->Paginator->sort('ativo'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($etapas as $etapa): ?>
	<tr>
		<td><?php echo h($etapa['Etapa']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($etapa['GruposEtapa']['nome'], array('controller' => 'grupos_etapas', 'action' => 'view', $etapa['GruposEtapa']['id'])); ?>
		</td>
		<td><?php echo h($etapa['Etapa']['nome']); ?>&nbsp;</td>
		<td><?php echo h($etapa['Etapa']['ordem']); ?>&nbsp;</td>
		<td><?php echo h($etapa['Etapa']['ativo'] == 'S')? 'Sim' : 'Não'; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $etapa['Etapa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $etapa['Etapa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $etapa['Etapa']['id']), null, __('Deseja remover a etapa # %s?', $etapa['Etapa']['nome'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?></li>
	</ul>
</div>
