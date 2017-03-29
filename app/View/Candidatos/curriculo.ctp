<script>
print();
function Imprimir() {
  //Salvando as configurações do browser do usuário
  var h = factory.printing.header;
  var f = factory.printing.footer;
  var l = factory.printing.leftMargin
  var lf = factory.printing.leftMargin;
  var t = factory.printing.topMargin;
  var r = factory.printing.rightMargin;
  var b = factory.printing.bottomMargin;

  //Ocultando o botão de Impressão
  document.all("printbtn").style.visibility = 'hidden';

  /*Definindo as configurações de Cabeçalho e rodapé
  Código Impressão
  --------------------------------------------------------------------------------------
  &w Window title
  &u Page address (URL)
  &d Date in short format (as specified by Regional Settings in Control Panel)
  &D Date in long format (as specified by Regional Settings in Control Panel)
  &t Time in the format specified by Regional Settings in Control Panel
  &T Time in 24-hour format
  &p Current page number
  &P Total numeros de pages
  && Um único ampersand (&)(&)
  &b O texto imediatamente depois destes caráteres como centrados.
  &b&b O texto imediatamente depois do primeiro "&b" como centrado, e o
  texto que segue o segundo "&b" como direito-justificado. */
  factory.printing.header = "";
  factory.printing.footer = "";

  //Definindo a orientação do Papel
  factory.printing.portrait = true;

  //Definindo o tipo de papel
  //factory.printing.PaperSize = "A4";

  //Definindo as margens de impressão
  factory.printing.leftMargin = 10;
  factory.printing.topMargin = 15;
  factory.printing.rightMargin = 8,47;
  factory.printing.bottomMargin = 4,23;

  //Definindo a exibição da caixa de configurações da impressora
  factory.printing.Print(true);

  //Restaurando as informaçãoes de Cabeçalho e Rodapé do browser do usuário
  factory.printing.header = h;
  factory.printing.footer = f;
  factory.printing.leftMargin = lf;
  factory.printing.topMargin = t;
  factory.printing.rightMargin = r;
  factory.printing.bottomMargin = b;

  //esperando o Spooling
  //factory.printing.WaitForSpoolingComplete();
  alert("Impressão Ok!");

  //Exibindo novamente o botão de impressão
  document.all("printbtn").style.visibility = 'visible';
}
 //Imprimir();
</script>
<?php
    //pr($candidato);
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

