<?php

/* /app/views/helpers/link.php (using other helpers) */

class UtilHelper extends AppHelper {

    public function mostraNomeUsuario($id) {
        $user = Classregistry::init('User')->find('first', array('fields' => 'User.nome', 'conditions' => array('User.id' => $id), 'recursive' => -1));
        return $user['User']['nome'];
    }

    public function mostraNomeCandidato($id) {
        $candidato = Classregistry::init('Candidato')->find('first', array('fields' => 'Candidato.nome', 'conditions' => array('Candidato.id' => $id), 'recursive' => -1));
        return $candidato['Candidato']['nome'];
    }

    public function mostraUserColaborador($id) {
        $userColaborador = Classregistry::init('User')->find('first', array('fields' => 'User.colaborador_id', 'conditions' => array('User.id' => $id), 'recursive' => -1));
        return $userColaborador['User']['colaborador_id'];
    }

    public function mostraNomeColaborador($id) {
        $colaborador = Classregistry::init('Colaborador')->find('first', array('fields' => 'Colaborador.nome', 'conditions' => array('Colaborador.id' => $id), 'recursive' => -1));
        return $colaborador['Colaborador']['nome'];
    }

    public function mostraStatusProjetos($id) {
        $status = array('N' => 'Novo', 'E' => 'Em Andamento', 'F' => 'Finalizado', 'C' => 'Cancelado');
        return $status[$id];
    }

    public function mostraNomeCliente($id) {
        $cliente = Classregistry::init('Cliente')->find('first', array('fields' => 'Cliente.razao_social', 'conditions' => array('Cliente.id' => $id), 'recursive' => -1));
        return $cliente['Cliente']['razao_social'];
    }

    public function mostraStatusCliente($id) {
        $status = array('R' => 'Receptivo', 'P' => 'Prospect', 'E' => 'Efetivado');
        return $status[$id];
    }

    public function mostraTiposPerguntasLevantamento($id) {
        $tipo = Classregistry::init('TiposPerguntasLevantamento')->find('first', array('conditions' => array('id' => $id), 'recursive' => -1));
        return $tipo;
    }

    public function mostraGrupoEtapa($id) {
        $grupo = Classregistry::init('GruposEtapa')->find('first', array('fields' => 'nome', 'conditions' => array('id' => $id), 'recursive' => -1));
        return $grupo['GruposEtapa']['nome'];
    }

    public function mostraPacote($id) {
        $pacote = Classregistry::init('Pacote')->find('first', array('fields' => 'titulo', 'conditions' => array('id' => $id), 'recursive' => -1));
        return $pacote['Pacote']['titulo'];
    }

    public function mostraCargo($id) {
        $cargo = Classregistry::init('Cargo')->find('first', array('fields' => array('nome'), 'conditions' => array('id' => $id), 'recursive' => -1));
        return $cargo['Cargo']['nome'];
    }

    public function mostraVaga($id) {
        $vaga = Classregistry::init('Vaga')->find('first', array('fields' => array('Vaga.cargo', 'Cliente.razao_social'), 'conditions' => array('Vaga.id' => $id), 'recursive' => 0));
        return $vaga;
    }

    public function mostraPretensaoSalarial($id) {
        $pretensao = Classregistry::init('PretensoesSalarial')->find('first', array('conditions' => array('id' => $id), 'recursive' => -1));
        return $pretensao;
    }

    public function unidadeMedida($id) {
        $unidadeMedida = Classregistry::init('UnidadesMedida')->find('first', array('conditions' => array('id' => $id), 'recursive' => -1));
        return $unidadeMedida;
    }

    public function mostraProjetosTiposProcesso($id) {
        $tipo = Classregistry::init('ProjetosTiposProcesso')->find('first', array('fields' => array('titulo', 'tipo'), 'conditions' => array('id' => $id), 'recursive' => -1));
        return $tipo;
    }

    public function mostraProjetosTiposProcessosAtividade($id) {
        $tipo = Classregistry::init('ProjetosTiposProcessosAtividade')->find('first', array('fields' => array('titulo'), 'conditions' => array('id' => $id), 'recursive' => -1));
        return $tipo['ProjetosTiposProcessosAtividade']['titulo'];
    }

