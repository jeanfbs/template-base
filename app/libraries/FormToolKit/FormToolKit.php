<?php 


/**
* 	Classe que irá gerar os arquivos dos formularios
*	no artisan
*/
class FormToolKit
{
	private $log;
	private $table_info_column;
	private $filename;
	private $lgtool;

	public function __construct($log_ , $table_info_column_){
		$this->log = $log_;
		$this->table_info_column = $table_info_column_;
		$this->lgtool = new LangToolKit($log_);
			
	}


	public function generatePageHome()
	{
		$file = base_path()."/app/views/".$this->filename."/".$this->filename.".blade.php";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}
		$content =  file_get_contents(__DIR__."/modelpage.php");
		$content = str_replace('$filename', $this->filename, $content);
		$this->lgtool->addValue("titulo_".$this->filename,ucfirst($this->filename));
		file_put_contents($file,$content);
		chmod($file,0777);
		$this->log->info("Criado página base $file");
	}

	public function createDir()
	{
		$dir = base_path()."/app/views/".$this->filename;
		if(!file_exists($dir))
		{
			mkdir($dir,0755);
		}
		else{
			$this->log->error("Diretorio '$dir' já existe!");
			die();
		}

		$this->log->info("Criado diretorio de View em '$dir'");
	}

	public function createTabCadastro()
	{
		$file = base_path()."/app/views/".$this->filename."/cadastro.blade.php";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}

		$content =  file_get_contents(__DIR__."/modelcadastro.php");
		$content = str_replace('$filename', $this->filename, $content);
		$inputs = "";
		$htm = new HTMLBuilder();

		$inputs .= $htm->openFormGroup();
		foreach ($this->table_info_column as $key => $value) {
			
			$explode = explode("(",$value->Type);
			if(isset($explode[0]))
			{
				$td = $explode[0];
				$size = intval($explode[1]);

				if(preg_match('/cod_/', $value->Field))
				{
					$inputs .= $htm->controlFormGroup(6);
					$htm->incLimit(6);
					$value->Field = str_replace("cod_", "", $value->Field);
					$inputs .= $htm->selectToForeignKey(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/date/",$td))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$inputs .= $htm->dataFieldFull(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/senha/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(12);
					$htm->incLimit(12);
					$inputs .= $htm->textPassword(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/im_/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$inputs .= $htm->dataFieldFull(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/int/",$td) && !preg_match("/cod/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$inputs .= $htm->numberIntField(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/float/",$td))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$inputs .= $htm->numberFloatField(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/varchar/",$td))
				{
					if($size <= 15)
					{
						$inputs .= $htm->controlFormGroup(4);
						$htm->incLimit(4);
						$inputs .= $htm->textField4(ucfirst($value->Field),TRUE);
					}
					else if($size > 15 && $size <= 40)
					{
						$inputs .= $htm->controlFormGroup(6);
						$htm->incLimit(6);
						$inputs .= $htm->textField6(ucfirst($value->Field),TRUE);
					}
					else if($size > 40 && $size <= 70)
					{
						$inputs .= $htm->controlFormGroup(8);
						$htm->incLimit(8);
						$inputs .= $htm->textField8(ucfirst($value->Field),TRUE);
					}
					else if($size > 70 && $size <= 100)
					{
						$inputs .= $htm->controlFormGroup(10);
						$htm->incLimit(10);
						$inputs .= $htm->textField10(ucfirst($value->Field),TRUE);
					}
					else if($size > 100)
					{
						$inputs .= $htm->controlFormGroup(12);
						$htm->incLimit(12);
						$inputs .= $htm->textField12(ucfirst($value->Field),TRUE);
					}

				}
				else if(preg_match("/text/",$td))
				{
					$inputs .= $htm->controlFormGroup(2);
					$htm->incLimit(12);
					$inputs .= $htm->textAreaField(ucfirst($value->Field),TRUE);
				}

				
			}

		}// endfor

		$inputs .= $htm->closeFormGroup();

		$content = str_replace('$campos', $inputs, $content);
		
		file_put_contents($file,$content);
		chmod($file,0777);
		$this->log->info("Criado tab de cadastro $file");
		
		

	}


	public function setFileName($value)
	{
		$this->filename = $value;
	}
	

	

}