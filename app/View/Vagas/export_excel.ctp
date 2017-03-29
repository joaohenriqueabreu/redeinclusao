	<table border="1" style="border-color: #000" cellpadding="0" cellspacing="0" >
    	<tr>
            <td style="text-align: center" colspan="9"><b><?=($vaga['Cliente']['razao_social'].' - '.$vaga['Vaga']['cargo'])?></b></td>
    	</tr>
    	<tr>
    		<th style = "background: #f4f4f4"><?php echo __('Candidato'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Triagem'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Psicológica'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Técnica'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Avaliação Psicológica'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Exame Médico Admissional'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Resultado'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Observações'); ?></th>
    		<th style = "background: #f4f4f4"><?php echo __('Incluso em'); ?></th>
    	</tr>
    	<?php
    		$i = 0;
    		foreach ($vaga['ProcessosSeletivo'] as $processosSeletivo):
                $nomeCandidato = $this->Util->mostraNomeCandidato($processosSeletivo['candidato_id']);
        ?>
        		<tr>
        			<td><?php echo $nomeCandidato; ?></td>
        			<td><?php echo $resultadoEtapasProcesso[$processosSeletivo['entrevista_triagem']]; ?></td>
        			<td><?php echo $resultadoEtapasProcesso[$processosSeletivo['entrevista_psicologica']]; ?></td>
        			<td><?php echo $resultadoEtapasProcesso[$processosSeletivo['entrevista_tecnica']]; ?></td>
        			<td><?php echo $resultadoEtapasProcesso[$processosSeletivo['teste_psicologica']]; ?></td>
        			<td><?php echo $resultadoEtapasProcesso[$processosSeletivo['exame_medico_admissional']]; ?></td>
        			<td><?php echo $resultadoProcesso[$processosSeletivo['resultado']]; ?></td>
        			<td><?php echo $processosSeletivo['observacoes']; ?></td>
        			<td><?php echo $this->Formatacao->dataHora($processosSeletivo['created']); ?></td>
        		</tr>
	    <?php endforeach; ?>
    	<tr>
            <td style="text-align: right" colspan="9"><b>Relatório gerado em: <?=date('d/m/Y H:i:s')?></b></td>
    	</tr>
</table>