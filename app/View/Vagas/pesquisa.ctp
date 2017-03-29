<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Vagas</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pesquisar</h4>
                <ul class="links">
      		        <li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?></li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            echo $this->Form->create('Vaga', array('role'=>'form', 'type'=>'get'));
                        ?>
                        <p style="clear: both"></p>
                        <div class="form-group">
                            <label>Tipo de Deficiência</label>
                            <p style="clear: both"></p>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaAuditiva">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaAuditiva" value="1" name="deficiencia_auditiva">Auditiva
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaFisica">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaFisica" value="1" name="deficiencia_fisica">Fisíca
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaIntelectual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaIntelectual" value="1" name="deficiencia_intelectual">Intelectual
                            </label>
                            <label class="checkbox-inline" for="CandidatoPossuiDeficienciaVisual">
                                <input type="checkbox" id="CandidatoPossuiDeficienciaVisual" value="1" name="deficiencia_visual">Visual
                            </label>
                            <label class="checkbox-inline" for="CandidatoCondicaoComprimentoCota">
                                <input type="checkbox" id="CandidatoCondicaoComprimentoCota" value="1" name="reabilitado">Reabilitado
                            </label>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <p style="clear: both"></p>
                            <label class="radio-inline">
                                <input type="radio" value="A" id="optionsRadiosInline1" name="status" required="required">Ativa
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="C" id="optionsRadiosInline2" name="status" required="required">Cancelada
                            </label>
                            <label class="radio-inline">
                                <input type="radio" value="P" id="optionsRadiosInline3" name="status" required="required">Preenchida
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
                foreach($_GET as $key=>$value){
                    if(!empty($value)){
                        $conditions['Vaga.'.$key] = $value;
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
                          <?php echo $this->DataTable->render('Vaga', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$conditions)) ?>
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