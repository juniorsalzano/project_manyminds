CREATE DATABASE manyminds;
USE manyminds;

CREATE TABLE usuario
(
  id             INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nome 	         VARCHAR(200),
  dataNascimento DATE,
  tipo           VARCHAR(1), --F - Fornecedor / C - Colaborador
  email          VARCHAR(200),
  senha          VARCHAR(200),  
  situacao       VARCHAR(1)  
);

insert into usuario (nome, dataNascimento, tipo, email, senha ,situacao)
             values ('Adm',  '1988-10-15'  , 'C' , "adm@adm.com.br", "123456", "A");     


CREATE TABLE usuario_endereco
(
  id        INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuarioId INT NOT NULL,
  endereco  VARCHAR(200),
  numero    VARCHAR(100),
  cep       VARCHAR(9),
  cidade    VARCHAR(60),
  bairro    VARCHAR(100),
  uf        VARCHAR(2)
  
);

ALTER TABLE usuario_endereco ADD CONSTRAINT FK_ENDERECO_USUARIO FOREIGN KEY (usuarioId) REFERENCES usuario(id);

CREATE TABLE produto
(
  id        INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuarioId INT NOT NULL,
  codigo    VARCHAR(60),
  descricao VARCHAR(200),
  situacao  VARCHAR(1)
  
);

ALTER TABLE produto ADD CONSTRAINT FK_PRODUTO_USUARIO FOREIGN KEY (usuarioId) REFERENCES usuario(id);


CREATE TABLE pedido
(
  id           INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fornecedorId INT NOT NULL,
  produtoId    INT NOT NULL,
  codigo       VARCHAR(60),
  descricao    VARCHAR(200),
  situacao     VARCHAR(1),
  dataPedido   DATE,
  quantidade   INT
);

ALTER TABLE pedido ADD CONSTRAINT FK_PEDIDO_FORNECEDOR FOREIGN KEY (fornecedorId) REFERENCES usuario(id);


CREATE TABLE colaborador_pedido 
(
  id           INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuarioId    INT NOT NULL,
  pedidoId     INT NOT NULL
);

ALTER TABLE colaborador_pedido ADD CONSTRAINT FK_PEDIDOCOLAB_USUARIO FOREIGN KEY (usuarioId) REFERENCES usuario(id);
ALTER TABLE colaborador_pedido ADD CONSTRAINT FK_PEDIDOCOLAB_PEDIDO  FOREIGN KEY (pedidoId)  REFERENCES pedido(id);