?>
<html><!--  Esta é a tag principal do documento html. Não se pode ter duas tags html em um só arquivo -->
	<head><!-- A tag head trata os processos "indiretos" da página, como seu título, ligação com arquivos de folha de estilo etc -->
		<title>Currículo - <?=$candidato['Candidato']['nome'];?></title><!-- Esta tag define o conteúdo que irá aparecer no título da janela -->
		<link rel="stylesheet" href="<?=$this->base?>/css/curriculo.css" /><!-- Esta tag faz uma "ligação" da folha de estilo (CSS) com este documento -->
	</head><!-- Toda tag tem que ser fechada em ordem. Para fechar uma tag usamos uma barra no começo do seu nome <assim></assim> -->
	<body><!-- Esta tag contém todos os elementos visíveis de uma página, semelhante à tag html,head e title, só pode haver uma no documento -->
		<div id="paginaA4"><!-- A tag div (camada) é um tipo de tag muito utilizada em css, por dividir corretamente os dados em seções, cada div é uma seção diferente, e podem existir várias tags div em uma tag div. Enfim, é a tag mais usada para estilos CSS -->
			<div id="margem"><!-- O atributo id="valor" é uma das formas da folha de estilos identificar o elemento, pois cada id é único e não pode ser duplicado -->
				<div id="Foto">

				</div>
				<div id="Nome"><!-- Podemos colocar texto puro diretamente dentro da div, ou podemos usar a tag <p> para dividir em parágrafos -->
					<?=$candidato['Candidato']['nome'];?>
				</div>
				<p>
					<?=$candidato['Candidato']['nacionalidade'];?>, <?=$candidato['EstadosCivil']['nome'];?>, <?=$this->Util->calc_idade($candidato['Candidato']['data_nascimento'])?> anos</br>
					<?=$candidato['Candidato']['logradouro'];?>, <?=$candidato['Candidato']['numero'];?> <?=$candidato['Candidato']['complemento'];?></br>
					<?=$candidato['Candidato']['bairro'];?> – <?=$candidato['Candidato']['cidade'];?> – <?=$candidato['Candidato']['estado'];?></br>
					Telefones: <?=$telefones?> / E-mail: <?=$candidato['Candidato']['e_mail'];?></br>
				</p>

				<h1><!-- A tag h1 tem a mesma função dos Títulos de um arquivo de texto, cada h(valor) tem uma profundidade. Assim h1 é maior que h2 que é maior que h3 e assim por diante -->
					Objetivo
				</h1>
				<p>
                    <?=$candidato['Candidato']['area_interesse_trabalho'];?>
				</p>
				<h1>
					Formação
				</h1>
				<ul>
					<li>
						Escolaridade: <b><?php echo $candidato['Escolaridade']['nome'].' | '.$candidato['Candidato']['observacoes_escolaridade']; ?></b>
					</li>
					<li>
						Cursos
                        <?php if (!empty($candidato['CursosAcademicosTecnico'])): ?>
                        	<ul>
                            	<?php
                            		$i = 0;
                            		foreach ($candidato['CursosAcademicosTecnico'] as $cursosAcademicosTecnico): ?>
                            			<li><?php echo $cursosAcademicosTecnico['nome']; ?> - <?php echo $tiposFormacoes[$cursosAcademicosTecnico['tipo']]; ?></li>
                            	<?php
                                    endforeach;
                                ?>
                        	</ul>
                        <?php endif; ?>
					</li>
					<li>
						Idiomas
                      	<?php if (!empty($candidato['Idioma'])): ?>
                        <ul>
                      	<?php
                      		$i = 0;
                      		foreach ($candidato['Idioma'] as $idioma): ?>
                                <li><?php echo $idioma['nome']; ?></li>
                      	<?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
					</li>
					<li>
						Necessita de Qualificação: <b><?php echo h($candidato['Candidato']['necessita_qualificacao'] == 'S')?'Sim':'Não'; ?></b>
					</li>
					<li>
						Cursos de Interesses: <b><?php echo h($candidato['Candidato']['cursos_interesse']); ?></b>
					</li>
				</ul>
				<h1>
					Experiência Profissional
				</h1>
                <?php
                    if(!empty($candidato['ExperienciasProfissional'])):
                ?>
        				<ul><!-- Usamos a tag ul para criar uma lista, todos os elementos que estiverem dentro desta tag, serão exibidos como lista -->
                            <?php
                                foreach($candidato['ExperienciasProfissional'] as $experiencia):
                            ?>
                                <li><!-- Esta tag é utilizada para criar uma novo ponto na lista, sendo assim, cada vez que quisermos um novo ponto, temos que criar uma nova tag <li></li> -->
            						<strong><!-- Esta tag é utilizada para dar o valor de "negrito" às letras -->
            							<?=$this->Util->format_date($experiencia['admissao'])?> - <?=$this->Util->format_date($experiencia['demissao'])?> – <?=$experiencia['empresa']?>
            						</strong>
            					</li>
            					Cargo: <?=$experiencia['cargo']?>.</br>
            					Principais atividades: <?=$experiencia['atividades_desenvolvidas']?>.</br>
            					Motivo desligamento: <?=$experiencia['motivo_desligamento']?>.</br>
                            <?php
                                endforeach;
                            ?>
        				</ul>
                <?php
                    endif;
                ?>
				<h1>
					Deficiências
				</h1>
				<ul>
					<li>
						Condição de Comprimento de cota:
                        <?php
                            if($candidato['Candidato']['condicao_comprimento_cota'] == 'D'){
                                echo 'Deficiência';
                            }elseif($candidato['Candidato']['condicao_comprimento_cota'] == 'R'){
                                echo 'Reabilitada';
                            }
                            echo $candidato['Candidato']['comprimento_cota_caracteristicas'];
                        ?>
					</li>
					<li>
						Auditiva: <?php echo h($candidato['Candidato']['possui_deficiencia_auditiva'] == 'S')?'Sim - '.$candidato['Candidato']['descricao_deficiencia_auditiva']:'Não'; ?>
					</li>
					<li>
						Fisica: <?php echo h($candidato['Candidato']['possui_deficiencia_fisica'] == 'S')?'Sim - '.$candidato['Candidato']['descricao_deficiencia_fisica']:'Não'; ?>
					</li>
					<li>
						Intelectual: <?php echo h($candidato['Candidato']['possui_deficiencia_intelectual'] == 'S')?'Sim - '.$candidato['Candidato']['descricao_deficiencia_intelectual']:'Não'; ?>
					</li>
					<li>
						Visual: <?php echo h($candidato['Candidato']['possui_deficiencia_visual'] == 'S')?'Sim - '.$candidato['Candidato']['descricao_deficiencia_visual']:'Não'; ?>
					</li>
					<li>
						Necessita Ajudas Tecnicas: <?php echo h($candidato['Candidato']['necessita_ajudas_tecnicas'] == 'S')?'Sim - '.$candidato['Candidato']['quais_ajudas_tecnicas']:'Não'; ?>
					</li>
					<li>
						Reabilitação INSS: <?php echo h($candidato['Candidato']['reabilitada_inss'] == 'S')?'Sim - '.$candidato['Candidato']['descricao_reabilitacao']:'Não'; ?>
					</li>
				</ul>
				<h1>Informações adicionais</h1>
				<ul>
					<li>
						Pretensão Salarial: <?php echo $this->Formatacao->moeda($candidato['PretensoesSalarial']['inicial']).' - '.$this->Formatacao->moeda($candidato['PretensoesSalarial']['final']); ?>
					</li>
					<li>
						Disponibilidade Horário: <?php echo h($candidato['Candidato']['disponibilidade_horario']); ?>
					</li>
					<li>
						Parecer do Entrevistador : <?php echo h($candidato['Candidato']['parecer_entrevistador']); ?>
					</li>
				</ul>
			</div>
		</div>
	</body>
</html>