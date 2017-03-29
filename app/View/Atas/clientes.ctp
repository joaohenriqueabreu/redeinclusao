<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Atas Clientes</h1>
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
                    <?php echo $this->DataTable->render('Cliente', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>array('Ata.interna' => 'N', 'Ata.cliente_id is not null', 'Ata.user_id' => $this->Session->read('Auth.User.id')))) ?>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>