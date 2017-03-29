<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Usuários</h1>
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
                            	<th><?php echo $this->Paginator->sort('email','E-mail'); ?></th>
                            	<th><?php echo $this->Paginator->sort('group_id','Grupo'); ?></th>
                            	<th><?php echo $this->Paginator->sort('created', 'Cadastrado em'); ?></th>
                                <th class="actions">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php
                        	foreach ($users as $user): ?>
                        	<tr>
                        		<td><?php echo h($user['User']['nome']); ?></td>
                                <td><?php echo h($user['User']['email']); ?></td>
                                <td><?php echo h($user['Group']['name']); ?></td>
                        		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
                                <td class="actions">
                        			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search">'), array('action' => 'view', $user['User']['id']), array('escape'=>false)); ?>
                        			<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('action' => 'edit', $user['User']['id']), array('escape'=>false)); ?>
                        			<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('action' => 'delete', $user['User']['id']), array('escape'=>false), __('Deseja remover o usuário # %s?', $user['User']['username'])); ?>
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