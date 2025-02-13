create database libreria;
use libreria;
SET SQL_SAFE_UPDATES = 0;
drop table libro;
create table libro(
isbn varchar(15) primary key not null,
titulo varchar(50) not null,
autor varchar(30) not null,
editorial varchar(30) not null,
genero varchar(30) not null,
precio varchar(10) not null,
stock varchar(6) not null
);
select * from libro;
DELETE FROM libro
WHERE isbn = '9786073155380';
INSERT INTO libro (isbn, titulo, autor, editorial,genero, precio, stock) 
VALUES 
('9786073911023','Metro 2034','Dmitry Glukhovsky','Minotauro','Ciencia Ficcion','398','10'),
('9788437604183','Pedro Páramo','Juan Rulfo','Cátedra','ficcion','220','20'),
('9786075696690','La psicología del dinero','Morgan Housel','Paidos México','Autoayuda','349','2'),
('9786073847155','Amor al prójimo','Gabriela Enríquez','Random House','Melodrama','249','90'),
('9786073911344','La ciudad y sus muros inciertos','Haruki Murakami','Tusquets México','Fantastica','428','32'),
('9786073846462','Manual del español incorrecto','Adrián Chávez','Aguilar','Autoayuda','249','16'),
('9786073840804','La silla embrujada','Alejandro Rosas','Grijalbo','Historia','389','50');

create table usuario(
numero int(11) primary key NOT NULL auto_increment,
usuario varchar(30) not null,
contraseña varchar (8) not null
);
INSERT INTO usuario (usuario,contraseña) 
VALUES 
('admin','1234'),
('empleado','5678');

