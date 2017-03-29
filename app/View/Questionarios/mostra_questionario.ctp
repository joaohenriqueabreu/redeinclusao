<p><b><?=$questionario['Questionario']['descricao']?></b></p>
<p style="clear: both"></p>
<?php
    if(!empty($questionario['Pergunta'])):
        foreach($questionario['Pergunta'] as $pergunta):
?>
        <div class="row no-gutter">
            <div class="col-lg-12 col-sm-12 col-sx-12">
                <p><?=$pergunta['ordem']?> - <?=$pergunta['titulo']?></p>
                <p style="clear: both"></p>
                <div class="form-group">
                    <?php
                        switch($pergunta['tipo_pergunta_id']){
                            case 1:
                                foreach($pergunta['Opcao'] as $opcao){
                                    echo '
                                        <div class = "radio">
                                            <label>
                                                <input type = "radio" value = "'.$opcao['id'].'" name = "data[Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                            </label>
                                        </div>
                                    ';
                                }
                            break;
                            case 2:
                                foreach($pergunta['Opcao'] as $opcao){
                                    echo '
                                        <div class = "checkbox">
                                            <label>
                                                <input type = "checkbox" value = "'.$opcao['id'].'" name = "data[Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                            </label>
                                        </div>
                                    ';
                                }
                            break;
                            case 3:
                                echo $this->Form->input('resposta', array('label'=>false, 'class'=>'form-control', 'type'=>'text', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]'));
                            break;
                            case 4:
                                echo $this->Form->input('resposta', array('label'=>false, 'class'=>'form-control', 'type'=>'textarea', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]'));
                            break;
                            case 5:
                                echo $this->Form->input('resposta', array('label'=>false, 'class'=>'form-control', 'type'=>'text', 'name'=>'data[Resposta]['.$pergunta['id'].'][resposta]', 'onkeypress'=>'return OnlyNumbers(event)'));
                            break;
                            case 6:
                                foreach($pergunta['Alternativa'] as $alternativa){
                                    echo '<label class = "bold">'.$alternativa['nome'].'</label>';
                                    foreach($pergunta['Opcao'] as $opcao){
                                        echo '
                                            <div class = "radio">
                                                <label>
                                                    <input type = "radio" value = "'.$opcao['id'].'" name = "data[Alternativa]['.$alternativa['id'].'][Opcao]['.$pergunta['id'].'][][resposta]">'.
                                                    $opcao['nome']
                                                .'</label>
                                            </div>
                                        ';
                                    }
                                }
                            break;
                            case 7:
                                foreach($pergunta['Alternativa'] as $alternativa){
                                    echo '<label>'.$alternativa['nome'].'</label>';
                                    foreach($pergunta['Opcao'] as $opcao){
                                        echo '
                                            <div class = "checkbox">
                                                <label>
                                                    <input type = "checkbox" value = "'.$opcao['id'].'" name = "data[Alternativa]['.$alternativa['id'].'][Opcao]['.$pergunta['id'].'][][resposta]">'.$opcao['nome'].'
                                                </label>
                                            </div>
                                        ';
                                    }
                                }
                            break;
                        }
                    ?>
                </div>
            </div>
        </div>
<?php
        endforeach;
    endif;
?>