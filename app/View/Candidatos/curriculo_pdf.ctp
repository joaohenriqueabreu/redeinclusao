<?php
  App::import('Vendor','tcpdf/tcpdf');

  class MYPDF extends TCPDF {

  	//Page header
  	public function Header() {
  		// Logo
  		$image_file = K_PATH_IMAGES.'logorede.png';
  		$this->Image($image_file, 150, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
  		// Set font
  	}

  	// Page footer
  	public function Footer() {
  		// Position at 15 mm from bottom
  		$this->SetY(-15);
  		// Set font
  		$this->SetFont('helvetica', 'B', 8);
  		// Page number
        $this->Cell(0, 20, $this->rodape, 0, true, 'C', 0, '', 0, false, 'T', 'M');
  	}
  }

  $rodape = "Este candidato é acompanhado pelo Inst. Ester Assumpção - www.ester.org.br - (31)3592-1011";
  $tcpdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false, $rodape);

  $tcpdf->SetAuthor("Rede Ester");
  $tcpdf->SetAutoPageBreak(true, 10);

  // set default header data
  $tcpdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

  // set header and footer fonts
  $tcpdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
  $tcpdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

  // set default monospaced font
  $tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

  //set margins
  $tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
  $tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
  $tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

  $tcpdf->SetFont('helvetica', '');

  $tcpdf->AddPage();

  $telefones = '';
  if(!empty($candidato['Candidato']['telefone'])){
      $telefones .= $candidato['Candidato']['telefone'].' ';
  }
  if(!empty($candidato['Candidato']['celular_1'])){
      $telefones .= $candidato['Candidato']['celular_1'].' ';
  }
  if(!empty($candidato['Candidato']['celular_2'])){
      $telefones .= $candidato['Candidato']['celular_2'].' ';
  }
  if(!empty($candidato['Candidato']['celular_3'])){
      $telefones .= $candidato['Candidato']['celular_3'].' ';
  }

  $nome = $candidato['Candidato']['nome'];
  $nacionalidade = $candidato['Candidato']['nacionalidade'];
  $estadoCivil = $candidato['EstadosCivil']['nome'];
  $idade = $this->Util->calc_idade($candidato['Candidato']['data_nascimento']);
  $logradouro = $candidato['Candidato']['logradouro'];
  $numero = $candidato['Candidato']['numero'];
  $complemento = $candidato['Candidato']['complemento'];
  $bairro = $candidato['Candidato']['bairro'];
  $cidade = $candidato['Candidato']['cidade'];
  $estado = $candidato['Candidato']['estado'];
  $email = $candidato['Candidato']['e_mail'];
  $area_interesse_trabalho = $candidato['Candidato']['area_interesse_trabalho'];
  $escolariedade = $candidato['Escolaridade']['nome'].' | '.$candidato['Candidato']['observacoes_escolaridade'];
  $pretensaoIncial = $this->Formatacao->moeda($candidato['PretensoesSalarial']['inicial']);
  $pretensaoFinal = $this->Formatacao->moeda($candidato['PretensoesSalarial']['final']);
  $disponibilidade_horario = $candidato['Candidato']['disponibilidade_horario'];
  $parecer = $candidato['Candidato']['parecer_entrevistador'];

  $experienciaHTML = '';
  if(!empty($candidato['ExperienciasProfissional'])):
    $experienciaHTML .= '<ul style="font-size:10pt; margin-top:1.0em; margin-bottom:1em; padding-left: 15pt;">';
    foreach($candidato['ExperienciasProfissional'] as $experiencia):
        $experienciaHTML .= '<li style="margin-top:1em;">';
        $experienciaHTML .= '<strong>';
        $experienciaHTML .= $this->Util->format_date($experiencia['admissao']).' - '.$this->Util->format_date($experiencia['demissao']).' – '.$experiencia['empresa'].'<br>';
        $experienciaHTML .= '</strong>';
        $experienciaHTML .= 'Cargo: '.$experiencia['cargo'].'<br>';
        $experienciaHTML .= 'Principais atividades: '.$experiencia['atividades_desenvolvidas'].'<br>';
        $experienciaHTML .= 'Motivo desligamento: '.$experiencia['motivo_desligamento'].'<br>';
        $experienciaHTML .= '</li>';
    endforeach;
    $experienciaHTML .= '</ul>';
  endif;

  $cusrosHTML = '';
  if(!empty($candidato['CursosAcademicosTecnico'])):
    $cusrosHTML .= '<li style="margin-top:1em;">Cursos';
    if (!empty($candidato['CursosAcademicosTecnico'])):
        $cusrosHTML .= '<ul style="font-size:10pt; margin-top:1.0em; margin-bottom:1em; padding-left: 15pt;">';
   		$i = 0;
        foreach ($candidato['CursosAcademicosTecnico'] as $cursosAcademicosTecnico):
            $cusrosHTML .= '<li style="margin-top:1em;">'.$cursosAcademicosTecnico['nome'].' - '.$tiposFormacoes[$cursosAcademicosTecnico['tipo']].'</li>';
        endforeach;
        $cusrosHTML .= '</ul>';
    endif;
    $cusrosHTML .= '</li>';
  endif;

  $idiomaHTML = '';
  if (!empty($candidato['Idioma'])):
    $idiomaHTML .= '<li style="margin-top:1em;">Idiomas';
    $idiomaHTML .= '<ul $idiomaHTML .=>';
    $i = 0;
    foreach ($candidato['Idioma'] as $idioma):
        $idiomaHTML .= '<li>'.$idioma['nome'].'</li>';
    endforeach;
    $idiomaHTML .=  '</ul>';
    $idiomaHTML .=  '</li>';
  endif;

  $deficienciaHTML = '';
  $deficienciaHTML .= '<ul style="font-size:10pt; margin-top:1.0em; margin-bottom:1em; padding-left: 15pt;">';
  $deficienciaHTML .= '<li>Condição de Cumprimento de cota: ';
  if($candidato['Candidato']['condicao_comprimento_cota'] == '0'){
    $deficienciaHTML .= 'Deficiência';
  }elseif($candidato['Candidato']['condicao_comprimento_cota'] == '1'){
    $deficienciaHTML .= 'Reabilitada';
  }
  $deficienciaHTML .= $candidato['Candidato']['comprimento_cota_caracteristicas'];
  $deficienciaHTML .= '</li>';
  if($candidato['Candidato']['possui_deficiencia_auditiva'] == 1):
    $deficienciaHTML .= '<li  style="margin-top:1em;">';
    $deficienciaHTML .= 'Auditiva: Sim - '.$candidato['Candidato']['descricao_deficiencia_auditiva'];
    $deficienciaHTML .= '</li>';
  endif;
  if($candidato['Candidato']['possui_deficiencia_fisica'] == 1):
    $deficienciaHTML .= '<li  style="margin-top:1em;">';
    $deficienciaHTML .= 'Fisica: Sim - '.$candidato['Candidato']['descricao_deficiencia_fisica'];
    $deficienciaHTML .= '</li>';
  endif;
  if($candidato['Candidato']['possui_deficiencia_intelectual'] == 1):
    $deficienciaHTML .= '<li  style="margin-top:1em;">';
    $deficienciaHTML .= 'Intelectual: Sim - '.$candidato['Candidato']['descricao_deficiencia_intelectual'];
    $deficienciaHTML .= '</li>';
  endif;
  if($candidato['Candidato']['possui_deficiencia_visual'] == 1):
    $deficienciaHTML .= '<li  style="margin-top:1em;">';
    $deficienciaHTML .= 'Visual: Sim - '.$candidato['Candidato']['descricao_deficiencia_visual'];
    $deficienciaHTML .= '</li>';
  endif;
  if($candidato['Candidato']['necessita_ajudas_tecnicas'] == 1):
    $deficienciaHTML .= '<li  style="margin-top:1em;">';
    $deficienciaHTML .= 'Necessita Ajudas Tecnicas: Sim - '.$candidato['Candidato']['quais_ajudas_tecnicas'];
    $deficienciaHTML .= '</li>';
  endif;
  $deficienciaHTML .= '</ul>';

  $htmlcontent = <<<EOD
                <p style="font-size:10pt; line-height: 1.2em; margin-top:1em; padding-bottom: 0.5em;">
                    <span style="font-size:18pt;">$nome</span><br><br>
                    $nacionalidade, $estadoCivil, $idade anos<br>
        			$logradouro, $numero $complemento<br>
        			$bairro – $cidade – $estado<br>
        			Telefones: $telefones / E-mail: $email
                </p>
                <h1 style="	font-size:10pt; color:#575F6D; margin-top:1em; padding-bottom: 0.5em;">
					OBJETIVO
				</h1>
				<p style="font-size:10pt; line-height: 1.3em; margin:0px;">
                    $area_interesse_trabalho
				</p>
                <h1 style="	font-size:10pt; color:#575F6D; margin-top:1em; padding-bottom: 0.5em;">
					FORMAÇÃO
				</h1>
				<ul style="font-size:10pt; margin-top:1.5em; margin-bottom:3em; padding-left: 15pt;">
					<li style="margin-top:1em;">
						Escolaridade: <b>$escolariedade</b>
					</li>
				</ul>
                <h1 style="font-size:10pt; color:#575F6D; margin-top:1em; padding-bottom: 0.5em;">
                    EXEPERIÊNCIA PROFISSIONAL
				</h1>
                $experienciaHTML
                <h1 style="	font-size:10pt; color:#575F6D; margin-top:1em; padding-bottom: 0.5em;">
					DEFICIÊNCIAS
				</h1>
				<ul style="font-size:10pt; margin-top:1.5em; margin-bottom:3em; padding-left: 15pt;">
                $deficienciaHTML
                </ul>
                <h1 style="font-size:10pt; color:#575F6D; margin-top:1em; padding-bottom: 0.5em;">
                    INFORMAÇÕES ADICIONAIS
                </h1>
				<ul style="font-size:10pt; margin-top:1.5em; margin-bottom:3em; padding-left: 15pt;">
					<li style="margin-top:1em;">
						Pretensão Salarial: $pretensaoIncial - $pretensaoFinal
					</li>
					<li style="margin-top:1em;">
						Disponibilidade Horário: $disponibilidade_horario
					</li>
					<li style="margin-top:1em;">
						Parecer do Entrevistador : $parecer
					</li>
                    $cusrosHTML
                    $idiomaHTML
				</ul>
EOD;

  //$tcpdf->writeHTML($htmlcontent, true, 0, true, true);
  $tcpdf->writeHTML($htmlcontent, true, 0, true, 0);
  $tcpdf->Output($nome.'.pdf', 'D');
?>