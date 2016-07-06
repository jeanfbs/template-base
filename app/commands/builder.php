<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class builder extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'builder';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'O builder controi formulario blade de acordo com o modelo de dados';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		
		$drive = Config::get("database.default");
		DB::disconnect("cowaerdb");
		$this->info("DataBase Drive available: ".strtoupper($drive));

		if($drive == "mysql")
		{
			
			$tabela = $this->option("t");
			
			if(strlen(DB::connection()->getDatabaseName()) < 1)
			{
				$this->error("Sem conexão com o banco!");
				return 1;
			}
			$this->info("DataBase: ".strtoupper(DB::connection()->getDatabaseName())." connected!");
			$table_info_columns = DB::select( DB::raw('SHOW COLUMNS FROM '.$tabela));

			$ftool = new FormToolKit($this,$table_info_columns);
			$ftool->setFileName($this->option("f"));
			$ftool->createDir();
			$ftool->generatePageHome();
			$ftool->createTabCadastro();
			
		}
		else if($drive == "pgsql")
		{
			echo "bbb";
		}
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('tabela', InputArgument::REQUIRED, 'Nome da tabela'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('t', null, InputOption::VALUE_REQUIRED, 'Nome Tabela', null),
			array('f', null, InputOption::VALUE_REQUIRED, 'Nome Arquivo', null),
		);
	}


	


	

}
