<!-- Top Bar Starts -->
<div class="top-bar clearfix">
	<div class="page-title">
		<h4><div class="fs1" aria-hidden="true"></div>ProjetosTiposPerguntasLevantamentos</h4>
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
                                <?php echo $this->Html->link(__('<i class="fa  fa-plus"></i>&nbsp;&nbsp;Adicionar'), array('action' => 'add'), array('escape' => false)); ?>                            </li>
    					</ul>
  			        </div>
                   <div class="panel-body">
                        <div class="dataTable_wrapper">
                          <div class="table-responsive">
                  			<p>
                                <small><?php echo $this->Paginator->counter(array('format' => __('<b>Página {:page}</b> (do total {:pages}) - <b>exibindo de {:start} a {:end}</b> (do total {:count} registro(s)')));?></small>
                  			</p>
                              <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                  				<thead>
                  					<tr>
                  			                          			            <th style="width:5%"><?php echo $this->Paginator->sort('id', 'Cód.'); ?></th>
                                                      			            <th><?php echo $this->Paginator->sort('nome'); ?></th>
                  			                          			            <th style="width:5%">Ações</th>
                  					</tr>
                  				</thead>
                  				<tbody>
                      				<?php foreach ($projetosTiposPerguntasLevantamentos as $projetosTiposPerguntasLevantamento): ?>
					<tr>
						<td><?php echo h($projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']); ?>&nbsp;</td>
						<td><?php echo h($projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['nome']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']), array('escape' => false)); ?>&nbsp;&nbsp;
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']), array('escape' => false)); ?>&nbsp;&nbsp;
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id']), array('escape' => false), __('Deseja remover o registro # %s?', $projetosTiposPerguntasLevantamento['ProjetosTiposPerguntasLevantamento']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
                  				</tbody>
                              </table>
                              <?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
			?>
                  			<ul class="pagination pagination-sm">
                  				<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
				?>
                  			</ul>
                  			<?php } ?>
                          </div>
                      </div>
                      <!-- /.table-responsive -->
                </div>
           </div>
         </div>
       </div>
	</div>
	<!-- Spacer ends -->
</div>