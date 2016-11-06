<?php 

/********************************************************
* 	Generate Class Front-End  from Artisan Command
*
*	@author: Jean Fabricio<jeanufu21@gmail.com>
*	@since: 07.09.2016
*	@version: 1.0
*********************************************************/


class FormToolKit
{
	const LIMIT_COL_TABLE = 6;
	private $log;
	private $table_info_column;
	private $filename;
	private $lgtool;
	private $tableName;
	public function __construct($log_ , $table_info_column_, $tableName){
		$this->log = $log_;
		$this->table_info_column = $table_info_column_;
		$this->lgtool = new LangToolKit($log_);
		$this->tableName = $tableName;
	}


	public function generatePageHome()
	{
		$file = base_path()."/app/views/".$this->filename."/".$this->filename.".blade.php";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}
		$content =  file_get_contents(__DIR__."/models/modelpage.php");
		$content = str_replace('$filename', $this->filename, $content);
		$this->lgtool->addValue("title_".$this->filename,ucfirst($this->filename));
		$this->lgtool->update();
		file_put_contents($file,"\xEF\xBB\xBF".$content);
		chmod($file,0777);
		$this->log->info("Criado página base $file");
	}

	public function createDirs()
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
		$this->log->info("Criado diretorio '$dir'");

		$dir = base_path()."/public/js/".$this->filename;
		if(!file_exists($dir))
		{
			mkdir($dir,0755);
		}
		else{
			$this->log->error("Diretorio '$dir' já existe!");
			die();
		}

		$this->log->info("Criado diretorio '$dir'");
	}

	public function builder()
	{
		$this->createDirs();
		$this->generatePageHome();
		$this->createCadastroHTML();
		$this->createCadastroJS();
		$this->createPesquisa();
		$this->createPesquisaJS();
	}
	private function createCadastroHTML()
	{
		$file = base_path()."/app/views/".$this->filename."/cadastro.blade.php";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}

		$content =  file_get_contents(__DIR__."/models/modelcadastro.php");
		$content = str_replace('$filename', $this->filename, $content);
		
		$inputs = $this->fieldsBuilder();
		$content = str_replace('$campos', $inputs, $content);
		
		file_put_contents($file,"\xEF\xBB\xBF".$content);
		chmod($file,0777);
		$this->log->info("Criado tab de cadastro $file");

	}

	private function fieldsBuilder()
	{
		$inputs = "";
		$htm = new HTMLFieldsForm();

		$inputs .= $htm->openFormGroup();
		foreach ($this->table_info_column as $key => $value) {
			$tmp = '';
			$explode = explode("(",$value->Type);

			if(isset($explode[0]))
			{

				$td = $explode[0];
				if(isset($explode[1]))
					$size = intval($explode[1]);
				

				if(preg_match('/fk_/', $value->Field))
				{
					$inputs .= $htm->controlFormGroup(6);
					$htm->incLimit(6);
					$tmp = str_replace("fk_", "", $value->Field);
					$this->lgtool->addValue(strtolower($tmp),ucfirst($tmp));
					$inputs .= $htm->selectToForeignKey($value->Field,TRUE);
				}
				else if(preg_match("/date/",$td))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
					$inputs .= $htm->dataFieldFull(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/pw_/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(12);
					$htm->incLimit(12);
					$tmp = str_replace("pw_", "", $value->Field);
					$this->lgtool->addValue(strtolower($tmp),ucfirst($tmp));
					$this->lgtool->addValue("confirm",ucfirst("confirmação"));
					$this->lgtool->addValue("show_pass","Mostrar Senha");
					$inputs .= $htm->textPassword($value->Field,TRUE);
				}
				else if(preg_match("/img_/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$tmp = str_replace("img_", "", $value->Field);
					$this->lgtool->addValue(strtolower($tmp),ucfirst($tmp));
					$inputs .= $htm->pictureField(ucfirst($value->Field));
				}
				else if(preg_match("/int/",$td) && !preg_match("/\id$/",$value->Field))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
					$inputs .= $htm->numberIntField(ucfirst($value->Field),TRUE);
				}
				else if(preg_match("/float/",$td))
				{
					$inputs .= $htm->controlFormGroup(4);
					$htm->incLimit(4);
					$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
					$inputs .= $htm->numberFloatField(ucfirst($value->Field),FALSE);
				}
				else if(preg_match("/varchar/",$td))
				{
					if($size <= 15)
					{
						$inputs .= $htm->controlFormGroup(4);
						$htm->incLimit(4);
						$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
						$inputs .= $htm->textField4(ucfirst($value->Field),TRUE);
					}
					else if($size > 15 && $size <= 40)
					{
						$inputs .= $htm->controlFormGroup(6);
						$htm->incLimit(6);
						$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
						$inputs .= $htm->textField6(ucfirst($value->Field),TRUE);
					}
					else if($size > 40 && $size <= 70)
					{
						$inputs .= $htm->controlFormGroup(8);
						$htm->incLimit(8);
						$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
						$inputs .= $htm->textField8(ucfirst($value->Field),TRUE);
					}
					else if($size > 70 && $size <= 100)
					{
						$inputs .= $htm->controlFormGroup(10);
						$htm->incLimit(10);
						$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
						$inputs .= $htm->textField10(ucfirst($value->Field),TRUE);
					}
					else if($size > 100)
					{
						$inputs .= $htm->controlFormGroup(12);
						$htm->incLimit(12);
						$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
						$inputs .= $htm->textField12(ucfirst($value->Field),TRUE);
					}

				}
				else if(preg_match("/text/",$td))
				{
					$inputs .= $htm->controlFormGroup(2);
					$htm->incLimit(12);
					$this->lgtool->addValue(strtolower($value->Field),ucfirst($value->Field));
					$inputs .= $htm->textAreaField(ucfirst($value->Field),TRUE);
				}
			}

		}// endfor

		$inputs .= $htm->closeFormGroup();
		$this->lgtool->update();

		return $inputs;
	}

	private function createCadastroJS()
	{
		$file = base_path()."/public/js/".$this->filename."/cadastro.js";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}

		$content =  file_get_contents(__DIR__."/models/modelcadastro.js");
		$content = str_replace('$filename', $this->filename, $content);
		$validators = "";

		foreach ($this->table_info_column as $key => $value) {
			$tmp = $value->Field;
			if(preg_match("/pw_/",$value->Field))
			{
				$tmp = str_replace("pw_", "", $value->Field);
			}
			else if(preg_match("/img_/",$value->Field))
			{
				$tmp = str_replace("img_", "", $value->Field);
			}
			if(!preg_match('/fk_/', $value->Field) && !preg_match("/\id$/",$value->Field))
			{
				$validators .= "\t\t\t$value->Field: {\n
					validators: {\n
						notEmpty: {\n
							message: $('#id_".strtolower($tmp)."').attr('notEmpty')\n
						}\n
						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},\n";
			}
		}

		$content = str_replace('$validators',$validators, $content);

		file_put_contents($file,"\xEF\xBB\xBF".$content);
		chmod($file,0777);
		$this->log->info("Criado script de cadastro $file");
	}


	private function createPesquisa()
	{
		$file = base_path()."/app/views/".$this->filename."/pesquisa.blade.php";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}

		$content =  file_get_contents(__DIR__."/models/modelpesquisa.php");
		$content = str_replace('$filename', $this->filename, $content);
		$filters = "";
		$header_table = "";
		$aux = 0;
		foreach ($this->table_info_column as $key => $value) {
			$tmp = $value->Field;
			if(preg_match("/pw_/",$value->Field))
			{
				$tmp = str_replace("pw_", "", $value->Field);
			}
			else if(preg_match('/fk_/', $value->Field))
			{
				$tmp = str_replace("fk_", "", $value->Field);
			}

			if(!preg_match("/img_/",$value->Field))
			{
				$filters .= "<option value='$this->tableName.".$value->Field."'>{{trans(Config::get('app.locale').'.".strtolower($tmp)."')}}</option>\n\t\t\t\t\t\t\t\t";
			}
			// limit number of columns of table search to 8
			if($aux <= self::LIMIT_COL_TABLE)
			{
				if(!preg_match("/img_/",$value->Field))
				$header_table .= "<th>{{trans(Config::get('app.locale').'.".strtolower($tmp)."')}}</th>\n\t\t\t\t\t\t\t\t";
			}

			$aux++;

			
		}
		$header_table .= "<th>{{trans(Config::get('app.locale').'.actions')}}</th>\n\t\t\t\t\t\t\t\t";
		$content = str_replace('$filters', $filters, $content);
		$content = str_replace('$header_table', $header_table, $content);
		$modal_fields = $this->fieldsBuilder();
		$content = str_replace('$modal_fields', $modal_fields, $content);
		file_put_contents($file,"\xEF\xBB\xBF".$content);
		chmod($file,0777);
		$this->log->info("Criado tab de pesquisa $file");
	}

	private function createPesquisaJS()
	{
		$file = base_path()."/public/js/".$this->filename."/pesquisa.js";
		if(file_exists($file))
		{
			$this->log->error("Arquivo '$file' já existe!");
			die();
		}

		$content =  file_get_contents(__DIR__."/models/modelpesquisa.js");
		$content = str_replace('$filename', $this->filename, $content);
		$cont = 0;
		$columnsjs = "";

		foreach ($this->table_info_column as $key => $value) {
			$explode = explode("(",$value->Type);
			if($cont <= self::LIMIT_COL_TABLE)
			{
				if(isset($explode[0]))
				{
					$td = $explode[0];
					if(isset($explode[1]))
						$size = intval($explode[1]);

					if(preg_match("/\id$/",$value->Field))
					$columnsjs .= '{ "name": "'.$value->Field.'","width":"45px" },'."\n\t\t\t\t";
					else if(preg_match("/varchar/",$td))
					{

						if($size <= 15)
						{
							$columnsjs .= '{ "name": "'.$value->Field.'","width":"150px" },'."\n\t\t\t\t";
						}
						else if($size > 15 && $size <= 40)
						{
							$columnsjs .= '{ "name": "'.$value->Field.'","width":"200px" },'."\n\t\t\t\t";
						}
						else if($size > 40 && $size <= 70)
						{
							$columnsjs .= '{ "name": "'.$value->Field.'","width":"300px" },'."\n\t\t\t\t";
						}
						else if($size > 70 && $size <= 100)
						{
							$columnsjs .= '{ "name": "'.$value->Field.'","width":"400px" },'."\n\t\t\t\t";
						}
						else if($size > 100)
						{
							$columnsjs .= '{ "name": "'.$value->Field.'","width":"500px" },'."\n\t\t\t\t";
						}

					}
					else
					{
						$columnsjs .= '{ "name": "'.$value->Field.'"},'."\n\t\t\t\t";
					}
				}

			}
			
			$cont++;
		}

		$content = str_replace('$columns',$columnsjs, $content);

		// criar o validador para o formulario de edição
		$validators = "";

		foreach ($this->table_info_column as $key => $value) {
			$tmp = $value->Field;
			if(preg_match("/pw_/",$value->Field))
			{
				$tmp = str_replace("pw_", "", $value->Field);
			}
			else if(preg_match("/img_/",$value->Field))
			{
				$tmp = str_replace("img_", "", $value->Field);
			}
			if(!preg_match('/fk_/', $value->Field) && !preg_match("/\id$/",$value->Field))
			{
				$validators .= "\t\t\t$value->Field: {\n
					validators: {\n
						notEmpty: {\n
							message: $('#id_".strtolower($tmp)."').attr('notEmpty')\n
						}\n
						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},\n";
			}
		}

		$content = str_replace('$validators',$validators, $content);
		
		$editFields = "";

		foreach ($this->table_info_column as $key => $value) {
			$tmp = $value->Field;
			if(preg_match("/pw_/",$value->Field))
			{
				$tmp = str_replace("pw_", "", $value->Field);
			}
			else if(preg_match("/img_/",$value->Field))
			{
				$tmp = str_replace("img_", "", $value->Field);
			}
			else if(preg_match('/fk_/', $value->Field))
			{
				$editFields .= "\t\t$('select[name=".strtolower($value->Field)."]').val(res[0].".strtolower($value->Field).");\n";
			}

			if(!preg_match('/fk_/', $value->Field) && !preg_match("/\id$/",$value->Field))
			{

				$editFields .= "\t\t$('input[name=".strtolower($value->Field)."]').val(res[0].".strtolower($value->Field).");\n";
			}
		}

		$content = str_replace('$editFields',$editFields, $content);
		
		file_put_contents($file,"\xEF\xBB\xBF".$content);
		chmod($file,0777);
		$this->log->info("Criado script de pesquisa $file");
	}

	public function setFileName($value)
	{
		$this->filename = $value;
	}
	

	

}