<script>
    $(document).ready(function(){
        <?php
        foreach($clientesQuestionario['RespostasCliente'] as $resposta){
            if(!empty($resposta['alternativa_id']) and !empty($resposta['opcao_id'])){
        ?>
                $('#Opcao<?=$resposta['alternativa_id']?>-<?=$resposta['opcao_id']?>').addClass('resposta');
        <?php
            }else if(!empty($resposta['opcao_id'])){
        ?>
                $('#Opcao<?=$resposta['opcao_id']?>').addClass('resposta');
        <?php
            }else{
        ?>
                $('#Resposta<?=$resposta['pergunta_id']?>').html('<?=nl2br($resposta['resposta'])?>');
        <?php
            }
         }
        ?>
    });
</script>

<div class="contratos_produtos_servicos_questionarios form">
	<fieldset>
		<legend><?php echo __('Questionário'); ?></legend>
        <div class = "questionario">
            <div><?=$clientesQuestionario['Questionario']['descricao']?></div>
            <?php

                if(!empty($clientesQuestionario['Questionario']['Pergunta'])){
                    foreach($clientesQuestionario['Questionario']['Pergunta'] as $pergunta){
            ?>
                    <div class = "questao">
                        <p class = "pergunta"><?=$pergunta['ordem']?> - <?=$pergunta['titulo']?></p>
                        <?php
                            switch($pergunta['tipo_pergunta_id']){
                                case 1:
                                    $opcoes = array();
                                    foreach($pergunta['Opcao'] as $opcao){
                                        echo '
                                            <div class = "opcao">
                                                <label id = "Opcao'.$opcao['id'].'">'.$opcao['nome'].'</label>
                                            </div>
                                        ';
                                    }
                                break;
                                case 2:
                                    foreach($pergunta['Opcao'] as $opcao){
                                        echo '
                                            <div class = "opcao">
                                                <label id = "Opcao'.$opcao['id'].'">'.$opcao['nome'].'</label>
                                            </div>
                                        ';
                                    }
                                break;
                                case 3:
                                    echo '<div id = "Resposta'.$pergunta['id'].'"></div>';
                                break;
                                case 4:
                                    echo '<div id = "Resposta'.$pergunta['id'].'"></div>';
                                break;
                                case 5:
                                    echo '<div id = "Resposta'.$pergunta['id'].'"></div>';
                                break;
                                case 6:
                                    foreach($pergunta['Alternativa'] as $alternativa){
                                        echo '<label class = "bold">'.$alternativa['nome'].'</label>';
                                        foreach($pergunta['Opcao'] as $opcao){
                                            echo '
                                                <div class = "opcao">
                                                    <label id = "Opcao'.$alternativa['id'].'-'.$opcao['id'].'">'.$opcao['nome'].'</label>
                                                </div>
                                            ';
                                        }
                                    }
                                break;
                                case 7:
                                    foreach($pergunta['Alternativa'] as $alternativa){
                                        echo '<label class = "bold">'.$alternativa['nome'].'</label>';
                                        foreach($pergunta['Opcao'] as $opcao){
                                            echo '
                                                <div class = "opcao">
                                                    <label id = "Opcao'.$alternativa['id'].'-'.$opcao['id'].'">'.$opcao['nome'].'</label>
                                                </div>
                                            ';
                                        }
                                    }
                                break;
                            }
                        ?>
                    </div>
            <?php
                    }
                }
            ?>
        </div>
	</fieldset>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Imprimir'), array('controller'=>'clientes_questionarios', 'action' => 'imprimir', $clientesQuestionario['ClientesQuestionario']['id']), array('target'=>'blank')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $clientesQuestionario['ClientesQuestionario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $clientesQuestionario['ClientesQuestionario']['id']), null, __('Deseja remover o cliente # %s?', $clientesQuestionario['Questionario']['titulo'])); ?> </li>
        <li><li><?php echo $this->Html->link(__('Voltar'), 'javascript:window.history.go(-1)'); ?> </li></li>
	</ul>
</div>
