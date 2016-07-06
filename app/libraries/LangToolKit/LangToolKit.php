<?php 


/**
* 	Classe responsável por criar os arquivos de
*	location.
*/
class LangToolKit
{
	private $arr_lg = 
	array(
/*********************************************************************************/
//  		 Labels Genéricos 	
	'button_cancelar' => 'Cancelar',
	'button_salvar'   => 'Salvar',
	'button_fechar'   => 'Fechar',
	'button_entrar'  => 'Entrar',
	'button_rejeitar'  => 'Rejeitar',
	'add_foto'  => 'Adicionar Foto',
	'add_anexo'  => 'Adicionar Exame',
	'tab_cadastro'  => 'Cadastrar',
	'tab_pesquisar'  => 'Pesquisar',
	'tab_controle'  => 'Controle',
	'tab_relatorio'  => 'Relatórios',
	'tooltip_ver' => "Ver",
	'tooltip_editar' => "Editar",
	'tooltip_deletar' => "Deletar",
	'breadcrumb_home' =>'Home',
	'title_info'	  => 'Informações',
	'pesquisar' =>"Pesquisar",
	'titulo_modal' => 'Editando dados para: ',
	'breadcrumb_cadastrar' =>'Cadastrar',
	'breadcrumb_pesquisar' =>'Pesquisar',
	'placeholder_pesquisa' => 'Pesquisar por...',
	'msg_confirmacao_delete' => 'Você irá excluir essa informação definitivamente, Deseja continuar?',
	'exportar' =>'Exportar',
	'aguarde' =>'Aguarde...',
	'limpar' =>'Limpar',
/*********************************************************************************/
//  		 Labels Template
	/* Nav Bar labels */
	'hello'					=> 'Bem Vindo',
	'menu_perfil' 			=> 'Perfil',
	'menu_suport'     		=> 'Suporte',
	'menu_sair'				=> 'Sair',
	/* Menu Side Bar*/
	'menu_side_dashboard' 				=> 'Dashboard',
	'menu_side_principal' 				=> 'Gestão Fazenda',
	'menu_side_fazenda' 				=> 'Fazendas',
	'menu_side_usuario' 				=> 'Usuários',
	'menu_side_retiro' 				    => 'Retiros',
	'menu_side_piquete' 				=> 'Piquetes',
	'menu_side_lote' 				    => 'Lotes',
	'menu_side_animal' 				    => 'Animais',
);
	private $log;

	public function __construct($log_)
	{
		$this->log = $log_;
		if(Lang::has(Config::get("app.locale")))
			$this->arr_lg = Lang::get(Config::get("app.locale"));

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
			
			$this->update();
		}
	}

	public function removeValue($key = NULL)
	{
		if($key !== NULL)
		{
			unset($this->arr_lg[$key]);

			$this->update();
		}
	}

	private function update()
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
		
		file_put_contents($file,$str);
		
		if(!file_exists($file))
		{
			chmod($file,0777);
		}
	}


}