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
                <h4>Listagem</h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/vagas/add"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a></li>
                </ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php
                        if(isset($this->params->query['status'])){
                            $this->params->query['Vaga.status'] = $this->params->query['status'];
                            unset($this->params->query['status']);
                        }
                    ?>
                    <?php echo $this->DataTable->render('Vaga', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$this->params->query)) ?>
                </div>
            </div>
        </div>
    </div>
</div>