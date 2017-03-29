<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
                if(isset($this->params->query['ativo']) and $this->params->query['ativo'] == 'S'){
                    $ativo = 'Ativos';
                }
                if(isset($this->params->query['ativo']) and $this->params->query['ativo'] == 'N'){
                    $ativo = 'Inativos';
                }
                echo 'Parceiros - '.$ativo;
            ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/parceiros/add" data-original-title="" title=""><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a> </li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php echo $this->DataTable->render('Parceiro', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$this->params->query)) ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>