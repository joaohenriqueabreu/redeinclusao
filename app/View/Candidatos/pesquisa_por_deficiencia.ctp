<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Candidatos</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Candidatos por Deficiência</h4>
                <ul class="links">
      		        <li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            echo $this->Form->create('Candidato', array('role'=>'form', 'type'=>'get'));
                        ?>
                        <p style="clear: both"></p>
                        <div class="form-group">
                            <?php echo $this->Form->input('palavra_chave', array('class'=>'form-control', 'value'=>(!empty($_GET['palavra_chave'])?$_GET['palavra_chave']:'')));?>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Deficiência</label>
                            <p style="clear: both"></p>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaAuditiva">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaAuditiva" value="1" <?=isset($_GET['possui_deficiencia_auditiva'])?'checked="checked"':'';?> name="possui_deficiencia_auditiva">Auditiva
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaFisica">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaFisica" value="1" <?=isset($_GET['possui_deficiencia_fisica'])?'checked="checked"':'';?> name="possui_deficiencia_fisica">Fisíca
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaIntelectual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaIntelectual" value="1" <?=isset($_GET['possui_deficiencia_intelectual'])?'checked="checked"':'';?> name="possui_deficiencia_intelectual">Intelectual
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaVisual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaVisual" value="1" <?=isset($_GET['possui_deficiencia_visual'])?'checked="checked"':'';?> name="possui_deficiencia_visual">Visual
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
                            <label>Necessita Ajudas Técnicas</label>
                            <p style="clear: both"></p>
                            <label class="radio-inline">
                                <input type="radio" value="1" id="optionsRadiosInline1" <?=(isset($_GET['necessita_ajudas_tecnicas']) and $_GET['necessita_ajudas_tecnicas'] == 1)?'checked="checked"':'';?> name="necessita_ajudas_tecnicas">Sim
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="0" id="optionsRadiosInline2" <?=(isset($_GET['necessita_ajudas_tecnicas']) and $_GET['necessita_ajudas_tecnicas'] == 0)?'checked="checked"':'';?> name="necessita_ajudas_tecnicas">Não
                            </label>
                        </div>
                        <button class="btn btn-primary" type="submit">Pesquisar</button>
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
                $descricaoDeficiencias = array('possui_deficiencia_auditiva'=>'descricao_deficiencia_auditiva LIKE', 'possui_deficiencia_fisica'=>'descricao_deficiencia_fisica LIKE', 'possui_deficiencia_intelectual'=>'descricao_deficiencia_intelectual LIKE', 'possui_deficiencia_visual'=>'descricao_deficiencia_visual LIKE', 'necessita_ajudas_tecnicas'=>'quais_ajudas_tecnicas LIKE', 'condicao_comprimento_cota'=>'descricao_reabilitacao LIKE');
                foreach($_GET as $key=>$value){
                    if(!empty($value) and $key <> 'palavra_chave'){
                        $conditions['Candidato.'.$key] = $value;
                        if(!empty($_GET['palavra_chave'])){
                            $conditions['Candidato.'.$descricaoDeficiencias[$key]] = '%'.$_GET['palavra_chave'].'%';
                        }
                    }
                }
        ?>
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h4>Listagem</h4>
                  </div>
                  <!-- /.panel-heading -->
                  <div class="panel-body">
                      <div class="dataTable_wrapper">
                          <?php echo $this->DataTable->render('Candidato', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$conditions)) ?>
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