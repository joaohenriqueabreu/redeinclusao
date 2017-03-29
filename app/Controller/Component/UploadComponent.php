<?php
/**

* Upload class file.

*

* @Autor Tulio Faria

* @Contribui��o Helio Ricardo, Vinicius Cruz, Caio Vitor Oliveira (caiovitor@gmail.com)

* @Link http://www.tuliofaria.net

* @Licen�a MIT

* @Vers�o x.x $Data: xx-xx-2007

*/

class UploadComponent extends Component{

	var $controller = true;
	var $path = "";
	var $maxSize; //Tamanho m�ximo permitido
	var $allowedExtensions = array("jpg", "JPG", "PNG", "png", "GIF", "gif"); //Arquivos permitidos
	var $logErro = ""; //Log de erro

	function startup(&$controller){
		$this->path    = APP . WEBROOT_DIR . DS;
		$this->maxSize = 2*1024*1024; // 2MB
	}

	function setPath($p)
	{
		if ($p!=NULL){
			$this->path = $this->path . $p . DS;
			$this->path = eregi_replace("/", DS, $this->path);
			$this->path = eregi_replace("\\\\", DS, $this->path);
			return true;
		}
	}

	//Seta novo tamanho m�ximo

	function setMaxFileSize($size)
	{
		$this->maxSize = $size;
	}

	//Adiciona nova extens�o no array

	function addAllowedExt($ext)
	{
		if (is_array($ext))
		{
			$this->allowedExtensions = array_merge($this->allowedExtensions, $ext);
		}else{
			array_push($this->allowedExtensions, $ext);
		}
	}

	//Retorna extens�o de arquivo

	function getExt($file)
	{
		$p = explode(".", $file);
		return $p[count($p)-1];
	}

	//Exibe lista de extens�es em array

	function viewExt()
	{
		$list_tmp = "";
		for($a=0; $a<count($this->allowedExtensions); $a++)
		{
			$list_tmp.= $this->allowedExtensions[$a].", ";
		}
		return substr($list_tmp, 0, -2);
	}

	//Verifica se arquivo pode ser feito upload

	function verifyUpload($file)
	{
		$passed = false; //Vari�vel de controle
		if(is_uploaded_file($file["tmp_name"]))
		{
			$ext = $this->getExt($file["name"]);
			if((count($this->allowedExtensions) == 0) || (in_array($ext, $this->allowedExtensions)))
			{
				$passed = true;
			}
		}
		return $passed;
	}

	//Copia arquivo para destino

	function copyUploadedFile($source, $destination="")
	{
		//Destino completo

		$this->path = $this->path . $destination . DS;

        if (!is_dir($this->path)){
            mkdir($this->path);
        }

		//Cabe�alho de log de erro

		$logMsg = '=============== UPLOAD LOG ===============<br />';
		$logMsg .= 'Pasta destino: ' . $this->path . '<br />';
		$logMsg .= 'Nome do arquivo: ' . $source["name"] . '<br />';
		$logMsg .= 'Tamanho do arquivo: ' . $source["size"] . ' bytes<br />';
		$logMsg .= 'Tipo de arquivo: ' . $source["type"] . '<br />';
		$logMsg .= '---------------------------------------------------------------<br />';

		$this->setLog($logMsg);
		//Verifica se arquivo � permitido
		if($this->verifyUpload($source))
		{
			$novo_arquivo = $this->verifyFileExists($source["name"]);
            //if(!is_dir($this->path))
            //    mkdir($this->path);
			if(move_uploaded_file($source["tmp_name"], $this->path . $novo_arquivo))
				return $novo_arquivo;
			else
			{
				$this->setLog("-> Erro ao enviar arquivo<br />");
				$this->setLog("   Obs.: ".$this->getErrorUpload($source["error"])."<br />");
				return false;
			}
		}else
		{
			$this->setLog("-> O arquivo que voc� est� tentando enviar n�o � permitido pelo administrador<br />");
			$this->setLog("   Obs.: Apenas as extens�es ".$this->viewExt()." s�o permitidas.<br />");
			return false;
		}
	}


	//Gerencia log de erro

	function setLog($msg)
	{
		$this->logErro.=$msg;
	}

	function getLog()
	{
		return $this->logErro;
	}

	function getErrorUpload($cod="")
	{
		switch($cod)
		{
			case 1:
				return "Arquivo com tamanho maior que definido no servidor.";
				break;
			case 2:
				return "Arquivo com tamanho maior que definido no formul�rio de envio.";
				break;
			case 3:
				return "Arquivo enviado parcialmente.";
				break;
			case 4:
				return "N�o foi poss�vel realizar upload do arquivo.";
				break;
			case 5:
				return "The servers temporary folder is missing.";
				break;
			case 6:
				return "Failed to write to the temporary folder.";
				break;
		}

	}

	//Checa se arquivo j� existe no servidor, e renomea

	function verifyFileExists($file)
	{
		$file = $this->nameFile($file);
		if(!file_exists($this->path.$file))
			return $file;
		else
			return $file;
	}

	//Noemeia o Arquivo

	function nameFile($name){
		$ext = $this->getExt($name);
		//$name = md5($name);
		return $name.".".$ext;
	}

	//Renomea Arquivo, para evitar sobescrever

	function renameFile($file)
	{
		$file = $this->nameFile($file);

		$ext = $this->getExt($file);
		$file_tmp = substr($file, 0, -4); //Nome do arquivo, semextensao

		do
		{
			$file_tmp = md5($file_tmp.base64_encode(date("His")));
		}while(file_exists($this->path.$file_tmp.".".$ext));
		return $file_tmp.".".$ext;
	}


	/*************************************************
	* removeFile removes a specific file from the uploaded directory
	*
	* @param string $name A reference to the filename to delete from the uploadDirectory
	* @return boolean
	* @access public
	*/
	function removeFile($name = null){
		if(!$name) return false;

		$up_dir = $this->path;
		$target_path = $up_dir . $name;
		if(unlink($target_path)) return true;
		else return false;
	}

}
?>