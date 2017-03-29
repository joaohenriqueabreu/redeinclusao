<div class="gruposEtapas index">
	<h2><?php echo __('Grupos de Ações'); ?></h2>
    <p class = "both">
    	<?php
    	    echo $this->Paginator->counter(array(
    	        'format' => __('<b>Página {:page}</b> (do total {:pages}) - <b>exibindo de {:start} a {:end}</b> (do total {:count} registro(s)')
    	    ));
    	?>
    </p>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id', 'Cód'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($gruposEtapas as $gruposEtapa): ?>
	<tr>
		<td><?php echo h($gruposEtapa['GruposEtapa']['id']); ?>&nbsp;</td>
		<td><?php echo h($gruposEtapa['GruposEtapa']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gruposEtapa['GruposEtapa']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gruposEtapa['GruposEtapa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gruposEtapa['GruposEtapa']['id']), null, __('Deseja remover o grupo # %s?', $gruposEtapa['GruposEtapa']['nome'])); ?>
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
