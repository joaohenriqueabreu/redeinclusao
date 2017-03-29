<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
        <h1 class="page-header">Perguntas Levantamento</h1>
	</div>
</div>
<!-- Top Bar Ends -->
<div class="container-fluid">
    <!-- Spacer starts -->
    <div class="spacer-xs">
        <!-- Row start -->
        <div class="row no-gutter">
            <div class="col-md-12 col-sm-12 col-sx-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Listagem</h4>
    				    <ul class="links">
                            <li>
                                <?php echo $this->Html->link(__('<i class="fa  fa-plus"></i>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?>
                            </li>
    					</ul>
  			        </div>
                   <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <?php echo $this->DataTable->render('PerguntasLevantamento', array(), array('sAjaxSource'=>array('action' => 'processDataTableRequest'), 'conditions'=>$this->params->query)) ?>
                        </div>
                      <!-- /.table-responsive -->
                </div>
           </div>
         </div>
       </div>
	</div>
	<!-- Spacer ends -->
</div>