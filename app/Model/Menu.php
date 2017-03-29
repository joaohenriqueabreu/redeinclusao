<?php
class Menu extends AppModel{
    var $name = 'Menu';
    var $useTable = 'menus';
    var $displayField = 'titulo' ;

    var $hasAndBelongsToMany = array(
        'Group' => array(
            'className'             => 'Group',
            'joinTable'             => 'groups_menus',
            'foreignKey'            => 'menu_id',
            'associationForeignKey' => 'group_id',
            'uniq'                  => true
        )
    );

    function listar(){
        $menus = $this->find('all');
        foreach($menus as $menu){
            if($menu['Menu']['parent'] == 0) {
                $menuArray[$menu['Menu']['id']] = $menu['Menu']['titulo'];
            } else {
               $this->recursive = 0;
               $parent = $this->find('first', array('conditions' => array('id'=>$menu['Menu']['parent'])));
               $menuArray[$menu['Menu']['id']] = $parent['Menu']['titulo']." - ".$menu['Menu']['titulo'];
            }
        }
        return $menuArray;
    }
}
?>