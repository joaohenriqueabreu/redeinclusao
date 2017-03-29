<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Processo Seletivo</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pesquisa</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            echo $this->Form->create('ProcessosSeletivo', array('role'=>'form', 'type'=>'get'));
                        ?>
                        <p style="clear: both"></p>
                        <div class="form-group">
                            <label>Tipo de Deficiência</label>
                            <p style="clear: both"></p>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaAuditiva">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaAuditiva" value="1" <?=isset($_GET['deficiencia_auditiva'])?'checked="checked"':'';?> name="deficiencia_auditiva">Auditiva
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaFisica">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaFisica" value="1" <?=isset($_GET['deficiencia_fisica'])?'checked="checked"':'';?> name="deficiencia_fisica">Fisíca
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaIntelectual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaIntelectual" value="1" <?=isset($_GET['deficiencia_intelectual'])?'checked="checked"':'';?> name="deficiencia_intelectual">Intelectual
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaVisual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaVisual" value="1" <?=isset($_GET['deficiencia_visual'])?'checked="checked"':'';?> name="deficiencia_visual">Visual
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Reabilitado</label>
                            <p style="clear: both"></p>
                            <label class="radio-inline">
                                <input type="radio" value="1" id="optionsRadiosInline1" <?=(isset($_GET['reabilitado']) and $_GET['reabilitado'] == 1)?'checked="checked"':'';?> name="reabilitado">Sim
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="0" id="optionsRadiosInline2" <?=(isset($_GET['reabilitado']) and $_GET['reabilitado'] == 0)?'checked="checked"':'';?> name="reabilitado">Não
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Resultado</label>
                            <p style="clear: both"></p>
                            <label class="radio-inline">
                                <input type="radio" value="NC" id="optionsRadiosInline1" <?=(isset($_GET['resultado']) and $_GET['resultado'] == 'NC')?'checked="checked"':'';?> name="resultado">Não Concluído
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="NCA" id="optionsRadiosInline2" <?=(isset($_GET['resultado']) and $_GET['resultado'] == 'NCA')?'checked="checked"':'';?> name="resultado">Não Concluiu Avaliação
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="D" id="optionsRadiosInline3" <?=(isset($_GET['resultado']) and $_GET['resultado'] == 'D')?'checked="checked"':'';?> name="resultado">Desistiu
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="R" id="optionsRadiosInline4" <?=(isset($_GET['resultado']) and $_GET['resultado'] == 'R')?'checked="checked"':'';?> name="resultado">Reprovado
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="C" id="optionsRadiosInline5" <?=(isset($_GET['resultado']) and $_GET['resultado'] == 'C')?'checked="checked"':'';?> name="resultado">Contratado
                            </label>
                        </div>
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
                        <a href="<?=$this->base?>/ProcessosSeletivos" class="btn btn-primary">Limpar</a>
                        <?php
                            echo $this->Form->end();
                        ?>
                      </div>
                  </div>
            </div>
        </div>
        <?php
            if(!empty($_GET)):
                $conditions = array();
                foreach($_GET as $key=>$value){
                    if(!empty($value) and $key <> 'palavra_chave' and $key <> 'palavra_chave'){
                        if($key == 'resultado'){
                            $conditions['ProcessosSeletivo.'.$key] = $value;
                        }else{
                            $conditions['Vaga.'.$key] = $value;
                        }
                    }
                }
                /*
                if(!empty($_GET['palavra_chave'])){
                    $conditions['OR']['Candidato.nome like'] = '%'.$_GET['palavra_chave'].'%';
                    $conditions['OR']['Vaga.cargo like'] = '%'.$_GET['palavra_chave'].'%';
                }*/
        ?>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4>Listagem</h4>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="dataTable_wrapper">
                          <?php echo $this->DataTable->render('ProcessosSeletivo', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$conditions)) ?>
                      </div>
                  </div>
                  <!-- /.panel-body -->
              </div>
        <?php
            endif;
        ?>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>