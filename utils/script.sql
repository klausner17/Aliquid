/*script do banco de dados*/
CREATE TABLE usuario(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
	,	nome VARCHAR(100) NOT NULL
	,	sobrenome VARCHAR(100) NOT NULL
	, 	responsavel INT NOT NULL DEFAULT 0
	,	UNIQUE(nome, sobrenome)
);

CREATE TABLE produto(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
	,	codigo VARCHAR(20) NOT NULL UNIQUE
	,	descricao VARCHAR(100) NOT NULL
	,	custo double
	,	tipo INT DEFAULT 0
)

CREATE TABLE cliente(
		id NOT NULL PRIMARY KEY AUTO_INCREMENT
	,	nome VARCHAR(MAX) NOT NULL
	,	telefone VARCHAR(15) NOT NULL
	,	regiao VARCHAR(20) DEFAULT 0
)

CREATE TABLE lote(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
	,	codigo VARCHAR(8) NOT NULL UNIQUE
	,	descricao VARCHAR(100)
)

CREATE TABLE rnc(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
	, 	id_usuario INT NOT NULL REFERENCES usuario(id)
	,	id_peca INT NOT NULL REFERENCES produto(id)
	, 	id_lote INT NOT NULL REFERENCES lote(id)
	,	quantidade DOUBLE NOT NULL DEFAULT 1
	,	ocorrido VARCHAR(MAX) NOT NULL
	,	acao_imediata VARCHAR(MAX)
	,	responsavel INT NOT NULL REFERENCES usuario(id)
)

CREATE TABLE rrc(
		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT
	,	id_usuario INT NOT NULL REFERENCES usuario(id)
	,	id_produto INT NOT NULL REFERENCES produto(id)
	,	id_cliente INT NOT NULL REFERENCES cliente(id)
	,	serial VARCHAR(20)
	,	ocorrido VARCHAR(MAX) NOT NULL
	,	acao VARCHAR(MAX)
	,	responsavel INT NOT NULL REFERENCES usuario(id)
)