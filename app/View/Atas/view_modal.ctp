<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" data-original-title="" title="">×</button>
    <h4 class="modal-title">&nbsp;</h4>
</div>
<div class="modal-body">
    <!-- Top Bar Starts -->
    <div class="container-fluid">
        <!-- Spacer starts -->
        <div class="spacer-xs">
            <!-- Row start -->
            <div class="row no-gutter">
                <div class="col-md-12 col-sm-12 col-sx-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>Visualização de Ata</h4>
          				    <ul class="links">
                                <li><?php echo $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>&nbsp&nbsp;Editar'), array('action' => 'edit', $ata['Ata']['id']), array('escape' => false)); ?> </li>
        					</ul>
      			        </div>
                        <div class="panel-body">
                			<table cellpadding="0" cellspacing="0" class="table table-striped">
                				<tbody>
                				<tr>
                            		<th style="width:30%"><?php echo __('Cód.'); ?></th>
                            		<td>
                            			<?php echo h($ata['Ata']['id']); ?>
                            			&nbsp;
                            		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Cliente'); ?></th>
                              		<td>
                              			<?php echo h($ata['Cliente']['razao_social']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Tipo'); ?></th>
                              		<td>
                              			<?php echo $this->Util->tiposAtas($ata['Ata']['tipo']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Local'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['local']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Data'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['data']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Horário'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['inicio']); ?> a <?php echo h($ata['Ata']['termino']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Assunto Discutido'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['assuntos_discutidos']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Concluções'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['conclucoes']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Presentes'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['presentes']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Anexo'); ?></th>
                              		<td>
                                        <?php
                                          if(!empty($ata['Ata']['arquivo'])):
                                              echo $this->Html->link(__('<i class="glyphicon glyphicon-download-alt "></i>&nbsp&nbsp;Dowload'), '/files/ata/arquivo/'.$ata['Ata']['dir'].'/'.$ata['Ata']['arquivo'], array('target'=>'_blank', 'escape' => false));
                                          endif;
                                        ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Cadastrado por'); ?></th>
                              		<td>
                              			<?php echo h($ata['User']['nome']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                                <tr>
                              		<th style="width:30%"><?php echo __('Cadastrado em'); ?></th>
                              		<td>
                              			<?php echo h($ata['Ata']['created']); ?>
                              			&nbsp;
                              		</td>
                                </tr>
                				</tbody>
                			</table>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    	<!-- Spacer ends -->
    </div>
</div>