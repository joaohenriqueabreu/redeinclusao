<?php
    echo $this->Html->script('cep', array('block'=>'customArchives'));
    echo $this->Html->script('global', array('block'=>'customArchives'));
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo __('Vaga'); ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <?php echo $this->Form->create('Vaga', array('role'=>'form')); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Editar Vaga - <?=$this->request->data['Cliente']['razao_social']?></h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/vagas/" data-original-title="" title=""><i class="fa  fa-list "></i>&nbsp;&nbsp;Listar</a></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row no-gutter">
                  <?php
                      echo $this->Form->input('id');
                      echo $this->Form->input('cliente_id', array('type'=>'hidden'));
                  ?>
                  <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('unidade', array('class' => 'form-control', 'required'=>'required')); ?>
        				</div>
                  </div>
                  <div class="col-lg-6 col-sm-6 col-sx-6">
                      <div class="form-group">
        					<?php echo $this->Form->input('cargo', array('class' => 'form-control', 'required'=>'required')); ?>
        				</div>
                  </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('cep', array('class' => 'form-control', 'label'=>'CEP', 'id'=>'cep', 'onkeyup' => "formataCEP(this,event)", 'onkeypress'=>'return OnlyNumbers(event)')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('logradouro', array('class' => 'form-control', 'label'=>'Logradouro', 'id'=>'logradouro')); ?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      					<?php echo$this->Form->input('numero', array('class' => 'form-control', 'label'=>'Número')); ?>
      				</div>
                </div>
                <div class="col-lg-3 col-sm-3 col-sx-3">
                    <div class="form-group">
      					<?php echo $this->Form->input('complemento', array('class' => 'form-control', 'label'=>'Complemento')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('bairro', array('class' => 'form-control', 'label'=>'Bairro', 'id'=>'bairro')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('cidade', array('class' => 'form-control', 'label'=>'Cidade', 'id'=>'cidade')); ?>
      				</div>
                </div>
                <div class="col-lg-2 col-sm-2 col-sx-2">
                    <div class="form-group">
      					<?php echo $this->Form->input('uf', array('class' => 'form-control', 'label'=>'Estado', 'id'=>'uf')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('gestor_area', array('class' => 'form-control', 'label'=>'Gestor da área')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('numero_vagas', array('class' => 'form-control', 'label'=>'Nº de Vagas', 'required'=>'required')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('salario', array('class' => 'form-control', 'label'=>'Salário', 'onkeyup' => 'formataValor(this,event)', 'onkeypress'=>'return OnlyNumbers(event)', 'required'=>'required')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('carga_horario_semanal', array('class' => 'form-control', 'label'=>'Carga Horária Semanal', 'required'=>'required')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('horario_trabalho', array('class' => 'form-control', 'label'=>'Horário de Trabalho', 'required'=>'required')); ?>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
      					<?php echo $this->Form->input('horario_trabalho_fds', array('class' => 'form-control', 'label'=>'Horário de Trabalho Final de Semana')); ?>
      				</div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <?php
                        $semana = $this->Form->value('Vaga.dias_trabalho_ss');
                        $sabado = $this->Form->value('Vaga.dias_trabalho_s');
                        $domingo = $this->Form->value('Vaga.dias_trabalho_d');
                    ?>
                    <div class="form-group">
                        <label>Dias de Trabalho</label><br />
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaDiasTrabalhoSs_" name="data[Vaga][dias_trabalho_ss]">
                                <input type="checkbox" id="VagaDiasTrabalhoSs" <?=($semana == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][dias_trabalho_ss]">2º a 6º
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaDiasTrabalhoS_" name="data[Vaga][dias_trabalho_s]">
                                <input type="checkbox" id="VagaDiasTrabalhoS" <?=($sabado == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][dias_trabalho_s]">Sábado
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaDiasTrabalhoD_" name="data[Vaga][dias_trabalho_d]">
                                <input type="checkbox" id="VagaDiasTrabalhoD" <?=($domingo == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][dias_trabalho_d]">Domingo
                            </label>
                        </div>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('beneficios', array('class' => 'form-control', 'label'=>'Benefícios', 'required'=>'required')); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('observacoes_horario', array('class' => 'form-control', 'label'=>'Observações Horário')); ?>
                    </div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('descricao_vaga', array('class' => 'form-control', 'label'=>'Descrição da vaga', 'required'=>'required')); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <?php
                        $alfabetizado = $this->Form->value('Vaga.ensino_alfabetizado');
                        $fundamental = $this->Form->value('Vaga.ensino_fundamental');
                        $medio = $this->Form->value('Vaga.ensino_medio');
                        $superior = $this->Form->value('Vaga.ensino_superior');
                    ?>
                    <div class="form-group">
                        <label>Formação Acadêmica</label><br />
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaEnsinoAlfabetizado_" name="data[Vaga][ensino_alfabetizado]">
                                <input type="checkbox" id="VagaEnsinoAlfabetizado" <?=($alfabetizado == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][ensino_alfabetizado]">Alfabetizado
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaEnsinoFundamental_" name="data[Vaga][ensino_fundamental]">
                                <input type="checkbox" id="VagaEnsinoFundamental" <?=($fundamental == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][ensino_fundamental]">Ensino Fundamental
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaEnsinoMedio_" name="data[Vaga][ensino_medio]">
                                <input type="checkbox" id="VagaEnsinoMedio" <?=($medio == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][ensino_medio]">Ensino Médio
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="hidden" value="N" id="VagaEnsinoSuperior_" name="data[Vaga][ensino_superior]">
                                <input type="checkbox" id="VagaEnsinoSuperior" <?=($superior == 'S')?'checked="checked"':'';?> value="S" name="data[Vaga][ensino_superior]">Ensino Superior
                            </label>
                        </div>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('observacoes_formacao_academica', array('class' => 'form-control', 'label'=>'Observações Formação Acadêmica')); ?>
                    </div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('experiencias_necessarias', array('class' => 'form-control', 'label'=>'Habilidades ou conhecimentos técnicos'));; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('habilidades_comportamentais', array('class' => 'form-control', 'label'=>'Habilidades Comportamentais')); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('sexo', array('class' => 'form-control', 'legend'=>'Sexo', 'required'=>'required', 'empty'=>'Selecione', 'options'=>array('A'=>'Ambos', 'M'=>'Masculino', 'F'=>'Feminino'))); ?>
                    </div>
                </div>
              </div>
              <div class="row no-gutter">
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <?php
                        $auditiva = $this->Form->value('Vaga.deficiencia_auditiva');
                        $fisica = $this->Form->value('Vaga.deficiencia_fisica');
                        $intelectual = $this->Form->value('Vaga.deficiencia_intelectual');
                        $visual = $this->Form->value('Vaga.deficiencia_visual');
                        $reabilitado = $this->Form->value('Vaga.reabilitado');
                    ?>
                    <div class="form-group">
                        <label>Deficiência</label><br />
                        <div class="checkbox">
                            <label for="VagaDeficienciaAuditiva">
                                <input type="hidden" value="0" id="VagaDeficienciaAuditiva_" name="data[Vaga][deficiencia_auditiva]">
                                <input type="checkbox" id="VagaDeficienciaAuditiva" <?=($auditiva == '1')?'checked="checked"':'';?> value="1" name="data[Vaga][deficiencia_auditiva]">Auditiva
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="VagaDeficienciaFisica">
                                <input type="hidden" value="0" id="VagaDeficienciaFisica_" name="data[Vaga][deficiencia_fisica]">
                                <input type="checkbox" id="VagaDeficienciaFisica" <?=($fisica == '1')?'checked="checked"':'';?> value="1" name="data[Vaga][deficiencia_fisica]">Fisíca
                            </label>
                        </div>
                        <div class="checkbox">
                            <label for="VagaDeficienciaIntelectual">
                                <input type="hidden" value="0" id="VagaDeficienciaIntelectual_" name="data[Vaga][deficiencia_intelectual]">
                              <input type="checkbox" id="VagaDeficienciaIntelectual" <?=($intelectual == '1')?'checked="checked"':'';?> value="1" name="data[Vaga][deficiencia_intelectual]">Intelectual
                            </label>
                        </div>
                        <div class="form-group checkbox">
                            <label for="VagaDeficienciaVisual">
                                <input type="hidden" value="0" id="VagaDeficienciaVisual_" name="data[Vaga][deficiencia_visual]">
                              <input type="checkbox" id="VagaDeficienciaVisual" <?=($visual == '1')?'checked="checked"':'';?> value="1" name="data[Vaga][deficiencia_visual]">Visual
                            </label>
                        </div>
                        <div class="form-group checkbox">
                            <label for="VagaReabilitado">
                                <input type="hidden" value="0" id="VagaReabilitado_" name="data[Vaga][reabilitado]">
                              <input type="checkbox" id="VagaReabilitado" <?=($reabilitado == '1')?'checked="checked"':'';?> value="1" name="data[Vaga][reabilitado]">Reabilitado
                            </label>
                        </div>
      				</div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('descricao_deficiencia', array('class' => 'form-control', 'label'=>'Descrição da deficiência')); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-sx-4">
                    <div class="form-group">
                        <?php echo $this->Form->input('status', array('class' => 'form-control', 'emtpy'=>'Selecione', 'empty'=>'Selecione', 'options'=>$status));; ?>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar</button>
        <?php echo $this->Form->end(); ?>
    </div>
</div>