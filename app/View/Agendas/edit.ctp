<?php
    echo $this->Html->script('jquery.maskedinput', array('block'=>'customArchives'));
    echo $this->Html->css('agenda');
    $inicio = explode(' ', $this->Form->value('Agenda.inicio'));
    $termino = explode(' ', $this->Form->value('Agenda.termino'));
    $tipo = $this->Form->value('Agenda.tipo');
    $cor = $this->Form->value('Agenda.cor');
    $checkedTipoP = '';
    $checkedTipoE = '';
    if($tipo == 'P'){
        $checkedTipoP = 'checked="checked"';
    }
    if($tipo == 'E'){
        $checkedTipoE = 'checked="checked"';
    }

?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
    $(function() {
        $("#AgendaHoraInicio").mask("99:99");
        $("#AgendaHoraTermino").mask("99:99");
        var dates = $( "#AgendaInicio, #AgendaTermino" ).datepicker({
    		changeMonth: true,
    		changeYear: true,
    		dateFormat: 'dd/mm/yy',
    		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
    		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    		onSelect: function( selectedDate ) {
    			var option = this.id == "AgendaInicio" ? "minDate" : "maxDate",
    			instance = $( this ).data( "datepicker" ),
    			date = $.datepicker.parseDate(
    				instance.settings.dateFormat ||
    				$.datepicker._defaults.dateFormat,
    				selectedDate, instance.settings );
    			dates.not( this ).datepicker( "option", option, date );
    		}
    	});

    	$('#AgendaEditForm').submit(function(){
           $.ajax({
                type: "POST",
                url: "<?=$this->base?>/Agendas/salva",
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function( retorno ) {
            		if(retorno == 1){
                        bootbox.alert("Cadastrado salvo com sucesso.", function(){ location.reload(); });
                    }else{
                        bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!", function(){ location.reload(); });
                	}
                }
           });
           return false;
    	});

        $( ".btn-danger" ).click(function() {
          bootbox.confirm("Deseja remover o evento?", function(result) {
            if(result){
               $.ajax({
                    type: "POST",
                    url: "<?=$this->base?>/Agendas/delete/<?=$this->Form->value('Agenda.id')?>",
                    beforeSend: function() {
                        // setting a timeout
                        $('#processing-modal').modal('show');
                    },
                    processData: false,
                    contentType: false,
                    success: function( retorno ) {
                		if(retorno == 1){
                            bootbox.alert("Evento removido com sucesso.", function(){ location.reload(); });
                        }else{
                            bootbox.alert("Ocorreu algum erro. Por favor, tente novamente!", function(){ location.reload(); });
                    	}
                    }
               });
            }else{
                bootbox.alert("Operação cancelada.");
            }
          });
    	});

    });
    function selecionaCor(id){
        $.each($('.box_agenda'), function(index, value) {
            $(this).removeClass('ativo');
        });
        $("#color"+id).addClass('ativo');
        $("#AgendaCor").val(id);
    }
    <?php
        if(!empty($cor)):
   ?>
            $("#color<?=$cor?>").addClass('ativo');
   <?php
        endif;
    ?>
