<?php 


/**
* 	Classe responsável por criar os arquivos de
*	location.
*/
class LangToolKit
{
	private $arr_lg = array();
	private $log;

	public function __construct($log_)
	{
		$this->log = $log_;
		if(Lang::has(Config::get("app.locale")))
			$this->arr_lg = Lang::get(Config::get("app.locale"));
		else
			$this->log->error("Arquivo de idiomas ".Config::get("app.locale")." não foi localizado!");

	}


	public function showLangArray()
	{
		dd($this->arr_lg);
	}

	public function addValue($key = NULL, $translate = NULL)
	{
		if($key !== NULL && $translate !== NULL && !isset($this->arr_lg[$key]))
		{
			$this->arr_lg[$key] = strval($translate);
		}
	}

	public function removeValue($key = NULL)
	{
		if($key !== NULL)
		{
			unset($this->arr_lg[$key]);
		}
	}

	public function update()
	{
		$str = "<?php\n 
return array(
/*
|--------------------------------------------------------------------------
| Labels para o idioma local
|--------------------------------------------------------------------------
|
*/\n";

		foreach ($this->arr_lg as $key => $value) {
			$str .= "\t\t'$key' => '$value',\n";
		}

		$str .= ");";
		
		$file = base_path()."/app/lang/".Config::get("app.locale")."/".Config::get("app.locale").".php";
		
		file_put_contents($file,"\xEF\xBB\xBF".$str);
		
		if(!file_exists($file))
		{
			chmod($file,0777);
		}
	}


}