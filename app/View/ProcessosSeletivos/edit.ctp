<?php
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
    	$('#ProcessosSeletivoEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/ProcessosSeletivos/salva",
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Cadastrado salvo com sucesso.", function(){ location.reload(); });
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!");
                	}
                }
           });
           return false;
    	});
    });
<?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Form->create('ProcessosSeletivo', array('role' => 'form')); ?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Editar Processos Seletivo - <?=$this->Form->value('Candidato.nome')?></h4>
 </div>
 <div class="modal-body">
    <?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
    <?php echo $this->Form->input('id'); ?>
    <?php echo $this->Form->input('candidato_id', array('type'=>'hidden')); ?>
    <?php echo $this->Form->input('vaga_id', array('type'=>'hidden')); ?>
    <?php
        $resultadosEtapas = $this->Util->resultadoEtapasProcesso();
        $statusResultado = $this->Util->resultadoProcesso();
    ?>
    <div class="form-group">
        <label>Entrevista de Triagem</label>
        <br />
        <?php
            foreach($resultadosEtapas as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['entrevista_triagem'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][entrevista_triagem]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <label>Entrevista Psicológica</label>
        <br />
        <?php
            foreach($resultadosEtapas as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['entrevista_psicologica'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][entrevista_psicologica]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <label>Entrevista Técnica</label>
        <br />
        <?php
            foreach($resultadosEtapas as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['entrevista_tecnica'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][entrevista_tecnica]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <label>Avaliação Psicológica</label>
        <br />
        <?php
            foreach($resultadosEtapas as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['teste_psicologica'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][teste_psicologica]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <label>Exame Médico Admissional</label>
        <br />
        <?php
            foreach($resultadosEtapas as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['exame_medico_admissional'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][exame_medico_admissional]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <label>Resultado</label>
        <br />
        <?php
            foreach($statusResultado as $key=>$value):
                $checked = '';
                if($this->data['ProcessosSeletivo']['resultado'] == $key){
                    $checked = 'checked="checked"';
                }
        ?>
              <label class="radio-inline" style="padding-left:14px;">  
                  <input type="radio" <?=$checked?> value="<?=$key?>" id="optionsRadiosInline1" name="data[ProcessosSeletivo][resultado]"> <?=$value?>
              </label>
        <?php
            endforeach;
        ?>
    </div>
    <div class="form-group">
        <?php echo $this->Form->input('observacoes', array('label'=>'Observações', 'class'=>'form-control'));?>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>