<?php $this->Html->scriptEnd(); ?>
<?php echo $this->Form->create('Agenda', array('role' => 'form', 'type' => 'file')); ?>
<?php echo $this->Form->input('id');?>
<?php echo $this->Form->input('acao', array('type' => 'hidden', 'value'=>'edit'));?>
 <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
     <h4 class="modal-title">Atualizar Data</h4>
 </div>
 <div class="modal-body">
    <div class="row no-gutter">
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
                <?php echo $this->Form->input('titulo', array('class' => 'form-control', 'label' => 'Título'));?>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
             	<?php echo $this->Form->input('local', array('class' => 'form-control'));?>
            </div>
        </div>
    </div>
    <div class="form-group">
      	<?php echo $this->Form->input('descricao', array('class' => 'form-control', 'label' => 'Descrição'));?>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <?php
                echo $this->Form->input('evento_tipo_id', [
                    'label' => 'Tipo de evento:',
                    'class' => 'form-control', 'options' => $tipos,
                    'default' => $this->request->data['Agenda']['evento_tipo_id']
                ]);
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <?php
                echo $this->Form->input('colaboradores', [
                    'label' => 'Colaboradores:',
                    'class' => 'form-control', 'options' => $colaboradores,
                    'multiple' => true
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-3 col-sm-3 col-sx-3">
            <div class="form-group">
          	    <?php echo $this->Form->input('inicio', array('class' => 'form-control datepicker', 'type' => 'text', 'value' => $inicio[0]));?>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-sx-3">
            <div class="form-group">
          	    <?php echo $this->Form->input('hora_inicio', array('class' => 'form-control datepicker', 'type' => 'text', 'value' => $inicio[1]));?>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-sx-3">
            <div class="form-group">
        	    <?php echo $this->Form->input('termino', array('class' => 'form-control datepicker', 'type' => 'text', 'value' => $termino[0]));?>
            </div>
        </div>
        <div class="col-lg-3 col-sm-3 col-sx-3">
            <div class="form-group">
        	    <?php echo $this->Form->input('hora_termino', array('class' => 'form-control', 'type' => 'text', 'value' => $termino[1]));?>
            </div>
        </div>
    </div>
    <div class="row no-gutter">
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div class="form-group">
                <label>Tipo</label><br />
                <label class="radio-inline">
                    <input type="radio" value="P" <?=$checkedTipoP?> id="AgendaTipoP" name="data[Agenda][tipo]" required="required">Particular
                </label>
                <label class="radio-inline">
                    <input type="radio" value="E" <?=$checkedTipoE?> id="AgendaTipoE" name="data[Agenda][tipo]" required="required">Equipe
                </label>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-sx-6">
            <div id="cores" class="form-group">
                <label>Cor</label><br />
                <div id="color1" class="box_agenda color1" onclick="selecionaCor(1);"></div>
                <div id="color2" class="box_agenda color2" onclick="selecionaCor(2);"></div>
                <div id="color3" class="box_agenda color3" onclick="selecionaCor(3);"></div>
                <div id="color4" class="box_agenda color4" onclick="selecionaCor(4);"></div>
                <div id="color5" class="box_agenda color5" onclick="selecionaCor(5);"></div>
                <div id="color6" class="box_agenda color6" onclick="selecionaCor(6);"></div>
                <div id="color7" class="box_agenda color7" onclick="selecionaCor(7);"></div>
                <div id="color8" class="box_agenda color8" onclick="selecionaCor(8);"></div>
                <div id="color9" class="box_agenda color9" onclick="selecionaCor(9);"></div>
                <div id="color10" class="box_agenda color10" onclick="selecionaCor(10);"></div>
                <div id="color11" class="box_agenda color11" onclick="selecionaCor(11);"></div>
                <div id="color12" class="box_agenda color12" onclick="selecionaCor(12);"></div>
                <input id="AgendaCor" type="hidden" value="<?=$this->Form->value('Agenda.cor')?>" name="data[Agenda][cor]">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                echo $this->Form->input('palestrante', [
                    'label' => 'Palestrante',
                    'class' => 'form-control'
                ]);
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                if (empty($this->request->data['Agenda']['arquivo'])) {
                    echo $this->Form->input('arquivo', [
                        'label' => 'Arquivo',
                        'type' => 'file',
                    ]);
                } else {
                    echo $this->Form->label('arquivo', 'Arquivo');
                    echo '<br>';
                    echo $this->Html->link('', $this->request->data['Agenda']['arquivo'], [
                        'class' => 'glyphicon glyphicon-file'
                    ]);
                }
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                echo $this->Form->input('quantidadeConvidados', [
                    'label' => 'Quantidade de convidados',
                    'class' => 'form-control',
                    'id' => 'quantidade-convidados',
                    'value' => count($this->request->data['EventoParticipante'])
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="row" id="convidados">
        <?php
        if (!empty($this->request->data['EventoParticipante'])) {
            foreach ($this->request->data['EventoParticipante'] as $key => $participante) :
                ?>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" name="convidado-<?php echo $key; ?>" 
                        placeholder="Nome do convidado" value="<?php echo $participante['nome'] ?>">
                </div>
            </div>
            <?php
            endforeach;
        }
        ?>
    </div>
 </div>
 <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal" data-original-title="" title="">Fechar</button>
   <button type="button" class="btn btn btn-danger" data-original-title="" title="">Excluir</button>
   <button type="submit" class="btn btn-primary" data-original-title="" title="">Salvar</button>
 </div>
 <?php echo $this->Form->end() ?>

 <script>
     $("#quantidade-convidados").keyup(function () {
        var quantidade = $(this).val();
        var html = '';
        for (var i = 0; i < quantidade; i++) {
            html += '<div class="col-sm-3">';
            html += '<div class="form-group">';
            html += '<input type="text" name="convidado-' + i + '" ';
            html += 'placeholder="Nome do convidado">';
            html += '</div>';
            html += '</div>';
        }
        $("#convidados").html(html);
     });
 </script>