<div class="gruposEtapas view">
<h2><?php  echo __('Grupo de Ação'); ?></h2>
	<dl>
		<dt><?php echo __('Cód.'); ?></dt>
		<dd>
			<?php echo h($gruposEtapa['GruposEtapa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($gruposEtapa['GruposEtapa']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
    <div id = "tabs">
        <ul>
            <li class=""><a href="#tabs-1">Ações</a></li>
        </ul>
        <div class = "related" id = "tabs-1">
              <?php if(!empty($gruposEtapa['Etapa'])): ?>
                	<table cellpadding = "0" cellspacing = "0">
                  	<tr>
                  		<th><?php echo __('Nome'); ?></th>
                  		<th><?php echo __('Ordem'); ?></th>
                          <th class="actions"><?php echo __('Actions'); ?></th>
                      </tr>
                      <?php foreach($gruposEtapa['Etapa'] as $etapa): ?>
                          <tr>
                              <td><?php echo $etapa['nome']?></td>
                              <td><?php echo $etapa['ordem']?></td>
                              <td class="actions">
                  				<?php echo $this->Html->link(__('Edit'), array('controller' => 'etapas', 'action' => 'edit', $etapa['id'])); ?>
                  				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'etapas', 'action' => 'delete', $etapa['id']), null, __('Deseja remover a ação # %s?', $etapa['nome'])); ?>
                  			</td>
                          </tr>
                      <?php endforeach; ?>
                  </table>
              <?php endif;?>
            <div class="actions">
          		<ul>
          			<li><?php echo $this->Html->link(__('New'), array('controller'=>'etapas', 'action' => 'add', $gruposEtapa['GruposEtapa']['id'])); ?></li>
          		</ul>
          	</div>
        </div>
    </div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gruposEtapa['GruposEtapa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gruposEtapa['GruposEtapa']['id']), null, __('Deseja remover o grupo # %s?', $gruposEtapa['GruposEtapa']['nome'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?> </li>
	</ul>
</div>