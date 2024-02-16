

-- CREATE DATABASE y CREATE TABLE
create database holamundo;
show databases;
use holamundo;
create table animales (
id int,
tipo varchar(255),
estado varchar(255),
PRIMARY KEY (id)
);
-- CREATE DATABASE, CREATE TABLE


-- INSERT, ALTER TABLE y SHOW CREATE TABLE
-- insert into animales (tipo, estado) values ('Chanchito', 'Feliz');
-- esta linea no sera ejecutada
ALTER TABLE animales modify column id int auto_increment;

show create table animales;

CREATE TABLE `animales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

insert into animales (tipo, estado) values ('Chanchito', 'Feliz');
insert into animales (tipo, estado) values ('Dragon', 'Feliz');
insert into animales (tipo, estado) values ('Felipe', 'Triste');
-- INSERT, ALTER TABLE y SHOW CREATE TABLE


-- SELECT, UPDATE y DELETE
select * from animales;
select * from animales where id = 1;
select * from animales where estado = 'feliz' and tipo = 'chanchito';

Update animales set estado = 'Feliz' where id=4;

Select * from animales;

delete from animales where estado = 'feliz'; -- error

delete from animales where id = '2';

Select * from animales;

update animales set estado = 'trsite' where tipo = 'dragon'; -- error
-- Si se intenta usar update o delete sin una id, aparecera el error 1175
-- SELECT, UPDATE y DELETE


-- Condiciones en profundidad

create table user (
id int not null auto_increment,
name varchar(50) not null,
edad int not null,
email varchar(100) not null,
primary key (id)
);

insert into user (name, edad, email) values ('Oscar', 25, 'oscar@gmail.com');
insert into user (name, edad, email) values ('Layla', 15, 'layla@gmail.com');
insert into user (name, edad, email) values ('Nicolas', 36, 'nico@gmail.com');
insert into user (name, edad, email) values ('Chanchito', 7, 'chanchito@gmail.com');

select * from user;
select * from user limit 1;
select * from user where edad > 15;
select * from user where edad >= 15;
select * from user where edad > 20 and email = 'nico@gmail.com';
select * from user where edad > 20 or email = 'layla@gmail.com';
select * from user where email != 'layla@gmail.com';
select * from user where edad between 15 and 30;
select * from user where edad like '%gmail%';
select * from user where edad like '%gmail';
select * from user where edad like 'oscar%';

select * from user order by edad asc;
select * from user order by edad desc;

select max(edad) as mayor from user;
select max(edad) as menor from user;
-- Condiciones en profundidad


-- Seleccionando columnas
select id, name from user;
select id, name as nombre from user;
-- Seleccionando columnas


-- Left join
-- 02
-- Left join


-- Right join e inner join
-- 02
-- Right join e inner join


-- Cross join
-- 02
-- Cross join


-- Group by, having y drop table
-- 02
-- Group by, having y drop table


-- Cardinalidad
-- video
-- Cardinalidad


-- Como hacer diagramas de entidad-relacion
-- video
-- Como hacer diagramas de entidad-relacion