    public function mostraAreaIndicadores($id) {
        $area = Classregistry::init('IndicadoresArea')->find('first', array('fields' => 'nome', 'conditions' => array('id' => $id), 'recursive' => -1));
        return $area['IndicadoresArea']['nome'];
    }

    public function mostraSituacaoProposta($id) {
        $situacao = array('A' => 'Em Aberto', 'N' => 'Em  Negociação', 'C' => 'Concretizada', 'R' => 'Recusada');
        return $situacao[$id];
    }

    public function format_date($str) {
        return(preg_replace("/([0-9]{4})-([0-9]{2})-([0-9]{2})/", "$3/$2/$1", $str));
    }

    public function format_date2($str) {
        return(preg_replace("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", "$3-$2-$1", $str));
    }

    public function format_date_gantt($str) {
        return(preg_replace("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", "$1-$2-$3", $str));
    }

    public function tipoCliente($status = null, $plural = null) {
        $nomes = array('R' => 'Proposta', 'E' => 'Efetivada');
        if (empty($status)) {
            return $nomes;
        } else {
            if (!empty($plural)) {
                return $nomes[$status] . 's';
            }
            return $nomes[$status];
        }
    }

    public function tiposValores($id = null) {
        $tipos = array('I' => 'Inteiro', 'F' => 'Fracionado');
        if (empty($id)) {
            return $tipos;
        } else {
            return $tipos[$id];
        }
    }

    public function classeCliente($id = null) {
        $classes = array('C' => 'Cliente', 'P' => 'Parceria');
        if (empty($id)) {
            return $classes;
        } else {
            return $classes[$id];
        }
    }

    public function tipoEmprego($id = null) {
        $tipos = array('P' => 'Aprendizagem', 'A' => 'Apoiado', 'T' => 'Tradicional');
        if (empty($id)) {
            return $tipos;
        } else {
            return $tipos[$id];
        }
    }

    public function categoriaParceiro($id = null) {
        $categorias = array('Co' => 'Consultor', 'In' => 'Instrutor', 'Or' => 'Organização', 'Pr' => 'Professor', 'Vo' => 'Voluntário', 'Fo' => 'Fornecedor');
        if (empty($id)) {
            return $categorias;
        } else {
            return $categorias[$id];
        }
    }

    public function countProjetos($status = null) {
        $total = Classregistry::init('Projeto')->find('count', array('conditions' => array('Projeto.status' => array('A', 'E', 'N'))));
        return $total;
    }

    /**
     * Método para contar clientes
     * 
     * @param string $status E=Efetivado|R=Receptivo|P=Prospect|I=Inativo
     * @param string $tipo S=Escolas|E=Empresas
     * @param string $ativo S=Ativo|N=Inativo
     * @return type
     */
    public function countClientes($status, $tipo, $ativo = null) {
        $condicoes = [];
        $condicoes[] = ['Cliente.tipo' => $tipo];
        $condicoes[] = ['Cliente.status' => $status];
        $condicoes[] = (!empty($ativo)) ? ['Cliente.ativo' => $ativo] : '';
        $total = Classregistry::init('Cliente')->find('count', array(
            'conditions' => $condicoes));
        return $total;
    }

    public function countCandidatos($ano = null) {
        $conditions = array();
        if (!empty($ano)) {
            $conditions['date_format(Candidato.created, "%Y")'] = $ano;
        }
        $total = Classregistry::init('Candidato')->find('count', array('conditions' => $conditions));
        return $total;
    }

    public function countVagas($status = null, $ano = null) {
        $conditions = array();
        if (!empty($status)) {
            $conditions['Vaga.status'] = $status;
        }
        if (!empty($ano)) {
            $conditions['date_format(Vaga.created, "%Y")'] = $ano;
        }
        $total = Classregistry::init('Vaga')->find('count', array('conditions' => $conditions));
        return $total;
    }

    public function countAtasCliente($ano = null) {
        $conditions = array();
        if (!empty($ano)) {
            $conditions['date_format(Ata.created, "%Y")'] = $ano;
        }
        $total = Classregistry::init('Ata')->find('count', array('conditions' => $conditions));
        return $total;
    }

