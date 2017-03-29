<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Colaboradores</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li><a href="<?=$this->base?>/colaboradores/add" data-original-title="" title=""><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;Adicionar</a> </li>
            	</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <?php echo $this->DataTable->render('Colaborador', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$this->params->query)) ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>