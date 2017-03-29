<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Estados Civis</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Listagem</h4>
                <ul class="links">
                    <li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar'), array('action' => 'add'), array('escape'=>false)); ?></li>
    			</ul>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-index">
                        <thead>
                            <tr>
                    			<th><?php echo $this->Paginator->sort('nome'); ?></th>
                    			<th class="actions"><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	foreach ($estadosCivis as $estadosCivil): ?>
                        	<tr>
                        		<td><?php echo h($estadosCivil['EstadosCivil']['nome']); ?>&nbsp;</td>
                        		<td class="actions">
                        			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $estadosCivil['EstadosCivil']['id']), array('escape'=>false)); ?>
                        			<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $estadosCivil['EstadosCivil']['id']), array('escape'=>false), __('Deseja remover o estado civil # %s?', $estadosCivil['EstadosCivil']['nome'])); ?>
                        		</td>
                        	</tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>