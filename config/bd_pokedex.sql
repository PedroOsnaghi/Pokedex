drop database if exists pokedex;
create database pokedex;
use pokedex;

drop table if exists tipo;
CREATE TABLE tipo(
                     id int auto_increment primary key,
                     tipo varchar(20),
                     imagen varchar(100)
);

drop table if exists pokemon;
create table pokemon(
                        id int auto_increment primary key,
                        numero int unique,
                        nombre varchar(20),
                        tipo1 int NOT NULL ,
                        tipo2 int,
                        descripcion text,
                        imagen varchar(20),
                        FOREIGN KEY (tipo1) REFERENCES tipo(id),
                        FOREIGN KEY (tipo2) REFERENCES tipo(id)
);

drop table if exists usuario;
create table usuario(
                        id int auto_increment primary key,
                        nombre varchar (20),
                        contraseña varchar (40),
                        esAdmin int
);



INSERT INTO tipo (tipo, imagen)
VALUES ('sin tipo', NULL), -- 1
       ('acero', 'acero.jpeg'), -- 2
       ('agua', 'agua.jpeg'), -- 3
       ('bicho', 'bicho.jpeg'), -- 4
       ('dragon', 'dragon.jpeg'), -- 5
       ('electrico', 'electrico.jpeg'), -- 6
       ('fantasma', 'fantasma.jpeg'), -- 7
       ('fuego', 'fuego.jpeg'), -- 8
       ('hada', 'hada.jpeg'), -- 9
       ('hielo', 'hielo.jpeg'), -- 10
       ('lucha', 'lucha.jpeg'), -- 11
       ('normal', 'normal.jpeg'), -- 12
       ('planta', 'planta.jpeg'), -- 13
       ('psiquico', 'psiquico.jpeg'), -- 14
       ('roca', 'roca.jpeg'), -- 15
       ('tierra', 'tierra.jpeg'), -- 16
       ('veneno', 'veneno.jpeg'), -- 17
       ('volador', 'volador.jpeg'); -- 18

insert into usuario (nombre, contraseña, esAdmin)
values('admin', md5('admin'), 1);

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(094,'Gengar', 7, 17,
       'Gengar es un Pokémon de tipo fantasma/veneno introducido en la primera generación. Es la evolución de Haunter y,
       a partir de la sexta generación, puede megaevolucionar en Mega-Gengar. ','Gengar.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(143,'Snorlax', 12, 1,
       'Snorlax es un Pokémon de tipo normal introducido en la primera generación.
       A partir de la cuarta generación tiene una preevolución llamada Munchlax. ','Snorlax.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(093,'Haunter', 7, 17,
       'Haunter es un Pokémon de tipo fantasma/veneno introducido en la primera generación. Es la evolución de Gastly. ','Haunter.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(006,'Charizard', 8, 18,
       'Charizard es un Pokémon de tipo fuego/volador,
       introducido en la primera generación. Es la evolución de Charmeleon y,
       a partir de la sexta generación, puede megaevolucionar en Mega-Charizard X o en Mega-Charizard Y.
       En la Octava generación puede realizar Gigamax y transformarse en Charizard Gigamax.','Charizard.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(018,'Pidgeot', 12, 18,
       'Pidgeot es un Pokémon del tipo normal/volador introducido en la primera generación.
       Es la forma evolucionada de Pidgeotto.
       A partir de Pokémon Rubí Omega y Pokémon Zafiro Alfa puede megaevolucionar en Mega-Pidgeot.','Pidgeot.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(149,'Dragonite', 5, 18,
       'Dragonite es un Pokémon de tipo dragón/volador introducido en la primera generación.
       Es la evolución de Dragonair.','Dragonite.jpeg');

insert into pokemon (numero,nombre,tipo1,tipo2,descripcion,imagen)
values(103,'Exeggutor', 13, 14,
       'Exeggutor es un Pokémon de tipo planta/psíquico introducido en la primera generación.
       Es la forma habitual del Exeggutor de Alola. En ambas variantes, es la evolución de Exeggcute.','Exeggutor.jpeg');


