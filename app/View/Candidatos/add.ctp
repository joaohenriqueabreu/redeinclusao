<?php
    $listPretensoes = array();
    foreach($pretensoesSalariais as $pretensao){
        if($pretensao['PretensoesSalarial']['final'] == 99){
          $texto = 'acima de R$3.000,00';
        }else{
          $texto = $this->Formatacao->moeda($pretensao['PretensoesSalarial']['inicial']).' - '.$this->Formatacao->moeda($pretensao['PretensoesSalarial']['final']);
        }
        $listPretensoes[$pretensao['PretensoesSalarial']['id']] = $texto;
    }
    ksort($listPretensoes);
    $cursos = array();
    foreach($cursosAcademicosTecnicos as $curso){
        $cursos[$curso['CursosAcademicosTecnico']['tipo']][$curso['CursosAcademicosTecnico']['id']] = $curso['CursosAcademicosTecnico']['nome'];
    }

    //Token Input CSS
    echo $this->Html->css('tokenfield/bootstrap-tokenfield');
    echo $this->Html->script('tokenfield/bootstrap-tokenfield', array('block'=>'customArchives'));

     //Form Wizard CSS
    echo $this->Html->css('form-wizard/prettify');
    echo $this->Html->script('form-wizard/jquery.bootstrap.wizard', array('block'=>'customArchives'));
    echo $this->Html->script('form-wizard/prettify', array('block'=>'customArchives'));

    echo $this->Html->script('jquery.validate.min', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
    echo $this->Html->script('cep', array('block'=>'customArchives'));
?>
<?php echo $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
  $(document).ready(function(){

     $("#CandidatoTemFilhos").change(function(){
          if($(this).val() == 'S'){
            $("#temFilhos").fadeIn();
            $("#CandidatoQuantosFilhos").attr('required', 'true');
          }else{
            $("#temFilhos").fadeOut();
            $("#CandidatoQuantosFilhos").attr('required', 'false');
          }
     });

     $("#CandidatoPossuiDeficienciaAuditiva").click(function(){
          if($("#CandidatoPossuiDeficienciaAuditiva").is(":checked")){
            $("#auditiva").fadeIn();
            $("#CandidatoDescricaoDeficienciaAuditiva").attr('required', 'true');
          }else{
            $("#auditiva").fadeOut();
            $("#CandidatoDescricaoDeficienciaAuditiva").attr('required', 'false');
          }
     });

     $("#CandidatoPossuiDeficienciaFisica").click(function(){
          if($("#CandidatoPossuiDeficienciaFisica").is(":checked")){
            $("#fisica").fadeIn();
            $("#CandidatoDescricaoDeficienciaFisica").attr('required', 'true');
          }else{
            $("#fisica").fadeOut();
            $("#CandidatoDescricaoDeficienciaFisica").attr('required', 'false');
          }
     });

     $("#CandidatoPossuiDeficienciaIntelectual").click(function(){
          if($("#CandidatoPossuiDeficienciaIntelectual").is(":checked")){
            $("#intelectual").fadeIn();
            $("#CandidatoDescricaoDeficienciaIntelectual").attr('required', 'true');
          }else{
            $("#intelectual").fadeOut();
            $("#CandidatoDescricaoDeficienciaIntelectual").attr('required', 'false');
          }
     });

     $("#CandidatoPossuiDeficienciaVisual").click(function(){
          if($("#CandidatoPossuiDeficienciaVisual").is(":checked")){
            $("#visual").fadeIn();
            $("#CandidatoDescricaoDeficienciaVisual").attr('required', 'true');
          }else{
            $("#visual").fadeOut();
            $("#CandidatoDescricaoDeficienciaVisual").attr('required', 'false');
          }
     });

     $("#CandidatoNecessitaAjudasTecnicas").click(function(){
          if($("#CandidatoNecessitaAjudasTecnicas").is(":checked")){
            $("#tecnicas").fadeIn();
            $("#CandidatoQuaisAjudasTecnicas").attr('required', 'true');
          }else{
            $("#tecnicas").fadeOut();
            $("#CandidatoQuaisAjudasTecnicas").attr('required', 'false');
          }
     });

     $("#CandidatoCondicaoComprimentoCota1").click(function(){
        $("#reabilitacao").fadeIn();
        $("#CandidatoDescricaoReabilitacao").attr('required', 'true');
     });

     $("#CandidatoCondicaoComprimentoCota0").click(function(){
        $("#reabilitacao").fadeOut();
        $("#CandidatoDescricaoReabilitacao").attr('required', 'false');
     });

      $('#CandidatoCursos').tokenfield({
        autocomplete: {
          source: "<?=$this->base?>/cursos_academicos_tecnicos/busca_curso",
          minLength: 3,
          delay: 100
        },
        minWidth: '480px',
        showAutocompleteOnFocus: true
      });

  	  var $validator = $("#CandidatoAddForm").validate({
        errorPlacement: function(error,element) {
        return true;
      }});

      $('#rootwizard').bootstrapWizard({
     		'tabClass': 'nav nav-pills',
            'onTabClick': function(tab, navigation, index) {
            	bootbox.alert("Você deve usar os botões anterior ou próximo para mudar de aba.");
                return false;
            },
     		'onNext': function(tab, navigation, index) {
     			var $valid = $("#CandidatoAddForm").valid();
     			if(!$valid) {
     				$validator.focusInvalid();
     				return false;
     			}
     		},
            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
          		if($current >= $total) {
          			$('#rootwizard').find('.pager .next').hide();
          			$('#rootwizard').find('.pager .finish').show();
          			$('#rootwizard').find('.pager .finish').removeClass('disabled');
          		} else {
          			$('#rootwizard').find('.pager .next').show();
          			$('#rootwizard').find('.pager .finish').hide();
          		}
            }
      });

      $('#rootwizard .finish').click(function() {
            var $valid = $("#CandidatoAddForm").valid();
    		if(!$valid) {
    			$validator.focusInvalid();
    			return false;
    		}else{
                $("#CandidatoAddForm").submit();
    		}
      });
      window.prettyPrint && prettyPrint()
  });
