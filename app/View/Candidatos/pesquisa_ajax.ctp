                    <?php
                        if(!empty($candidatos)):
                            $ids = '';
                            foreach($candidatos as $candidato){
                                $ids .= $candidato['Candidato']['id'].'#';
                            }

                    ?>

                            <div class="actions">
                            	<ul>
                            		<li><?php echo $this->Html->link('Mapa', array('controller'=>'Vagas', 'action' => 'geo_localizacao', $vaga, base64_encode($ids)), array('class'=>'fancyboxMapa')); ?> </li>
                            	</ul>
                            </div>
                        	<table cellpadding = "0" cellspacing = "0">
                        	<tr>
                        		<th><?php echo __('Nome'); ?></th>
                        		<th><?php echo __('Sexo'); ?></th>
                        		<th><?php echo __('Nascimento'); ?></th>
                        		<th><?php echo __('Telefone'); ?></th>
                        		<th><?php echo __('Celular'); ?></th>
                        		<th><?php echo __('Bairro'); ?></th>
                        		<th><?php echo __('Cidade'); ?></th>
                        		<th><?php echo __('Auditiva'); ?></th>
                        		<th><?php echo __('Fisíca'); ?></th>
                        		<th><?php echo __('Intelectual'); ?></th>
                        		<th><?php echo __('Visual'); ?></th>
                        		<th class="actions"><?php echo __('Actions'); ?></th>
                        	</tr>
                        	<?php
                        		$i = 0;
                        		foreach ($candidatos as $candidato): ?>
                        		<tr>
                        			<td><?php echo $candidato['Candidato']['nome']; ?></td>
                        			<td><?php echo ($candidato['Candidato']['sexo'] == 'M')?'Masculino':'Feminino'; ?></td>
                        			<td><?php echo $candidato['Candidato']['data_nascimento']; ?></td>
                        			<td><?php echo $candidato['Candidato']['telefone']; ?></td>
                        			<td><?php echo $candidato['Candidato']['celular_1']; ?></td>
                        			<td><?php echo $candidato['Candidato']['bairro']; ?></td>
                        			<td><?php echo $candidato['Candidato']['cidade']; ?></td>
                            		<td><?php echo h($candidato['Candidato']['possui_deficiencia_auditiva'] == '1')?'Sim':'Não'; ?>&nbsp;</td>
                            		<td><?php echo h($candidato['Candidato']['possui_deficiencia_fisica'] == '1')?'Sim':'Não'; ?>&nbsp;</td>
                            		<td><?php echo h($candidato['Candidato']['possui_deficiencia_intelectual'] == '1')?'Sim':'Não'; ?>&nbsp;</td>
                            		<td><?php echo h($candidato['Candidato']['possui_deficiencia_visual'] == '1')?'Sim':'Não'; ?>&nbsp;</td>
                        			<td class="actions">
                        				<?php echo $this->Html->link(__('Incluir'), 'javascript:;', array('id'=>'addProcesso', 'onclick'=>'addProcesso('.$candidato['Candidato']['id'].','.$vaga.')')); ?>
                        				<?php echo $this->Html->link(__('View'), array('controller' => 'candidatos', 'action' => 'view', $candidato['Candidato']['id']), array('target'=>'_blank')); ?>
                        			</td>
                        		</tr>
                        	<?php endforeach; ?>
                        	</table>
                    <?php endif; ?>