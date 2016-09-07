<?php 


/**
*       TECHMOB - Empresa Júnior da Faculdade de Computação - UFU 
*       
*       Controlador de Usuarios
*
*       @author: Jean Fabrício <jeanufu21@gmail.com>
*       @since 24/02/2016
*       
*/
 class UsuarioController extends BaseController{
 	public function getIndex()
	{
		Session::put('flag',1);
		return View::make('usuario.usuario');
	}
	/*******************************************
	*  Ação que retorna a View de Cadastro para 
	*  Tab.
	********************************************/
	public function getCadastro()
	{
		
		return View::make('usuario.cadastro');
	}
	/*******************************************
	*  Ação para Cadastro de Usuarios do Sistema
	********************************************/
	public function postCadastrar()
	{
		$dados = Input::all();
		
		unset($dados["confirmacao"]);
		
		$dados["pw_senha"] = sha1($dados["pw_senha"]);
		$user = new UsuarioModel($dados);
		$status = $user->save();
		
		return View::make('usuario.usuario');
	}
	/*******************************************
	*  Ação que retorna a View de Pesquisa para 
	*  Tab.
	********************************************/
	public function getPesquisa()
	{
		return View::make('usuario.pesquisa');
	}
	/*******************************************
	*  Ação que faz a busca dos dados via Ajax utilizando
	*  o Plugin DataTables
	********************************************/
	public function postPesquisa()
	{
		$dados = Input::all();
		if(isset($dados["columns"]))
			$columns = $dados["columns"];
		if(isset($dados["order"]))
		{
			$order = $dados["order"];
			$order = $order[0];
			$orderIndex = intval($order["column"]);
		}
		
		if(isset($dados["search"]))
			$search = $dados["search"];
			$limit = intval($dados["length"]);
			$start = intval($dados["start"]);
		$count = DB::table("usuario")->get();

		$recordsTotal = count($count);
		if($limit == -1)
			$limit = $recordsTotal;
		
		$filtred = DB::table("usuario")
		->where(function($query)use($dados){
			if($dados["filters"] != "usuario.id")
				$query->where($dados["filters"],"LIKE","%".$dados["value_search"]."%");
			else if($dados["value_search"] != "")
				$query->where($dados["filters"],$dados["value_search"]);
				
		})
		->select("id","nome","telefone","email","login",
			"pw_senha","tipo")
		->orderBy($columns[$orderIndex]["name"],$order["dir"])
		->get();
		
		$recordsFiltered = count($filtred);
		
		$users = DB::table("usuario")
		->where(function($query)use($dados){
			if($dados["filters"] != "usuario.id")
				$query->where($dados["filters"],"LIKE","%".$dados["value_search"]."%");
			else if($dados["value_search"] != "")
				$query->where($dados["filters"],$dados["value_search"]);
				
		})
		->select("id","nome","telefone","email","login",
			"pw_senha","tipo")
		->orderBy($columns[$orderIndex]["name"],$order["dir"])
		->take($limit)
		->skip($start)
		->get();
		$json = [];
		$json["draw"] = intval($dados["draw"]);
		$json["recordsTotal"] = $recordsTotal;
		$json["recordsFiltered"] = $recordsFiltered;
		$json["aaData"] = array();
		foreach ($users as $key => $value) {
			$value = (array)$value;
			if($value["nivel"] == 1)
				$value["nivel"] = Lang::get(Config::get("app.locale").'.nivel_admin');
			else if($value["nivel"] == 2)
				$value["nivel"] = Lang::get(Config::get("app.locale").'.nivel_empregado');
			
			array_push($json["aaData"], array_values($value));
		}
		return json_encode($json);
	}
	/*******************************************
	*  Ação de solicitação Ajax que auto preenche
	*  os dados para edição
	********************************************/
	public function getEditar()
	{
		$codigo = Input::get('codigo');
		$funcionario = DB::table("funcionarios")
		->where("funcionarios.id",$codigo)
		->get();
		return json_encode($funcionario);
	}
	/*******************************************
	*  Ação que faz a edição dos dados
	********************************************/
	public function postEditar()
	{
		
		$dados = Input::all();
		unset($dados["_token"]);
		$codigo = $dados["id"];
		
		$result = DB::table('funcionarios')
        ->where('id', $codigo)
        ->update($dados);
        
        if($result)
			return 1;
		else
			return 0;
	}
	/*******************************************
	*  Ação que faz a exclusão dos dados
	********************************************/
	public function getDeletar()
	{
		$id = Input::get("id");
		DB::table('funcionarios')->where('id',$id)->delete();
		return 1;
	}
	
 }