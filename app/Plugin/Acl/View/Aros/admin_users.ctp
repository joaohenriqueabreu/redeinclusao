<?php
echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

<?php
echo $this->Form->create('User', array('url' => array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'admin_users')));
echo __d('acl', 'Nome');
echo '<br/>';
echo $this->Form->input($user_display_field, array('label' => false, 'div' => false));
echo ' ';
echo $this->Form->end(array('label' =>__d('acl', 'Filtrar'), 'div' => false));
echo '<br/>';
?>
<table border="0" cellpadding="5" cellspacing="2" class="table table-hover">
<tr>
	<?php
	$column_count = 1;
	
	$headers = array($this->Paginator->sort($user_display_field, __d('acl', 'Nome')));
	
	foreach($roles as $role)
	{
	    $headers[] = $role[$role_model_name][$role_display_field];
	    $column_count++;
	}
	
	echo $this->Html->tableHeaders($headers);
	
	?>
	
</tr>
<?php
foreach($users as $user)
{
    $style = isset($user['Aro']) ? '' : ' class="line_warning"';
    
    echo '<tr' . $style . '>';
    echo '  <td>' . $user[$user_model_name][$user_display_field] . '</td>';
    
    foreach($roles as $role)
	{
	   if(isset($user['Aro']) && $role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
	   {
	       echo '  <td>' . $this->Html->image('/acl/img/design/tick.png') . '</td>';
	   }
	   else
	   {
	   	   $title = __d('acl', 'Atualize o papel de usuário');
	       echo '  <td>' . $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), '/admin/acl/aros/update_user_role/user:' . $user[$user_model_name][$user_pk_name] . '/role:' . $role[$role_model_name][$role_pk_name], array('title' => $title, 'alt' => $title, 'escape' => false)) . '</td>';
	   }
	}
	
    //echo '  <td>' . (isset($user['Aro']) ? $this->Html->image('/acl/img/design/tick.png') : $this->Html->image('/acl/img/design/cross.png')) . '</td>';
    
    echo '</tr>';
}
?>
<tr>
	<td class="paging" colspan="<?php echo $column_count ?>">
		<?php echo $this->Paginator->prev('<< ' . __d('acl', 'Anterior'), array(), null, array('class'=>'disabled'));?>
	 	|
	 	<?php echo $this->Paginator->numbers(array('modulus' => 5, 'first' => 2, 'last' => 2, 'after' => ' ', 'before' => ' '));?>
	 	|
		<?php echo $this->Paginator->next(__d('acl', 'Próximo') . ' >>', array(), null, array('class' => 'disabled'));?>
	</td>
</tr>
</table>


<?php
if($missing_aro)
{
?>
    <div style="margin-top:20px">

    <p class="warning"><?php echo __d('acl', 'Alguns usuários não estão associados as ações. Clique no grupo para associar.') ?></p>
    
    </div>
<?php
}
?>

<?php
echo $this->element('design/footer');
?>
