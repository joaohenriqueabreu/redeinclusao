<script>
    $(document).ready(function(){
        <?php if(!empty($this->params['pass'][1])): ?>
            $('#tabs').tabs('select', '#tabs-<?=$this->params['pass'][1]?>');
        <?php endif; ?>
    });
</script>
<div class="perguntas view">
<h2><?php  echo __('Pergunta'); ?></h2>
	<dl>
		<dt><?php echo __('Cód'); ?></dt>
		<dd>
			<?php echo h($pergunta['Pergunta']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Questionário'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pergunta['Questionario']['titulo'], array('controller' => 'questionarios', 'action' => 'view', $pergunta['Questionario']['id'])); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Tipo da Pergunta'); ?></dt>
		<dd>
			<?php echo $pergunta['TiposPergunta']['nome']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Título'); ?></dt>
		<dd>
			<?php echo h($pergunta['Pergunta']['titulo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cadastrado em'); ?></dt>
		<dd>
			<?php echo h($pergunta['Pergunta']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modificado em'); ?></dt>
		<dd>
			<?php echo h($pergunta['Pergunta']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
    <?php if (!empty($pergunta['Opcao'])): ?>
        <div id = "tabs">
            <ul>
                <li class=""><a href="#tabs-1">Opções</a></li>
            </ul>
            <div class="related" id = "tabs-1">

            	<table cellpadding = "0" cellspacing = "0">
            	<tr>
            		<th><?php echo __('Pergunta'); ?></th>
            		<th><?php echo __('Resposta'); ?></th>
            		<th><?php echo __('Cadastrado em'); ?></th>
            		<th><?php echo __('Modificado em'); ?></th>
            		<th class="actions"><?php echo __('Actions'); ?></th>
            	</tr>
            	<?php
            		$i = 0;
            		foreach ($pergunta['Opcao'] as $opcao): ?>
            		<tr>
            			<td><?php echo $opcao['nome']; ?></td>
            			<td><?php echo ($opcao['resposta'] == 1) ? 'Sim' : 'Não'; ?></td>
            			<td><?php echo $this->Util->format_date($opcao['created']); ?></td>
            			<td><?php echo $this->Util->format_date($opcao['modified']); ?></td>
            			<td class="actions">
            				<?//php echo $this->Html->link(__('View'), array('controller' => 'opcoes', 'action' => 'view', $opcao['id'])); ?>
            				<?//php echo $this->Html->link(__('Edit'), array('controller' => 'opcoes', 'action' => 'edit', $opcao['id']), array('class'=>'fancybox')); ?>
            				<?//php echo $this->Form->postLink(__('Delete'), array('controller' => 'opcoes', 'action' => 'delete', $opcao['id']), null, __('Deseja realmente excluir a opção # %s?', $opcao['nome'])); ?>
            			</td>
            		</tr>
            	<?php endforeach; ?>
            	</table>

            </div>
        </div>
    <?php endif; ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pergunta['Pergunta']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pergunta['Pergunta']['id']), null, __('Deseja remover a pergunta # %s?', $pergunta['Pergunta']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New'), array('action' => 'add')); ?> </li>
	</ul>
</div>
