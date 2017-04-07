<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{
    var $components = array('Email');

    public function beforeFilter()
    {
        parent::beforeFilter();
//        $this->Auth->allow('login', 'logout', 'esqueci_minha_senha', 'envia_senha');
        /// ------------- Baanko challenge updates -------------
        /// Liberar o cadastro de usuário
        $this->Auth->allow('login', 'add', 'logout', 'esqueci_minha_senha', 'envia_senha');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido!'), 'default', array('class' => 'alert alert-danger'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add()
    {
        /// ------------- Baanko challenge updates -------------
        /// Evitar erro interno ao utilizar essa action
        if ($this->request->is('post')) {

            $this->User->create();

            /// ------------- Baanko challenge updates -------------
            /// TODO: Somente para o MVP!!! Id de colaborador e grupo hard-coded
            $this->request->data["User"]["colaborador_id"] = 18;
            $this->request->data["User"]["group_id"] = 1;

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso!'), 'default', array('class' => 'alert alert-success'));
//                $this->redirect(array('action' => 'index'));

                /// ------------- Baanko challenge updates -------------
                /// Fazer login do usuário
                $this->Session->write('CID', 0);
                $this->redirect(array('action' => 'login'));

            } else {
                $this->Session->setFlash(__('Usuário não salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->layout = 'user';
        }
        /// ------------- Baanko challenge updates -------------
        /// Valores default para grupo e colaborador
//        $groups = $this->User->Group->find('list');
//        $colaboradores = $this->User->Colaborador->find('list', array('order' => array('nome')));

        $groups = array('Adminstradores');
        $colaboradores = array('Romário');

        $this->set(compact('groups', 'colaboradores'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido.'), 'default', array('class' => 'alert alert-danger'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->data['User']['new_password'])) {
                $this->request->data['User']['password'] = $this->data['User']['new_password'];
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Usuário salvo com sucesso!'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Usuário não salvo. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
        }

        $groups = $this->User->Group->find('list');
        $colaboradores = $this->User->Colaborador->find('list', array('order' => array('nome')));
        $this->set(compact('groups', 'colaboradores'));
    }

    public function configuracao()
    {

        if ($this->request->is('post') || $this->request->is('put')) {
            if (!empty($this->data['User']['new_password'])) {
                $this->request->data['User']['password'] = $this->data['User']['new_password'];
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Dados atualizados com sucesso!'), 'default', array('class' => 'alert alert-success'));
                $this->redirect(array('action' => 'configuracao'));
            } else {
                $this->Session->setFlash(__('Dados não atualizados. Por favor, tente novamente.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $this->data = $this->User->read(null, $_SESSION['Auth']['User']['id']);
        }
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuário inválido'), 'default', array('class' => 'alert alert-danger'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuário removido com sucesso!'), 'default', array('class' => 'alert alert-success'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuário não removido.'), 'default', array('class' => 'alert alert-danger'));
        $this->redirect(array('action' => 'index'));
    }

// ---------------- Sobrescrevendo a função para utilizar a UsersEmpresa
// ----------------
//	public function login() {
//	    $this->layout = 'user';
//		if ($this->request->is('post')) {
//			if ($this->Auth->login()) {
//				if ($this->Auth->user('group_id') == 10) {
//					$this->redirect(['controller' => 'Candidatos', 'action' => 'index']);
//				} else {
//					$this->redirect($this->Auth->redirect());
//				}
//			} else {
//				$this->Session->setFlash('Usuário ou/e senha incorreto(s). Por favor, tente novamente.', 'default', array('class' => 'alert alert-danger'));
//			}
//		}
//	}

/// ------------- Baanko challenge updates -------------
    public function login()
    {
        $this->layout = 'user';
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {

                /// ------------- Baanko challenge updates -------------
                /// Procura pela empresa
                $clienteId = $this->Auth->user('empresa_id');
                if (isset($clienteId)) {
                    $this->Session->write('CID', $clienteId);
                    $this->redirect(array('controller' => 'clientes', 'action' => 'view', $clienteId));
                } else {
//                    $this->Session->setFlash('Usuário não autorizado. Por favor entre em contato com o Instituto Ester.', 'default', array('class' => 'alert alert-danger'));
                    /// ------------- Baanko challenge updates -------------
                    /// Caso não encontre a empresa redireciona para a tela de cadastro de empresa
                    /// TODO: no cadastro da empresa é preciso vincular o id dela ao usuário logado
                    $this->Session->write('CID', 0);
                    $this->redirect(array('controller' => 'clientes', 'action' => 'add'));
                }


//			    if ($this->Auth->user('group_id') == 10) {
//					$this->redirect(['controller' => 'Candidatos', 'action' => 'index']);
//				} else {
//					$this->redirect($this->Auth->redirect());
//				}
            } else {
                $this->Session->setFlash('Usuário ou/e senha incorreto(s). Por favor, tente novamente.', 'default', array('class' => 'alert alert-danger'));
            }
        }
    }

    public function logout()
    {
        $this->Session->setFlash('Você saiu do sistema!', 'default', array('class' => 'alert alert-success'));
        $this->redirect($this->Auth->logout());
    }

    public function verifica_email($id = null)
    {
        $this->autoRender = false;
        $email = $this->data['User']['email'];
        if (!empty($email)) {
            if (!empty($id)) {
                $emailUser = $this->User->find('first', array('fields' => 'User.email', 'conditions' => array('User.email' => $email, 'User.id <>' => $id)));
            } else {
                $emailUser = $this->User->find('first', array('fields' => 'User.email', 'conditions' => array('User.email' => $email)));
            }
            if (!empty($emailUser)) {
                echo json_encode(false);
            } else {
                echo json_encode(true);
            }
        }
    }

    public function esqueci_minha_senha()
    {
        $this->layout = 'ajax';
    }


    public function envia_senha()
    {
        $this->autoRender = false;
        if (!empty($this->data)) {
            $email = $this->data['User']['email'];
            if (!empty($email)) {
                $dadosUser = $this->User->find('first', array('conditions' => array('email' => $email)));
                if ($dadosUser) {
                    $novaSenha = $this->generatePass();
                    $dadosEmail = array(
                        'username' => $dadosUser['User']['username'],
                        'password' => $novaSenha,
                    );
                    $dados['User'] = array(
                        'id' => $dadosUser['User']['id'],
                        'password' => $novaSenha
                    );

                    if ($this->User->save($dados)) {
                        $email = new CakeEmail();
                        $email->template('contato', 'esqueci_minha_senha');
                        $email->subject('Lembrete de Senha');
                        $email->emailFormat('html');
                        $email->to($this->data['User']['email']);
                        $email->from('analise@allcomp.inf.br');
                        $email->viewVars(array(
                            'dadosEmail' => $dadosEmail,
                        ));
                        if ($email->send()) {
                            return 1;
                        } else {
                            return 0;
                        }
                    }
                } else {
                    return 2;
                }
            } else {
                return 3;
            }
        }
    }

    function generatePass($size = 6)
    {
        $name = "string";
        $aux = $name . time();
        $pass = substr(md5($aux), 0, $size);
        return $pass;
    }
}