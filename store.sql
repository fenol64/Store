create database if not exists store;
use store;

CREATE TABLE isopened (
  id_isopened int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  time_inicial timestamp NOT NULL DEFAULT current_timestamp(),
  time_final timestamp NOT NULL DEFAULT '1970-01-01 03:00:01',
  status varchar(7) DEFAULT 'aberto'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO isopened (id_isopened, time_inicial, time_final, `status`) VALUES
(14, '2020-02-23 01:37:05', '1970-01-01 03:00:01', 'aberto');


CREATE TABLE orderbody (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  id_order varchar(6) NOT NULL,
  name_product varchar(40) NOT NULL DEFAULT 'none',
  value_product float NOT NULL DEFAULT 0,
  status_order varchar(10) NOT NULL DEFAULT 'pendente',
  created_At date NOT NULL DEFAULT (CURDATE())
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE orders (
  id_order varchar(6) NOT NULL,
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  total float NOT NULL DEFAULT 0,
  day_inserted varchar(11) NOT NULL DEFAULT '',
  status varchar(10) NOT NULL DEFAULT 'pendente',
  created_At date NOT NULL DEFAULT (CURDATE())
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE payment (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  id_order varchar(6) NOT NULL,
  method varchar(15) NOT NULL DEFAULT 'dinheiro',
  value_paid float NOT NULL DEFAULT 0,
  created_At date NOT NULL DEFAULT (CURDATE()),
  status_order varchar(12) NOT NULL DEFAULT 'pendente'
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE products (
  id_product int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name_product varchar(40) NOT NULL DEFAULT 'none',
  value_product float NOT NULL DEFAULT 0
) DEFAULT CHARSET=utf8mb4;


CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email varchar(45) NOT NULL,
  senha char(32) NOT NULL DEFAULT '123',
  condicao tinyint NOT NULL DEFAULT 1
) DEFAULT CHARSET=utf8mb4;


INSERT INTO users (id, email, senha, condicao) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 0),
(2, 'employee@batatadocheffi.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 1);

INSERT INTO products (id_product, name_product, value_product) VALUES
(1, 'Batata comum P.P', 5),
(2, 'Batata comum Pequena', 10),
(3, 'Batata comum Média', 15),
(4, 'Batata comum Grande', 20),
(5, 'Batata comum Gigante', 25),
(6, 'Batata Americana Pequena', 20),
(7, 'Batata Americana Média', 25),
(8, 'Batata Americana Grande', 30),
(9, 'Batata Americana Gigante', 40),
(10, ' 1 - Latão', 5),
(11, '3 - Latões', 14),
(12, 'Refrigerante', 5),
(13, 'Guaracamp', 2),
(14, 'Água c/ gás', 3),
(15, 'Água s/ gás', 2);


