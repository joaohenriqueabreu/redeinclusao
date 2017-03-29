<?php
/**
 * Conexão Mysql
 */
$conn = mysql_connect('localhost', 'root', 'polkmn82');
$db   = mysql_select_db('pokerMidia');

$file = $_FILES['Filedata'];

$nomedoarquivo =  utf8_decode($file['name']);

$path     = $file['tmp_name'];

$pasta = '../files/imagem/arquivo/'.$_POST['galeria_id'];

if (!is_dir($pasta)){
	mkdir($pasta);
}

move_uploaded_file($path, $pasta."/".$nomedoarquivo);

// Vamos usar a biblioteca WideImage para o redimensionamento das imagens
require("WideImage/WideImage.php");

// Carrega a imagem enviada
$original = WideImage::load($pasta."/".$nomedoarquivo);

// Redimensiona a imagem original para 1024x768 caso ela seja maior que isto e salva
$original->resize(760, 415, 'inside', 'down')->saveToFile($pasta."/".$nomedoarquivo, null, 90);

$thumb = $pasta."/mini_".$nomedoarquivo;

$original->resize(150, 110, 'inside', 'down')->saveToFile($thumb, null, 90); // Redimensiona e salva

$query = "INSERT INTO imagens(galeria_id, arquivo, dir) VALUES ('$_POST[galeria_id]', '$nomedoarquivo', '$_POST[galeria_id]')";
mysql_query($query);

echo mysql_insert_id(); // Retorna o id da foto

?>