    public function countAtasCandidatos($ano = null) {
        $conditions = array();
        if (!empty($ano)) {
            $conditions['date_format(AtasCandidato.created, "%Y")'] = $ano;
        }
        $total = Classregistry::init('AtasCandidato')->find('count', array('conditions' => $conditions));
        return $total;
    }

    public function countContratos($status = null, $ano = null) {
        $conditions = array();
        if (!empty($ano)) {
            if ($status == 'A') {
                $conditions['date_format(Contrato.inicio_vigencia, "%Y")'] = $ano;
            } else {
                $conditions['date_format(Contrato.data_troca_status, "%Y")'] = $ano;
            }
        }
        if (!empty($status)) {
            if ($status <> 'A') {
                $conditions['Contrato.status'] = $status;
            }
        }
        $total = Classregistry::init('Contrato')->find('count', array('conditions' => $conditions));
        return $total;
    }

    public function vagasParcial($ano = null) {
        $conditions = array('Vaga.status' => 'A');
        if (!empty($ano)) {
            $conditions['date_format(Vaga.created, "%Y")'] = $ano;
        }
        $vagas = Classregistry::init('Vaga')->find('all', array('fields' => array('Vaga.id', 'Vaga.numero_vagas'), 'conditions' => $conditions));
        $vagasParcial = 0;
        foreach ($vagas as $vaga) {
            $vagasPreenchidas = 0;
            foreach ($vaga['ProcessosSeletivo'] as $processo) {
                if ($processo['resultado'] == 'C') {
                    $vagasPreenchidas += 1;
                }
            }
            if ($vaga['Vaga']['numero_vagas'] > $vagasPreenchidas) {
                $vagasParcial += 1;
            }
        }
        return $vagasParcial;
    }

    public function calc_idade($data_nasc) {
        $data_nasc = explode("/", $data_nasc);
        $data = date("d/m/Y");
        $data = explode("/", $data);
        $anos = $data[2] - $data_nasc[2];
        if ($data_nasc[1] > $data[1]) {
            return $anos - 1;
        }
        if ($data_nasc[1] == $data[1]) {
            if ($data_nasc[0] <= $data[0]) {
                return $anos;
                break;
            } else {
                return $anos - 1;
                break;
            }
        }
        if ($data_nasc[1] < $data[1]) {
            return $anos;
        }
    }

    public function statusAtivo($value = null) {
        $status = array('S' => 'Sim', 'N' => 'Não');
        if ($value) {
            if (isset($status[$value])) {
                return $status[$value];
            } else {
                return '';
            }
        } else {
            return $status;
        }
    }

    public function indicadorRelacaoMeta($value = null) {
        $opcoes = array('>' => 'Maior', '<' => 'Menor');
        if ($value) {
            if (isset($opcoes[$value])) {
                return $opcoes[$value];
            } else {
                return '';
            }
        } else {
            return $opcoes;
        }
    }

    public function statusAtividades($value = null) {
        $status = array('P' => 'Planejada', 'N' => 'Nova', 'E' => 'Em Andamento', 
            'F' => 'Finalizada', 'C' => 'Cancelada');
        if ($value) {
            if (isset($status[$value])) {
                return $status[$value];
            } else {
                return '';
            }
        } else {
            return $status;
        }
    }

    public function statusVaga($value = null) {
        $status = array('A' => 'Ativa', 'C' => 'Cancelada', 'P' => 'Preenchida');
        if ($value) {
            if (isset($status[$value])) {
                return $status[$value];
            } else {
                return '';
            }
        } else {
            return $status;
        }
    }

    public function servicos($value = null, $tipo = 'E') {
        if ($tipo == 'E') {
            $servicos = array(1 => 'Aprendizagem', 2 => 'Assessoria', 
                3 => 'Palestras', 4 => 'Emprego Apoiado', 5 => 'Curso');
        } else {
            $servicos = array(1 => 'Palestra', 2 => 'Consultoria colaborativa', 
                3 => 'Monólogo', 4 => 'Estudo de casos', 5 => 'Curso');
        }
        if ($value) {
            if (isset($servicos[$value])) {
                return $servicos[$value];
            } else {
                return '';
            }
        } else {
            return $servicos;
        }
    }

    public function statusContrato($value = null) {
        $status = array('A' => 'Ativo', 'C' => 'Cancelado', 'F' => 'Finalizado');
        if ($value) {
            if (isset($status[$value])) {
                return $status[$value];
            } else {
                return '';
            }
        } else {
            return $status;
        }
    }

