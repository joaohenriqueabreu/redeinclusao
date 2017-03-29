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
    //Validator CSS
    echo $this->Html->css('validator/bootstrapValidator');
    echo $this->Html->script('validator/bootstrapValidator', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
    echo $this->Html->script('cep', array('block'=>'customArchives'));
?>
<? $this->Html->scriptStart(array('block'=>'codesJavaScripts')); ?>
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

     $("#CandidatoCondicaoComprimentoCota2").click(function(){
        $("#reabilitacao").fadeOut();
        $("#CandidatoDescricaoReabilitacao").attr('required', 'false');
     });

      $('#CandidatoCursos').tokenfield({
        autocomplete: {
          source: "<?=$this->base?>/cursos_academicos_tecnicos/busca_curso",
          minLength: 3,
          delay: 100
        },
        minWidth: '120px',
        showAutocompleteOnFocus: true
      });

  });
<? $this->Html->scriptEnd(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidato</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Candidato', array('role'=>'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                Adicionar
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabs-1" data-toggle="tab">Identificação</a></li>
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
                    <div class="tab-pane fade in active" id = "tabs-1">
                        <div class="row">
                            <?php
                                echo $this->Form->input('nome', array('div'=>array('class'=>'col-xs-4'), 'required'=>'required'));
                       		    echo $this->Form->input('cpf', array('div'=>array('class'=>'col-xs-2'), 'onkeyup' => 'formataCPF(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'label'=>'CPF', 'required'=>'required'));
                        	    echo $this->Form->input('identidade', array('div'=>array('class'=>'col-xs-2'), 'required'=>'required'));
                       		    echo $this->Form->input('data_nascimento', array('div'=>array('class'=>'col-xs-2'), 'label'=>'Data de Nascimento', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10, 'required'=>'required'));
                            ?>
                        </div>
                        <p style="clear: both"></p>
                        <div class="row">
                            <?php
                                echo $this->Form->input('sexo', array('div'=>array('class'=>'col-xs-2'), 'empty'=>'selecione', 'options'=>array('M'=>'Masculino', 'F'=>'Feminino'), 'required'=>'required'));
                      		    echo $this->Form->input('estado_civil_id', array('div'=>array('class'=>'col-xs-2'),'options'=>$estadosCivis, 'required'=>'required', 'empty'=>'Selecione'));
                      		    echo $this->Form->input('nacionalidade', array('div'=>array('class'=>'col-xs-2'),'required'=>'required'));
                                echo $this->Form->input('tem_filhos', array('div'=>array('class'=>'col-xs-2'), 'required'=>'required', 'options'=>array('S'=>'Sim', 'N'=>'Não')));
                      		    echo $this->Form->input('quantos_filhos', array('div'=>array('id'=>'temFilhos', 'style'=>'display: none;', 'class'=>'col-xs-2'), 'label'=>'Quantos Filhos'));
                            ?>
                        </div>
                    </div>

                    <div class="tab-pane fade" id = "tabs-2">
                        <div class="row">
                            <?php
                                echo $this->Form->input('cep', array('div'=>array('class'=>'col-xs-2'), 'onkeyup' => 'formataCEP(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'label'=>'CEP', 'id'=>'cep', 'required'=>'required'));
                        		echo $this->Form->input('logradouro', array('div'=>array('class'=>'col-xs-4'),'id'=>'logradouro', 'required'=>'required'));
                        		echo $this->Form->input('numero', array('div'=>array('class'=>'col-xs-2'), 'label'=>'Número', 'required'=>'required'));
                        		echo $this->Form->input('complemento', array('div'=>array('class'=>'col-xs-2')));
                            ?>
                        </div>
                        <p style="clear: both"></p>
                        <div class="row">
                            <?
                        		echo $this->Form->input('bairro', array('div'=>array('class'=>'col-xs-2'), 'id'=>'bairro', 'required'=>'required'));
                        		echo $this->Form->input('cidade', array('div'=>array('class'=>'col-xs-2'), 'id'=>'cidade', 'required'=>'required'));
                        		echo $this->Form->input('estado', array('div'=>array('class'=>'col-xs-2'), 'id'=>'uf', 'required'=>'required'));
                                echo $this->Form->input('geocode', array('div'=>array('class'=>'col-xs-2'), 'label'=>'Geocode'));
                            ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id = "tabs-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                  <div class="panel-heading">Próprios</div>
                                  <!-- /.panel-heading -->
                                  <div class="panel-body">
                                        <?php
                                            echo $this->Form->input('e_mail', array('label'=>'E-mail'));
                                  	        echo $this->Form->input('telefone', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                    		echo $this->Form->input('celular_1', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                            echo $this->Form->input('celular_2', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                    		echo $this->Form->input('celular_3', array('onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
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
                                    		echo $this->Form->input('contato_nome', array('label'=>'Nome do Contato'));
                                    		echo $this->Form->input('contato_telefone', array('label'=>'Telefone do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                    		echo $this->Form->input('contato_celular_1', array('label'=>'Celular 1 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                    		echo $this->Form->input('contato_celular_2', array('label'=>'Celular 2 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                    		echo $this->Form->input('contato_celular_3', array('label'=>'Celular 3 do Contato', 'onkeyup' => 'formataTel(this,event)', 'onkeypress'=>'return OnlyNumbers(event)'));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="tab-pane fade" id = "tabs-4">
                        <div class="row">
                            <?php
                    		    echo $this->Form->input('escolaridade_id', array('div'=>array('class'=>'col-xs-3'), 'empty'=>'Selecione', 'required'=>'required'));
                    		    echo $this->Form->input('observacoes_escolaridade', array('div'=>array('class'=>'col-xs-3'), 'label'=>'Observações (Série / Período)'));
                            ?>
                        </div>
                        <div class="row">
                            <?
                                echo '<p style="clear:both"></p>';
                    		    echo $this->Form->input('cursos', array('div'=>array('class'=>'col-xs-6'), 'placeholder'=>'Digite o nome do curso', 'label'=>'Cursos | Acadêmicos | Técnico | Qualificação'));
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
                               <?php
                                        echo $this->Form->input('necessita_qualificacao', array('label'=>'Necessita de Qualificação', 'required'=>'required', 'empty'=>'Selecione', 'options'=>array('1'=>'Sim', '0'=>'Não')));
                            		    echo $this->Form->input('cursos_interesse', array('label'=>'Cursos de Interesses'));
                                ?>
                            </div>
                        </div>
                   </div>
                   <div class="tab-pane fade" id = "tabs-5">
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
                                            		    echo $this->Form->input('empresa', array('name'=>'data[ExperienciasProfissional]['.$y.'][empresa]'));
                                            		    echo $this->Form->input('admissao', array('name'=>'data[ExperienciasProfissional]['.$y.'][admissao]', 'label'=>'Admissão', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10));
                                            		    echo $this->Form->input('demissao', array('name'=>'data[ExperienciasProfissional]['.$y.'][demissao]', 'label'=>'Demissão', 'onkeyup'=>'formataData(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'type'=>'text', 'maxlength'=>10));
                                            		    echo $this->Form->input('cargo', array('name'=>'data[ExperienciasProfissional]['.$y.'][cargo]'));
                                              		    echo $this->Form->input('ultimo_salario', array('name'=>'data[ExperienciasProfissional]['.$y.'][ultimo_salario]', 'label'=>'Último Salário', 'onkeypress'=>'return OnlyNumbers(event)', 'onkeyup' => 'formataValor(this,event)'));
                                                        echo '<p style="clear:both"></p>';
                                                        echo $this->Form->input('atividades_desenvolvidas', array('name'=>'data[ExperienciasProfissional]['.$y.'][atividades_desenvolvidas]'));
                                            		    echo $this->Form->input('motivo_desligamento', array('name'=>'data[ExperienciasProfissional]['.$y.'][motivo_desligamento]'));
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
                   <div class="tab-pane fade" id = "tabs-6">
           	            <div class="row">
                            <?php
                                echo $this->Form->input('area_interesse_trabalho', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Área de Interesse Trabalho'));
                                echo '<p style="clear:both"></p>';
                            ?>
                        </div>
                        <div  class="row">
                            <?php
                        		echo $this->Form->input('disponibilidade_horario', array('div'=>array('class'=>'col-xs-3'), 'label'=>'Disponibilidade Horário'));
                                echo $this->Form->input('pretensao_salarial_id', array('div'=>array('class'=>'col-xs-3'), 'label'=>'Pretensão Salarial', 'empty'=>'Selecione', 'options'=>$listPretensoes));
                            ?>
                        </div>
                   </div>
                   <div class="tab-pane fade" id = "tabs-7">
                        <div class="row">
                            <?php
                        		echo $this->Form->input('origem_id', array('div'=>array('class'=>'col-xs-3'), 'required'=>'required', 'empty'=>'Selecione'));
                                echo '<p style="clear:both"></p>';
                        		echo $this->Form->input('observacoes_indicacoes', array('div'=>array('class'=>'col-xs-6'), 'label'=>'Observações da Indicação'));
                            ?>
                        </div>
                   </div>
                   <div class="tab-pane fade" id = "tabs-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">Condição de Cumprimento de cota</div>
                                    <!-- /.panel-heading -->
                                    <div class="panel-body">
                                        <?php
                                            echo $this->Form->radio('condicao_comprimento_cota', array('0'=>'Pessoa com deficiência', '1'=>'Pessoa reabilitada'), array('hiddenField'=>false, 'legend'=>false));
                                        	echo $this->Form->input('descricao_reabilitacao', array('div'=>array('id'=>'reabilitacao', 'style'=>'display: none;'), 'label'=>'Descrição da Reabilitação'));
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
                   <div class="tab-pane fade" id = "tabs-9">
                            <?php echo $this->Form->input('parecer_entrevistador', array('div'=>array('class'=>'col-xs-6'), 'label'=>false, 'required'=>'required')); ?>
                   </div>
                </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
