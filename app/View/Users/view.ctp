    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Usuário</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Visualizar</h4>
                    <ul class="links">
                		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span> Editar'), array('action' => 'edit', $user['User']['id']), array('escape'=>false)); ?> </li>
                		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span> Excluir'), array('action' => 'delete', $user['User']['id']), array('escape'=>false), __('Deseja remover o Usuário # %s?', $user['User']['nome'])); ?> </li>
                		<li><?php echo $this->Html->link(__('<span class="fa  fa-list "></span>&nbsp;Listar'), array('action' => 'index'), array('escape'=>false)); ?> </li>
                		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;Adicionar'), array('action' => 'add'), array('escape'=>false)); ?> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
            	<dl class="dl-horizontal">
            		<dt><?php echo __('Cód'); ?></dt>
            		<dd>
            			<?php echo h($user['User']['id']); ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('Username'); ?></dt>
            		<dd>
            			<?php echo h($user['User']['username']); ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('E-mail'); ?></dt>
            		<dd>
            			<?php echo h($user['User']['email']); ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('Grupo'); ?></dt>
            		<dd>
            			<?php echo $user['Group']['name']; ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('Cadastrado em'); ?></dt>
            		<dd>
            			<?php echo h($user['User']['created']); ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('Modificado em'); ?></dt>
            		<dd>
            			<?php echo h($user['User']['modified']); ?>
            			&nbsp;
            		</dd>
            	</dl>
            </div>
        </div>
      </div>
    </div>