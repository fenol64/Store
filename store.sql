create database store;
use store;

create table if not exists users (
	id int(11) auto_increment primary key,
    email varchar(45) not null,
    senha char(32) not null default '123',
    condicao tinyint(1) not null default 1
);

insert into users values 
(default, 'admin@admin.com', 'admin', 0),
(default, 'employee@batatadocheffi.com', 'employee', 1);

create table if not exists isopened (
	id_isopened int(11) auto_increment primary key,
    time_inicial timestamp not null default current_timestamp,
    time_final timestamp not null default '1970-01-01 00:00:01',
    status varchar(7) default "aberto"
);


create table if not exists products (
	id_product int(11) auto_increment primary key,
    name_product varchar(40) not null default "none",
    value_product float not null default 0.00
);

 create table if not exists orders(
	id_order varchar(6) not null,
	id int(11) auto_increment primary key,
    total float not null default 0.00,
    day_inserted varchar(11) not null default '',
    status varchar(10) not null default 'pendente'
 );


 create table if not exists orderbody(
	id int(11) auto_increment primary key,
    id_order varchar(6) not null,
    name_product varchar(40) not null default 'none',
    value_product float not null default 0.00,
    status_order varchar(10) not null default 'pendente'
 );
 
  create table if not exists payment(
	id int(11) auto_increment primary key,
    id_order varchar(6) not null,
	method varchar(15) not null default 'dinheiro',
    value_paid float not null default 0.00
 );
