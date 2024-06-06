create database cadastro;
use cadastro;

create table usuario(
id_usuario int not null auto_increment primary key,
nome varchar(50) not null,
email varchar(100) not null,
data_nascimento date not null,
nick_usuario varchar(50) not null unique,
senha varchar(12) not null unique
);

select * from usuario;
