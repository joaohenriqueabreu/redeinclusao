<?php echo $this->Html->script('questionario', array('block'=>'customArchives')); ?>
<?php echo $this->Html->script('jquery.validate.min', array('block'=>'customArchives')); ?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
  $(document).ready(function(){
      jQuery.extend(jQuery.validator.messages, {
          required: ""
      });
      $("#PerguntaAddForm").validate({
            submitHandler: function(form) {
                $('#processing-modal').modal('show');
                form.submit();
  		    }
      });
  });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pergunta - <?=$questionarios[$idQuestionario]?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Pergunta'); ?>
        <?php echo $this->Form->input('questionario_id',array("label"=>false,"value"=>$idQuestionario,"type"=>"hidden")); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
                    <li><a href="javascript:window.history.go(-1)" data-original-title="" title=""><i class="fa fa-angle-double-left"></i>&nbsp;Voltar</a></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                    <div class="col-sm-12">
                        <div class="form-group">
      				        <?php echo $this->Form->input('tipo_pergunta_id', array('class' => 'form-control required tipoForumalario', 'label' => 'Tipo da Pergunta', 'empty'=>'Selecione', 'options'=>$tiposPerguntas)); ?>
      				    </div>
      				</div>
                </div>
                <div class="row no-gutter">
                    <div class="col-sm-12">
                        <div class="form-group">
      				        <?php echo $this->Form->input('titulo', array('class' => 'form-control required', 'label' => 'Pergunta')); ?>
      				    </div>
      				</div>
                </div>
                <div class="row no-gutter">
                    <div class="col-sm-6">
                       <div id = "alternativas"></div>
                       <div id = "opcoesLinha"></div>
      				</div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>