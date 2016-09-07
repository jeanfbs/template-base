################################################################################################
#
#	Este modelo deve ser utilizado para construir as querys da base de dados
#	para que a ferramenta de construição de html funcione corretamente.
#	Por enquanto aqui está configurado alguns casos para nomenclaturas de colunas
#	para facilitar para o commando builder construir os formulários corretamente
#
#	
################################################################################################
--
-- Database: `database`
--

-- CREATE USER 'usuario'@'localhost' IDENTIFIED BY 'database';

-- GRANT ALL PRIVILEGES ON database.* TO 'usuario'@'localhost' WITH GRANT OPTION;

-- Tabela: TableName

CREATE TABLE IF NOT EXISTS funcionarios(
	id	 INT primary key auto_increment,
	pk_fazenda INT,
	nome VARCHAR(40) not null,
	nivel INT not null,
	login VARCHAR(15) not null,
	pw_senha VARCHAR(70) not null,
	email VARCHAR(50),
	cargo VARCHAR(20),
	img_url VARCHAR(100) NULL,
	
);
