<script>
  $(document).ready(function(){
      jQuery.extend(jQuery.validator.messages, {
          required: ""
      });
      $("#RespostaAddForm").validate({
            submitHandler: function(form) {
                $('#loading_block').show();
                $.post('<?=$this->base?>/respostas/salva',$('#RespostaAddForm').serialize(),function(retorno){
                    if(retorno == 1){
                        $('#loading_block').hide();
                        parent.$.msgbox('Resposta salva com sucesso!', {
        						type: "alert",
        						buttons : [
        							{type: "submit", value: "OK"},
        						]
          				},
          				function(resultado) {
          					if(resultado == 'OK'){
                                  parent.location.href = '<?=$this->base?>/perguntas/view/<?=$this->params['pass'][0]?>/2';
          					}
          			    });
                    }else{
                        parent.$.msgbox("Ocorreu algum erro, por favor tente novamente",{type: "error"});
                        $('#loading_block').hide();
                    }
                });
  		    }
      });
  });
</script>
<div class="respostas">
<?php echo $this->Form->create('Resposta'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Resposta'); ?></legend>
	<?php
		echo $this->Form->input('pergunta_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
		echo $this->Form->input('questionario_id', array('type'=>'hidden', 'value'=>$this->params['pass'][1]));
		echo $this->Form->input('resposta', array('class'=>'required'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