<?php echo $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidato</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Candidato', array('role'=>'form', 'type' => 'file')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Adicionar</h4>
                <ul class="links">
            		<li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
				<div id="rootwizard">
                    <!-- Nav tabs -->
                    <ul>
                        <li><a href="#tabs-1" data-toggle="tab">Identificação</a></li>
                        <li><a href="#tabs-2" data-toggle="tab">Endereço</a></li>
                        <li><a href="#tabs-3" data-toggle="tab">Contatos</a></li>
                        <li><a href="#tabs-4" data-toggle="tab">Formação Acadêmica</a></li>
                        <li><a href="#tabs-5" data-toggle="tab">Experiência Profissional</a></li>
                        <li><a href="#tabs-6" data-toggle="tab">Pretensões</a></li>
                        <li><a href="#tabs-7" data-toggle="tab">Captação</a></li>
                        <li><a href="#tabs-8" data-toggle="tab">Cumprimento Cota</a></li>
                        <li><a href="#tabs-9" data-toggle="tab">Parecer do Entrevistador</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <p style="clear: both"></p>
                    <div class="tab-content">
                        <div class="tab-pane" id = "tabs-1">
                            <div class="row">
                                <?php
                                    echo $this->Form->input('nome', array('div'=>array('class'=>'col-xs-6'), 'required'=>'required', 'class' => 'form-control'));
                           		    echo $this->Form->input('cpf', array('div'=>array('class'=>'col-xs-3'), 'onkeyup' => 'formataCPF(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'label'=>'CPF', 'required'=>'required', 'class' => 'form-control'));
                            	    echo $this->Form->input('identidade', array('div'=>array('class'=>'col-xs-3'), 'required'=>'required', 'class' => 'form-control'));
                                ?>
                            </div>
                            <p style="clear: both"></p>
                            <div class="row">
                                <?php
                           		    echo $this->Form->input('data_nascimento', array('div'=>array('class'=>'col-xs-3'), 'label'=>'Data de Nascimento', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'required'=>'required', 'class' => 'form-control'));
                                    echo $this->Form->input('sexo', array('div'=>array('class'=>'col-xs-3'), 'empty'=>'selecione', 'options'=>array('M'=>'Masculino', 'F'=>'Feminino'), 'required'=>'required', 'class' => 'form-control'));
                          		    echo $this->Form->input('estado_civil_id', array('div'=>array('class'=>'col-xs-3'),'options'=>$estadosCivis, 'required'=>'required', 'empty'=>'Selecione', 'class' => 'form-control'));
                          		    echo $this->Form->input('nacionalidade', array('div'=>array('class'=>'col-xs-3'),'required'=>'required', 'class' => 'form-control'));
                                ?>
                            </div>
                            <p style="clear: both"></p>
                            <div class="row">
                                <?php
                                    echo $this->Form->input('foto', array('div'=>array('class'=>'col-xs-6'), 'type'=>'file', 'class' => 'filestyle form-control', 'data-buttonText'=>'Selecionar Arquivo'));
                                    echo $this->Form->input('tem_filhos', array('div'=>array('class'=>'col-xs-3'), 'empty'=>'selecione', 'required'=>'required', 'options'=>array('S'=>'Sim', 'N'=>'Não'), 'class' => 'form-control'));
                          		    echo $this->Form->input('quantos_filhos', array('div'=>array('id'=>'temFilhos', 'style'=>'display: none;', 'class'=>'col-xs-3'), 'label'=>'Quantos Filhos', 'class' => 'form-control'));
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane" id = "tabs-2">
                            <div class="row">
                                <?php
                                    echo $this->Form->input('cep', array('div'=>array('class'=>'col-xs-3'), 'onkeyup' => 'formataCEP(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'label'=>'CEP', 'id'=>'cep', 'required'=>'required', 'class' => 'form-control'));
                            		echo $this->Form->input('logradouro', array('div'=>array('class'=>'col-xs-6'),'id'=>'logradouro', 'required'=>'required', 'class' => 'form-control'));
                            		echo $this->Form->input('numero', array('div'=>array('class'=>'col-xs-3'), 'label'=>'Número', 'required'=>'required', 'class' => 'form-control'));
                                ?>
                            </div>
                            <p style="clear: both"></p>
                            <div class="row">
                                <?
                            		echo $this->Form->input('complemento', array('div'=>array('class'=>'col-xs-3'), 'class' => 'form-control'));
                            		echo $this->Form->input('bairro', array('div'=>array('class'=>'col-xs-3'), 'id'=>'bairro', 'required'=>'required', 'class' => 'form-control'));
                            		echo $this->Form->input('cidade', array('div'=>array('class'=>'col-xs-3'), 'id'=>'cidade', 'required'=>'required', 'class' => 'form-control'));
                            		echo $this->Form->input('estado', array('div'=>array('class'=>'col-xs-1'), 'id'=>'uf', 'required'=>'required', 'class' => 'form-control'));
                                    echo $this->Form->input('geocode', array('div'=>array('class'=>'col-xs-2'), 'label'=>'Geocode', 'class' => 'form-control'));
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane" id = "tabs-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">Próprios</div>
                                      <!-- /.panel-heading -->
                                      <div class="panel-body">
                                            <?php
                                                echo $this->Form->input('e_mail', array('label'=>'E-mail', 'class' => 'form-control'));
                                      	        echo $this->Form->input('telefone', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                        		echo $this->Form->input('celular_1', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                                echo $this->Form->input('celular_2', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                        		echo $this->Form->input('celular_3', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                            ?>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Parentes ou amigos</div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <?php
                                        		echo $this->Form->input('contato_nome', array('label'=>'Nome do Contato', 'class' => 'form-control'));
                                        		echo $this->Form->input('contato_telefone', array('label'=>'Telefone do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                        		echo $this->Form->input('contato_celular_1', array('label'=>'Celular 1 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                        		echo $this->Form->input('contato_celular_2', array('label'=>'Celular 2 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                        		echo $this->Form->input('contato_celular_3', array('label'=>'Celular 3 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'class' => 'form-control'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-4">
                            <div class="row">
                                <?php
                        		    echo $this->Form->input('escolaridade_id', array('div'=>array('class'=>'col-xs-6'), 'empty'=>'Selecione', 'required'=>'required', 'class' => 'form-control'));
                        		    echo $this->Form->input('observacoes_escolaridade', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Observações (Série / Período)', 'class' => 'form-control'));
                                ?>
                            </div>
                            <div class="row">
                                <?
                                    echo '<p style="clear:both"></p>';
                        		    echo $this->Form->input('cursos', array('div'=>array('class'=>'col-xs-12'), 'placeholder'=>'Digite o nome do curso', 'label'=>'Cursos | Acadêmicos | Técnico | Qualificação'));
                                    echo '<p style="clear:both"></p>';
                                ?>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Idioma</div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <p style="clear: both"></p>
                                            <?php
                                                echo $this->Form->input('Idioma', array('div'=>array('class'=>'checkbox-inline'), 'name'=>'data[Idioma]', 'label'=>false, 'multiple'=>'checkbox', 'options'=>$idiomas));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    echo $this->Form->input('necessita_qualificacao', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Necessita de Qualificação', 'required'=>'required', 'empty'=>'Selecione', 'options'=>array('1'=>'Sim', '0'=>'Não'), 'class' => 'form-control'));
                                ?>
                            </div>
                            <div class="row">
                                <?php
                                    echo $this->Form->input('cursos_interesse', array('div'=>array('class'=>'col-xs-12'), 'label'=>'Cursos de Interesses', 'class' => 'form-control'));
                                ?>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-5">
                        	<div class="row">
                                <?php
                                    $numExperiencias = 1;
                                    $i = 1;
                                    if($numExperiencias < 3):
                                        for($y=$i; $y<=3; $y++):

                                ?>
                                            <div class="col-lg-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Experiência <?=$y?></div>
                                                    <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                        <?php
                                                		    echo $this->Form->input('empresa', array('name'=>'data[ExperienciasProfissional]['.$y.'][empresa]', 'class' => 'form-control'));
                                                		    echo $this->Form->input('admissao', array('name'=>'data[ExperienciasProfissional]['.$y.'][admissao]', 'label'=>'Admissão', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'class' => 'form-control'));
                                                		    echo $this->Form->input('demissao', array('name'=>'data[ExperienciasProfissional]['.$y.'][demissao]', 'label'=>'Demissão', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'class' => 'form-control'));
                                                		    echo $this->Form->input('cargo', array('name'=>'data[ExperienciasProfissional]['.$y.'][cargo]', 'class' => 'form-control'));
                                                  		    echo $this->Form->input('ultimo_salario', array('name'=>'data[ExperienciasProfissional]['.$y.'][ultimo_salario]', 'label'=>'Último Salário', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)', 'class' => 'form-control'));
                                                            echo $this->Form->input('atividades_desenvolvidas', array('name'=>'data[ExperienciasProfissional]['.$y.'][atividades_desenvolvidas]', 'class' => 'form-control'));
                                                		    echo $this->Form->input('motivo_desligamento', array('name'=>'data[ExperienciasProfissional]['.$y.'][motivo_desligamento]', 'class' => 'form-control'));
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        endfor;
                                    endif;
                                ?>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-6">
               	            <div class="row">
                                <?php
                                    echo $this->Form->input('area_interesse_trabalho', array('div'=>array('class'=>'col-xs-12'), 'label'=>'Área de Interesse Trabalho', 'class' => 'form-control'));
                                ?>
                            </div>
                            <div  class="row">
                                <?php
                            		echo $this->Form->input('disponibilidade_horario', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Disponibilidade Horário', 'class' => 'form-control'));
                                    echo $this->Form->input('pretensao_salarial_id', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Pretensão Salarial', 'empty'=>'Selecione', 'options'=>$listPretensoes, 'class' => 'form-control'));
                                ?>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-7">
                            <div class="row">
                                <?php
                            		echo $this->Form->input('origem_id', array('div'=>array('class'=>'col-xs-6'), 'required'=>'required', 'empty'=>'Selecione', 'class' => 'form-control'));
                            		echo $this->Form->input('tipo_emprego', array('div'=>array('class'=>'col-xs-6'), 'required'=>'required', 'empty'=>'Selecione', 'class' => 'form-control', 'options' => $this->Util->tipoEmprego()));
                                ?>
                            </div>
                            <div class="row">
                                <?php
                            		echo $this->Form->input('observacoes_indicacoes', array('div'=>array('class'=>'col-xs-12'), 'label'=>'Observações da Indicação', 'class' => 'form-control'));
                                ?>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Condição de Cumprimento de cota</div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="0" id="CandidatoCondicaoComprimentoCota0" name="data[Candidato][condicao_comprimento_cota]">Pessoa com deficiência
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" value="1" id="CandidatoCondicaoComprimentoCota1" name="data[Candidato][condicao_comprimento_cota]">Pessoa reabilitada
                                                    </label>
                                                </div>
                                            </div>
                                            <?php
                                            	echo $this->Form->input('descricao_reabilitacao', array('div'=>array('id'=>'reabilitacao', 'style'=>'display: none;'), 'label'=>'Descrição da Reabilitação', 'class' => 'form-control'));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Deficiências</div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <?php
                                                echo '<div class="checkbox"><label>'.$this->Form->input('possui_deficiencia_auditiva', array('div'=>false, 'label'=>false, 'type'=>'checkbox', 'value'=>'1')).' Auditiva</label></div>';
                                        		echo $this->Form->input('descricao_deficiencia_auditiva', array('div'=>array('id'=>'auditiva', 'style'=>'display: none;'), 'label'=>'Descrição da Deficiência Auditiva'));

                                                echo '<div class="checkbox"><label>'.$this->Form->input('possui_deficiencia_fisica', array('div'=>false, 'label'=>false, 'type'=>'checkbox', 'value'=>'1')).' Fisíca</label></div>';
                                        		echo $this->Form->input('descricao_deficiencia_fisica', array('div'=>array('id'=>'fisica', 'style'=>'display: none;'), 'label'=>'Descrição da Deficiência Física'));

                                                echo '<div class="checkbox"><label>'.$this->Form->input('possui_deficiencia_intelectual', array('div'=>false, 'label'=>false, 'type'=>'checkbox', 'value'=>'1')).' Intelectual</label></div>';
                                        		echo $this->Form->input('descricao_deficiencia_intelectual', array('div'=>array('id'=>'intelectual', 'style'=>'display: none;'), 'label'=>'Descrição da Deficiência Intelectual'));

                                                echo '<div class="checkbox"><label>'.$this->Form->input('possui_deficiencia_visual', array('div'=>false, 'label'=>false, 'type'=>'checkbox', 'value'=>'1')).' Visual</label></div>';
                                        		echo $this->Form->input('descricao_deficiencia_visual', array('div'=>array('id'=>'visual', 'style'=>'display: none;'), 'label'=>'Descrição da Deficiência Visual'));

                                                echo '<div class="checkbox"><label>'.$this->Form->input('necessita_ajudas_tecnicas', array('div'=>false, 'label'=>false, 'type'=>'checkbox', 'value'=>'1')).' Necessita Ajuda Tecnicas</label></div>';
                                        		echo $this->Form->input('quais_ajudas_tecnicas', array('div'=>array('id'=>'tecnicas', 'style'=>'display: none;'), 'label'=>'Quais Ajudas Técnicas'));
                                        	?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                       <div class="tab-pane" id = "tabs-9">
                                <?php echo $this->Form->input('parecer_entrevistador', array('div'=>array('class'=>'col-xs-12'), 'label'=>false, 'required'=>'required', 'class' => 'form-control')); ?>
                       </div>
                       <p style="clear: both"></p>
                       <ul class="pager wizard">
							<li class="previous first" style="display:none;"><a href="#">Primeiro</a></li>
							<li class="previous"><a href="#">Anterior</a></li>
							<li class="next last finish" style="display:none;"><a href="#">Salvar</a></li>
						  	<li class="next"><a href="#">Próximo</a></li>
					   </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
