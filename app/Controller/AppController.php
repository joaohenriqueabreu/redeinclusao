<?php

/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    var $helpers = array('CakePtbr.Formatacao', 'Util', 'Html', 'Form', 'Session', 'Menu', 'DataTable.DataTable');
    var $uses = array('Tarefa');
    var $pathWebroot = '';
    public $components = array(
       // 'DebugKit.Toolbar',
        'DataTable.DataTable',
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array('actionPath' => 'controllers')
            )
        ),
        'Admin.AclPermissions',
        'RequestHandler',
        'Session',
        'Email'
    );

    public function beforeFilter() {
        parent::beforeFilter();
        $this->AclPermissions->filter();
        $this->Auth->allow('display', 'processDataTableRequest');
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'pages', 'action' => 'index');
        $logado = $this->Session->read('Auth.User');
        $this->pathWebroot = DOCUMENTROOT . $this->base . '/app/webroot/';
        $this->set(compact('logado'));
    }

    public function envia_alerta_tarefa($id, $tipo) {
        $this->autoRender = false;
        $tarefa = $this->Tarefa->find('first', array('conditions' => array('Tarefa.id' => $id), 'recursive' => 1));
        if ($tipo == 'N') {
            $titulo = 'Nova Tarefa';
            $userColaborador = $this->Tarefa->User->find('first', array('conditions' => array(
                'User.colaborador_id' => $tarefa['Tarefa']['colaborador_id']), 'recursive' => -1));
            $emailEndereco = $userColaborador['User']['email'];
        } elseif ($tipo == 'A') {
            $titulo = 'Atualização de Tarefa';
            $emailEndereco = $tarefa['User']['email'];
        } elseif ($tipo == 'F') {
            $titulo = 'Tarefa Finalizada';
            $emailEndereco = $tarefa['User']['email'];
        }
        
        $tarefa['tipo'] = $tipo;
        $remetente = 'sistema@redeinclusao.org.br';
        $assunto = $titulo . ' - ' . $tarefa['Tarefa']['tarefa'];
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        $headers .= 'From: '. $remetente . "\r\n";
        $mensagem = implode('<br>', $tarefa['Tarefa']);
    

        if (mail($emailEndereco, $assunto, $mensagem, $headers)) {
            $this->Session->setFlash('E-mail enviado com sucesso!', 'default', array(
                'class' => 'alert alert-success'), 'email');
            return 1;
        } else {
            $this->Session->setFlash('Falha ao enviar e-mail!', 'default', array(
                'class' => 'alert alert-danger'), 'email');
            return 0;
        }
    }

    public function processDataTableRequest() {
        $config = $this->request->query('config');
        
        if (method_exists($this, $config)) {
            $this->setAction($config);
            return;
        }
        
        $this->DataTable->paginate($config);
    }

    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir . "/" . $object) == "dir")
                        rrmdir($dir . "/" . $object);
                    else
                        unlink($dir . "/" . $object);
                }
            }
            reset($objects);
            rmdir($dir);
        }
    }

    protected function converterData($data) {
        if (count(explode("/", $data)) > 1) {

            return implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        }
    }

    protected function upload($arquivo) {
        $diretorio = WWW_ROOT . 'upload/';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777);
        }
        $nomeArquivo = md5(md5_file($arquivo['tmp_name'])) . strstr($arquivo['name'], '.');
        if (move_uploaded_file($arquivo['tmp_name'], $diretorio . $nomeArquivo)) {
            return '/upload/' . $nomeArquivo;
        }
        return false;
    }

}

?>