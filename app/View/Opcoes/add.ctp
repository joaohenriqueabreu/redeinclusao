<script>
  $(document).ready(function(){
      jQuery.extend(jQuery.validator.messages, {
          required: ""
      });
      $("#OpcaoAddForm").validate({
            submitHandler: function(form) {
                $('#loading_block').show();
                $.post('<?=$this->base?>/opcoes/salva',$('#OpcaoAddForm').serialize(),function(retorno){
                    if(retorno == 1){
                        $('#loading_block').hide();
                        parent.$.msgbox('Opção salva com sucesso!', {
        						type: "alert",
        						buttons : [
        							{type: "submit", value: "OK"},
        						]
          				},
          				function(resultado) {
          					if(resultado == 'OK'){
                                  parent.location.href = "<?=$this->base?>/perguntas/view/<?=$this->params['pass'][0]?>";
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
<div class="opcoes">
<?php echo $this->Form->create('Opcao'); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Opção'); ?></legend>
	<?php
		echo $this->Form->input('nome', array('label'=>'Pergunta', 'class'=>'required'));
		echo $this->Form->input('pergunta_id', array('type'=>'hidden', 'value'=>$this->params['pass'][0]));
		echo $this->Form->input('questionario_id', array('type'=>'hidden', 'value'=>$this->params['pass'][1]));
		echo $this->Form->input('resposta', array('class'=>'required'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
