<div class="escolaridades view">
<h2><?php  echo __('Escolaridade'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($escolaridade['Escolaridade']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($escolaridade['Escolaridade']['nome']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Escolaridade'), array('action' => 'edit', $escolaridade['Escolaridade']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Escolaridade'), array('action' => 'delete', $escolaridade['Escolaridade']['id']), null, __('Are you sure you want to delete # %s?', $escolaridade['Escolaridade']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Escolaridades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Escolaridade'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Candidatos'), array('controller' => 'candidatos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Candidato'), array('controller' => 'candidatos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Candidatos'); ?></h3>
	<?php if (!empty($escolaridade['Candidato'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Cpf'); ?></th>
		<th><?php echo __('Identidade'); ?></th>
		<th><?php echo __('Data Nascimento'); ?></th>
		<th><?php echo __('Sexo'); ?></th>
		<th><?php echo __('Estado Civil Id'); ?></th>
		<th><?php echo __('Tem Filhos'); ?></th>
		<th><?php echo __('Quantos Filhos'); ?></th>
		<th><?php echo __('Cep'); ?></th>
		<th><?php echo __('Logradouro'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Complemento'); ?></th>
		<th><?php echo __('Bairro'); ?></th>
		<th><?php echo __('Cidade'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('E Mail'); ?></th>
		<th><?php echo __('Telefone'); ?></th>
		<th><?php echo __('Celular 1'); ?></th>
		<th><?php echo __('Celular 2'); ?></th>
		<th><?php echo __('Celular 3'); ?></th>
		<th><?php echo __('Contato Nome'); ?></th>
		<th><?php echo __('Contato Telefone'); ?></th>
		<th><?php echo __('Contato Celular 1'); ?></th>
		<th><?php echo __('Contato Celular 2'); ?></th>
		<th><?php echo __('Contato Celular 3'); ?></th>
		<th><?php echo __('Escolaridade Id'); ?></th>
		<th><?php echo __('Necessita Qualificacao'); ?></th>
		<th><?php echo __('Condicao Comprimento Cota'); ?></th>
		<th><?php echo __('Area Interesse Trabalho'); ?></th>
		<th><?php echo __('Disponibilidade Horario'); ?></th>
		<th><?php echo __('Pretensencao Salarial'); ?></th>
		<th><?php echo __('Origem Id'); ?></th>
		<th><?php echo __('Observacoes Indicacoes'); ?></th>
		<th><?php echo __('Possui Deficiencia Auditiva'); ?></th>
		<th><?php echo __('Descricao Deficiencia Auditiva'); ?></th>
		<th><?php echo __('Possui Deficiencia Fisica'); ?></th>
		<th><?php echo __('Descricao Deficiencia Fisica'); ?></th>
		<th><?php echo __('Possui Deficiencia Intelectual'); ?></th>
		<th><?php echo __('Descricao Deficiencia Intelectual'); ?></th>
		<th><?php echo __('Possui Deficiencia Multipla'); ?></th>
		<th><?php echo __('Descricao Deficiencia Multipla'); ?></th>
		<th><?php echo __('Possui Deficiencia Visual'); ?></th>
		<th><?php echo __('Descricao Deficiencia Visual'); ?></th>
		<th><?php echo __('Necessita Ajudas Tecnicas'); ?></th>
		<th><?php echo __('Quais Ajudas Tecnicas'); ?></th>
		<th><?php echo __('Reabilitada Inss'); ?></th>
		<th><?php echo __('Descricao Reabilitacao'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($escolaridade['Candidato'] as $candidato): ?>
		<tr>
			<td><?php echo $candidato['id']; ?></td>
			<td><?php echo $candidato['nome']; ?></td>
			<td><?php echo $candidato['cpf']; ?></td>
			<td><?php echo $candidato['identidade']; ?></td>
			<td><?php echo $candidato['data_nascimento']; ?></td>
			<td><?php echo $candidato['sexo']; ?></td>
			<td><?php echo $candidato['estado_civil_id']; ?></td>
			<td><?php echo $candidato['tem_filhos']; ?></td>
			<td><?php echo $candidato['quantos_filhos']; ?></td>
			<td><?php echo $candidato['cep']; ?></td>
			<td><?php echo $candidato['logradouro']; ?></td>
			<td><?php echo $candidato['numero']; ?></td>
			<td><?php echo $candidato['complemento']; ?></td>
			<td><?php echo $candidato['bairro']; ?></td>
			<td><?php echo $candidato['cidade']; ?></td>
			<td><?php echo $candidato['estado']; ?></td>
			<td><?php echo $candidato['e_mail']; ?></td>
			<td><?php echo $candidato['telefone']; ?></td>
			<td><?php echo $candidato['celular_1']; ?></td>
			<td><?php echo $candidato['celular_2']; ?></td>
			<td><?php echo $candidato['celular_3']; ?></td>
			<td><?php echo $candidato['contato_nome']; ?></td>
			<td><?php echo $candidato['contato_telefone']; ?></td>
			<td><?php echo $candidato['contato_celular_1']; ?></td>
			<td><?php echo $candidato['contato_celular_2']; ?></td>
			<td><?php echo $candidato['contato_celular_3']; ?></td>
			<td><?php echo $candidato['escolaridade_id']; ?></td>
			<td><?php echo $candidato['necessita_qualificacao']; ?></td>
			<td><?php echo $candidato['condicao_comprimento_cota']; ?></td>
			<td><?php echo $candidato['area_interesse_trabalho']; ?></td>
			<td><?php echo $candidato['disponibilidade_horario']; ?></td>
			<td><?php echo $candidato['pretensencao_salarial']; ?></td>
			<td><?php echo $candidato['origem_id']; ?></td>
			<td><?php echo $candidato['observacoes_indicacoes']; ?></td>
			<td><?php echo $candidato['possui_deficiencia_auditiva']; ?></td>
			<td><?php echo $candidato['descricao_deficiencia_auditiva']; ?></td>
			<td><?php echo $candidato['possui_deficiencia_fisica']; ?></td>
			<td><?php echo $candidato['descricao_deficiencia_fisica']; ?></td>
			<td><?php echo $candidato['possui_deficiencia_intelectual']; ?></td>
			<td><?php echo $candidato['descricao_deficiencia_intelectual']; ?></td>
			<td><?php echo $candidato['possui_deficiencia_multipla']; ?></td>
			<td><?php echo $candidato['descricao_deficiencia_multipla']; ?></td>
			<td><?php echo $candidato['possui_deficiencia_visual']; ?></td>
			<td><?php echo $candidato['descricao_deficiencia_visual']; ?></td>
			<td><?php echo $candidato['necessita_ajudas_tecnicas']; ?></td>
			<td><?php echo $candidato['quais_ajudas_tecnicas']; ?></td>
			<td><?php echo $candidato['reabilitada_inss']; ?></td>
			<td><?php echo $candidato['descricao_reabilitacao']; ?></td>
			<td><?php echo $candidato['user_id']; ?></td>
			<td><?php echo $candidato['created']; ?></td>
			<td><?php echo $candidato['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'candidatos', 'action' => 'view', $candidato['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'candidatos', 'action' => 'edit', $candidato['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'candidatos', 'action' => 'delete', $candidato['id']), null, __('Are you sure you want to delete # %s?', $candidato['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Candidato'), array('controller' => 'candidatos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
