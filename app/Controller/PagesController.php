<?php

App::uses('AppController', 'Controller');

class PagesController extends AppController {

    var $uses = array('Candidato', 'ProcessosSeletivo', 'Cliente', 'User');

    public function beforeFilter() {
        parent::beforeFilter();
        if (!isset($_GET['user'])) {
            $_GET['user'] = $this->Auth->user('id');
        }
    }

    public function index() {
        $this->Candidato->recursive = -1;
        $counts = $this->Candidato->find('all', array(
            'fields' => array(
                'date_format(Candidato.created, "%m/%Y") as periodo',
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota'),
            'conditions' => array('Candidato.created >= date_sub(curdate(), interval 12 month)'),
            'group' => 'date_format(Candidato.created, "%m/%Y")',
            'order' => 'date_format(Candidato.created, "%Y/%m") desc'
                )
        );
        $somatoriosCadastrado = $this->Candidato->find('all', array(
            'fields' => array(
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota')
                )
        );
        $processoSeletivoContratado = $this->ProcessosSeletivo->find('all', array('fields' => array('ProcessosSeletivo.candidato_id'), 'conditions' => array('ProcessosSeletivo.resultado' => 'C')));
        $pessoasContratadas = array();
        foreach ($processoSeletivoContratado as $pessoa) {
            $pessoasContratadas[$pessoa['ProcessosSeletivo']['candidato_id']] = $pessoa['ProcessosSeletivo']['candidato_id'];
        }
        $somatoriosProcessoSeletivo = $this->Candidato->find('all', array(
            'fields' => array(
                'count(*) as cadastros',
                'sum(Candidato.possui_deficiencia_multipla) as possui_deficiencia_multipla',
                'sum(Candidato.possui_deficiencia_auditiva) as possui_deficiencia_auditiva',
                'sum(Candidato.possui_deficiencia_fisica) as possui_deficiencia_fisica',
                'sum(Candidato.possui_deficiencia_intelectual) as possui_deficiencia_intelectual',
                'sum(Candidato.possui_deficiencia_visual) as possui_deficiencia_visual',
                'sum(Candidato.condicao_comprimento_cota) as condicao_comprimento_cota'),
            'conditions' => array('Candidato.id' => $pessoasContratadas)
                )
        );
        $usuarios = $this->User->find('list', array('fields' => 'nome', 'order' => 'nome'));
        $this->set(compact('counts', 'somatoriosCadastrado', 'somatoriosProcessoSeletivo', 'usuarios'));
    }

    public function georreferenciamento() {
        $this->layout = 'georeferenciamento';
        $geocode = array();
        $clientes = $this->Cliente->find('all', array('conditions' => array('Cliente.ativo' => 'S', 'Cliente.status' => 'E'), 'recursive' => -1));
        foreach ($clientes as $cliente) {
            if (!empty($cliente['Cliente']['geocode'])):
                $code = explode(',', $cliente['Cliente']['geocode']);
                if (isset($code[0]) and isset($code[1])) {
                    $geocode[] = array(
                        'Id' => $cliente['Cliente']['id'],
                        'Tipo' => 0,
                        'Latitude' => $code[0],
                        'Longitude' => $code[1],
                        'Descricao' => '<div style = "padding: 10px; display: table"><div style = "float: right; width: 280px"><div><b>' . $cliente['Cliente']['razao_social'] . ' - ' . $cliente['Cliente']['cnpj'] . '</b></div><div>Telefone(s): ' . $cliente['Cliente']['telefone'] . ' ' . $cliente['Cliente']['telefone_2'] . '</div><div><a href="' . $this->base . '/Clientes/view/' . $cliente['Cliente']['id'] . '/' . Inflector::slug($cliente['Cliente']['razao_social'], '-') . '" target = "_blank">Mais Informações!</a></div></div></div>',
                    );
                }
            endif;
        }
        $candidatos = $this->Candidato->find('all', array('fields' => array('id', 'nome', 'data_nascimento', 'geocode', 'logradouro', 'numero', 'bairro', 'telefone', 'celular_1', 'possui_deficiencia_auditiva', 'possui_deficiencia_fisica', 'possui_deficiencia_intelectual', 'possui_deficiencia_visual', 'necessita_ajudas_tecnicas'), 'conditions' => array('geocode is not null'), 'order' => 'nome', 'recursive' => -1));
        foreach ($candidatos as $candidato):
            if (!empty($candidato['Candidato']['geocode'])):

                $deficienciaHTML = '<b>Deficiências</b>: ';
                if ($candidato['Candidato']['possui_deficiencia_auditiva'] == 1):
                    $deficienciaHTML .= 'Auditiva: Sim';
                    $deficienciaHTML .= ' - ';
                endif;
                if ($candidato['Candidato']['possui_deficiencia_fisica'] == 1):
                    $deficienciaHTML .= 'Fisica: Sim';
                    $deficienciaHTML .= ' - ';
                endif;
                if ($candidato['Candidato']['possui_deficiencia_intelectual'] == 1):
                    $deficienciaHTML .= 'Intelectual: Sim';
                    $deficienciaHTML .= ' - ';
                endif;
                if ($candidato['Candidato']['possui_deficiencia_visual'] == 1):
                    $deficienciaHTML .= 'Visual: Sim';
                    $deficienciaHTML .= ' - ';
                endif;
                if ($candidato['Candidato']['necessita_ajudas_tecnicas'] == 1):
                    $deficienciaHTML .= 'Necessita Ajudas Tecnicas: Sim';
                    $deficienciaHTML .= ' - ';
                endif;

                $code = explode(',', $candidato['Candidato']['geocode']);
                if (isset($code[0]) and isset($code[1])) {
                    $contratado = $this->Candidato->ProcessosSeletivo->find('first', array('conditions' => array('ProcessosSeletivo.candidato_id' => $candidato['Candidato']['id'], 'ProcessosSeletivo.resultado' => 'C'), 'recursive' => -1));
                    if (!empty($contratado)) {
                        $tipo = 2;
                    } else {
                        $tipo = 1;
                    }
                    $geocode[] = array(
                        'Id' => $candidato['Candidato']['id'],
                        'Tipo' => $tipo,
                        'Latitude' => $code[0],
                        'Longitude' => $code[1],
                        'Icon' => 'iconCandidatoCadastrado',
                        'Descricao' => '<div style = "padding: 10px; display: table"><div style = "float: right; width: 280px"><div><b>' . $candidato['Candidato']['nome'] . ' - ' . $candidato['Candidato']['data_nascimento'] . '</b></div><div><b>' . $candidato['Candidato']['logradouro'] . ' ' . $candidato['Candidato']['numero'] . '</b></div><div>' . $candidato['Candidato']['bairro'] . '</div><div>' . $candidato['Candidato']['telefone'] . ' ' . $candidato['Candidato']['celular_1'] . '</div><div>' . $deficienciaHTML . '</div><div><a href="' . $this->base . '/Candidatos/view/' . $candidato['Candidato']['id'] . '/' . Inflector::slug($candidato['Candidato']['nome'], '-') . '" target = "_blank">Mais Informações!</a></div></div></div>',
                    );
                }
            endif;
        endforeach;
        $this->set(compact('geocode'));
    }

}

?>