    public function sexo($value = null) {
        $sexo = array('A' => 'Ambos', 'M' => 'Masculino', 'F' => 'Feminino');
        if ($value) {
            if (isset($sexo[$value])) {
                return $sexo[$value];
            } else {
                return '';
            }
        } else {
            return $sexo;
        }
    }

    public function tiposProcessosIMGI($value = null) {
        $tipos = array('ID' => 'Identificação', 'M' => 'Meta', 'G' => 'Gerenciamento', 'I' => 'Impacto', 'O' => 'Outros');
        if ($value) {
            if (isset($tipos[$value])) {
                return $tipos[$value];
            } else {
                return '';
            }
        } else {
            return $tipos;
        }
    }

    public function tiposAtas($value = null) {
        $tipos = array('T' => 'Telefone', 'E' => 'E-mail', 'R' => 'Reunião', 'O' => 'Outros', 'P' => 'Plano de Trabalho');
        if ($value) {
            if (isset($tipos[$value])) {
                return $tipos[$value];
            } else {
                return '';
            }
        } else {
            return $tipos;
        }
    }

    public function resultadoProcesso($value = null) {
        $resultadoProcesso = array('NC' => 'Não Concluído', 'NCA' => 'Não Concluiu Avaliação', 'D' => 'Desistiu', 'R' => 'Reprovada', 'C' => 'Contratada');
        if ($value) {
            if (isset($resultadoProcesso[$value])) {
                return $resultadoProcesso[$value];
            } else {
                return '';
            }
        } else {
            return $resultadoProcesso;
        }
    }

    public function resultadoEtapasProcesso($value = null) {
        $resultadoEtapasProcesso = array('NR' => 'Não Realizado', 'A' => 'Aprovada', 'NC' => 'Não Compareceu', 'R' => 'Reprovada');
        if ($value) {
            if (isset($resultadoEtapasProcesso[$value])) {
                return $resultadoEtapasProcesso[$value];
            } else {
                return '';
            }
        } else {
            return $resultadoEtapasProcesso;
        }
    }

    public function geraRGB($id = null) {
        $cores = array('#a7ee70', '#36abee', '#e33fc7', '#66cc00', '#58dccd');
        return $cores[$id];
    }

    public function coresAgenda($id) {
        $cores = array(1 => '#9fc6e7', 2 => '#5484ed', 3 => '#a4bdfc', 4 => '#46d6db', 5 => '#7ae7bf', 6 => '#51b749', 7 => '#fbd75b', 8 => '#ffb878', 9 => '#ff887c', 10 => '#dc2127', 11 => '#dbadff', 12 => '#e1e1e1');
        if (isset($cores[$id])) {
            return $cores[$id];
        } else {
            return '#9fc6e7';
        }
    }

    public function coresStatusAtividades($value = null) {
        $cores = array('P' => '#9fc6e7', 'N' => '#5484ed', 'E' => '#fbd75b', 
            'F' => '#51b749', 'C' => '#dc2127');
        if ($value) {
            if (isset($cores[$value])) {
                return $cores[$value];
            } else {
                return '';
            }
        } else {
            return $cores;
        }
    }

    public function mesesAbr($mes = null) {
        $mes = (int) $mes;
        if ($mes < 10) {
            $mes = '0' . $mes;
        }
        $nomes = array('01' => 'Jan', '02' => 'Fev', '03' => 'Mar', '04' => 'Abr', '05' => 'Mai', '06' => 'Jun', '07' => 'Jul', '08' => 'Ago', '09' => 'Set', '10' => 'Out', '11' => 'Nov', '12' => 'Dez');
        if (empty($mes)) {
            return $nomes;
        } else {
            if (isset($nomes[$mes])) {
                return $nomes[$mes];
            } else {
                return '';
            }
        }
    }

    public function gera_geocode($address) {
        $prepAddr = str_replace(' ', '+', $address);
        $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
        if ($geocode == false) {
            return '';
        } else {
            $output = json_decode($geocode);
            $lat = $output->results[0]->geometry->location->lat;
            $long = $output->results[0]->geometry->location->lng;
            return $lat . ', ' . $long;
        }
    }

}

?>