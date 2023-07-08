create database TiendaMM;

use TiendaMM;

create table perfil
(codigo int auto_increment primary key, descripcion varchar(60) not null);

create table usuarios
(id_usr int auto_increment primary key, 
usr_log varchar(60) not null,
usr_pass varchar (20) not null,
perfil int not null,
fech_creacion datetime null,
foreign key (perfil) references perfil(codigo));

create table producto
(id_producto int auto_increment primary key, 
descripcion varchar(120) not null, 
usuario int not null,
fec_creacion datetime null,
valor numeric(12,0) not null,
foreign key (usuario) references usuarios (id_usr)
);