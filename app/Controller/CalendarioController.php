<?php
App::uses('AppController', 'Controller');
/**
 * Atas Controller
 *
 * @property Calendario $Calendario
 */
class CalendarioController extends AppController {

    var $uses = array();

    public function index(){
      $this->layout = 'ajax';
    }

}
?>
