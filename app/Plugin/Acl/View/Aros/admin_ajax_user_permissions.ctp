<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/header');
?>

<?php
echo $this->element('Aros/links');
?>

    <h1><?php echo  __d('acl', 'Usuário') . ' : ' . $user[$user_model_name][$user_display_field]; ?></h1>

    <h2><?php echo __d('acl', 'Grupo'); ?></h2>

    <table border="0">
    <tr>
    	<?php
    	foreach($roles as $role)
    	{
    	    echo '<td>';

    	    echo $role[$role_model_name][$role_display_field];
    	    if($role[$role_model_name][$role_pk_name] == $user[$user_model_name][$role_fk_name])
    	    {
    	        echo $this->Html->image('/acl/img/design/tick.png');
    	    }
    	    else
    	    {
    	    	$title = __d('acl', 'Atualize o grupo do usuário');
    	        echo $this->Html->link($this->Html->image('/acl/img/design/tick_disabled.png'), array('plugin' => 'acl', 'controller' => 'aros', 'action' => 'update_user_role', 'user' => $user[$user_model_name][$user_pk_name], 'role' => $role[$role_model_name][$role_pk_name]), array('title' => $title, 'alt' => $title, 'escape' => false));
    	    }

    	    echo '</td>';
    	}
    	?>
    </tr>
    </table>

    <h2><?php echo __d('acl', 'Permissões'); ?></h2>

	<?php
	if($user_has_specific_permissions)
	{
	    echo '<div class="separator"></div>';
    	echo $this->Html->image('/acl/img/design/bulb24.png') . __d('acl', 'Este usuário não tem permissões específicas');
    	echo ' (';
    	echo $this->Html->link($this->Html->image('/acl/img/design/cross2.png', array('style' => 'vertical-align:middle;')) . ' ' . __d('acl', 'Limpar'), '/admin/acl/aros/clear_user_specific_permissions/' . $user[$user_model_name][$user_pk_name], array('confirm' => __d('acl', 'Você tem certeza que deseja apagar as permissões específicas para este usuário?'), 'escape' => false));
    	echo ')';
    	echo '<div class="separator"></div>';
	}
	?>
	
    <table border="0" cellpadding="5" cellspacing="2">
	<tr>
    	<?php

    	$column_count = 1;

    	$headers = array(__d('acl', 'ação'), __d('acl', 'autorização'));

    	echo $this->Html->tableHeaders($headers);
    	?>
	</tr>

	<?php
	$js_init_done = array();
	$previous_ctrl_name = '';
	
	if(isset($actions['app']) && is_array($actions['app']))
	{
    	foreach($actions['app'] as $controller_name => $ctrl_infos)
    	{
    		if($previous_ctrl_name != $controller_name)
    		{
    			$previous_ctrl_name = $controller_name;
    
    			$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
    		}
    
    		foreach($ctrl_infos as $ctrl_info)
    		{
        		echo '<tr class="' . $color . '">';
    
        		echo '<td>' . $controller_name . '->' . $ctrl_info['name'] . '</td>';
    
    	    	echo '<td>';
    	    	echo '<span id="right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
    
    	    	/*
    			* The right of the action for the role must still be loaded
    	    	*/
    	        echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'carregando')));
    
    		    if(!in_array($controller_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
    	        {
    	        	$js_init_done[] = $controller_name . '_' . $user[$user_model_name][$user_pk_name];
    	        	$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "", "' . $controller_name . '", "' . __d('acl', 'Uma ações está faltando. Reconstrua a lista de ações.') . '");');
    	        }
    	        
    	    	echo '</span>';
    
    	    	echo ' ';
    	    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right__' . $user[$user_model_name][$user_pk_name] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));
    
    	    	echo '</td>';
    	    	echo '</tr>';
    		}
    	}
	}
	?>
	<?php
	if(isset($actions['plugin']) && is_array($actions['plugin']))
	{
    	foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
    	{
    	    echo '<tr class="title"><td colspan="2">' . __d('acl', 'Plugin') . ' ' . $plugin_name . '</td></tr>';

    	    foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
    	    {
        	    if($previous_ctrl_name != $plugin_ctrler_name)
        		{
        			$previous_ctrl_name = $plugin_ctrler_name;

        			$color = (isset($color) && $color == 'color1') ? 'color2' : 'color1';
        		}

    	        foreach($plugin_methods as $method)
    	        {
    	            echo '<tr class="' . $color . '">';

    	            echo '<td>' . $plugin_ctrler_name . '->' . $method['name'] . '</td>';

    	            echo '<td>';
    	            echo '<span id="right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';

    	            /*
					* The right of the action for the role must still be loaded
    		    	*/
    		        echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('title' => __d('acl', 'carregando')));

    	            if(!in_array($plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name], $js_init_done))
    		        {
    		        	$js_init_done[] = $plugin_name . "_" . $plugin_ctrler_name . '_' . $user[$user_model_name][$user_pk_name];
    		        	$this->Js->buffer('init_register_user_controller_toggle_right("' . $this->Html->url('/', true) . '", "' . $user[$user_model_name][$user_pk_name] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . __d('acl', 'Uma ações está faltando. Reconstrua a lista de ações.') . '");');
    		        }
    		        
    		    	echo '</span>';

    		    	echo ' ';
    		    	echo $this->Html->image('/acl/img/ajax/waiting16.gif', array('id' => 'right_' . $plugin_name . '_' . $user[$user_model_name][$user_pk_name] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));

        		    echo '</td>';
    	            echo '</tr>';
    	        }
    	    }
    	}
	}
    ?>
	</table>
    <?php
    echo $this->Html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'autorizado');
    echo '&nbsp;&nbsp;&nbsp;';
    echo $this->Html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'bloqueado');
    ?>
<?php
echo $this->element('design/footer');
?>