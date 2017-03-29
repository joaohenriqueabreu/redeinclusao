<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Contratos <?=$this->Util->statusContrato($this->params->query['status']); ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php
                        $conditions = array('Contrato.status' => $this->params->query['status']);
                        if(isset($this->params->query['ano'])){
                            if($this->params->query['status'] == 'A'){
                                $conditions['date_format(Contrato.inicio_vigencia, "%Y")'] = $this->params->query['ano'];
                            }else{
                                $conditions['date_format(Contrato.data_troca_status, "%Y")'] = $this->params->query['ano'];
                            }
                        }
                    ?>
                    <?php echo $this->DataTable->render('Contrato', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$conditions)) ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <!-- Modal HTML -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">

              </div>
          </div>
      </div>
    </div>
    <!-- /.col-lg-12 -->
</div>