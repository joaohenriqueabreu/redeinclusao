<?php
class MenuHelper extends AppHelper{

    public $menu = "";
    public $grupos = array();

    public function getGroups(){

        if(isset($_SESSION['Auth'])){
            $sessionGroups = $_SESSION['Auth']['User']['Group'];
            foreach($sessionGroups as $group){
                $arrayGroups[] = 'group_id = '.$group['id'];
            }
            if(is_array($arrayGroups)){
                $groups = join(' OR ',$arrayGroups);
                return $groups;
            }else{
                return false;
            }
        }
    }

    function subMenus($id=null){
        $subMenus = '';
    	$subMenus = ClassRegistry::init('Menu')->query("select distinct menus.* from groups_menus
                                                        join groups on(groups_menus.group_id = groups.id)
                                                        join menus on(groups_menus.menu_id = menus.id)
                                                        where
                                                            parent = ".$id." AND
                                                            group_id = ".$_SESSION['Auth']['User']['Group']['id']."
                                                            group by menus.titulo
                                                        order by menus.ordem asc, menus.titulo asc;");
        if($subMenus){
            return $subMenus;
        }
        return false;
    }

    function generateMenu(){

    	$menus = ClassRegistry::init('Menu')->query("select distinct menus.*, menus.ordem is null ordem_null from groups_menus
                                                        join groups on(groups_menus.group_id = groups.id)
                                                        join menus on(groups_menus.menu_id = menus.id)
                                                        where
                                                            parent = 0 AND
                                                            group_id = ".$_SESSION['Auth']['User']['Group']['id']."
                                                            group by menus.titulo
                                                          order by ordem_null asc, menus.ordem asc, menus.titulo asc");
        if($menus){
        	foreach($menus as $menu){
        	    $subMenus = '';
                $icone = '';
                if(!empty($menu['menus']['icone'])){
                    $icone = $menu['menus']['icone'];
                }
                if($menu['menus']['controller'] == '#'){
                    $sub = '<span class="fa arrow"></span>';
                }else{
                    $sub = '';
                }
                if(!empty($menu['menus']['action'])){
                    $link = "/".$menu['menus']['controller'].'/'.$menu['menus']['action'];
                }else{
                    $link = "/".$menu['menus']['controller'];
                }
                $this->menu .= "<li><a href='".$this->base.$link."'><i class='fa $icone fa-fw'></i> ". $menu['menus']['titulo']." $sub</a>";
        		$subMenus = $this->subMenus($menu['menus']['id']);
        		if($subMenus){
                    $this->menu .= "\n<ul class=\"nav nav-second-level\">\n";
        			foreach($subMenus as $subMenu){
        			    $controller = $subMenu['menus']['controller'];
                        $action = $subMenu['menus']['action'];
                        $iconeSub = '';
                        if(!empty($subMenu['menus']['icone'])){
                          $iconeSub = "<i class='fa ". $subMenu['menus']['icone']." fa-fw'></i>";
                        }
        				$this->menu .= "<li>".$this->link($iconeSub.' '.$subMenu['menus']['titulo'],"/$controller/$action")."</li>\n";
        			}
                    $this->menu .= "</ul>\n";
        		}
                $this->menu .= "</li>\n";
        	}
        }
        return $this->menu;
    }


    function link($nome, $link){
        //<i class="fa fa-dashboard fa-fw"></i>
        return '<a href = "'.$this->base.$link.'">'.$nome.'</a>';
    }

}
?>