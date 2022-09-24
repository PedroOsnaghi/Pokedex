drop database if exists pokedex;
create database pokedex;
use pokedex;

drop table if exists tipo;
CREATE TABLE tipo(
                     id_tipo int auto_increment primary key,
                     tipo varchar(20),
                     tipo_imagen varchar(100)
);

drop table if exists pokemon;
create table pokemon(
                        id int auto_increment primary key,
                        numero int unique,
                        nombre varchar(20),
                        descripcion text,
                        imagen varchar(20),
                        id_tipo int not null,
                        FOREIGN KEY (id_tipo) REFERENCES tipo(id_tipo)
                        
);


drop table if exists usuario;
create table usuario(
                        id int auto_increment primary key,
                        nombre varchar (20),
                        pwd varchar (40)
		
);

INSERT INTO tipo (tipo, tipo_imagen)
VALUES ('acero', 'acero.jpeg'), -- 2
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

insert into usuario (nombre, pwd)
values('admin', '12345');

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(094,'Gengar',
       'Gengar es un Pokémon de tipo fantasma/veneno introducido en la primera generación. Es la evolución de Haunter y,
       a partir de la sexta generación, puede megaevolucionar en Mega-Gengar. ','Gengar.jpeg',7);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(143,'Snorlax',
       'Snorlax es un Pokémon de tipo normal introducido en la primera generación.
       A partir de la cuarta generación tiene una preevolución llamada Munchlax. ','Snorlax.jpeg',12);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(093,'Haunter',
       'Haunter es un Pokémon de tipo fantasma/veneno introducido en la primera generación. Es la evolución de Gastly. ','Haunter.jpeg',7);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(006,'Charizard',
       'Charizard es un Pokémon de tipo fuego/volador,
       introducido en la primera generación. Es la evolución de Charmeleon y,
       a partir de la sexta generación, puede megaevolucionar en Mega-Charizard X o en Mega-Charizard Y.
       En la Octava generación puede realizar Gigamax y transformarse en Charizard Gigamax.','Charizard.jpeg',8);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(018,'Pidgeot',
       'Pidgeot es un Pokémon del tipo normal/volador introducido en la primera generación.
       Es la forma evolucionada de Pidgeotto.
       A partir de Pokémon Rubí Omega y Pokémon Zafiro Alfa puede megaevolucionar en Mega-Pidgeot.','Pidgeot.jpeg',12);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(149,'Dragonite',
       'Dragonite es un Pokémon de tipo dragón/volador introducido en la primera generación.
       Es la evolución de Dragonair.','Dragonite.jpeg',5);

insert into pokemon (numero,nombre,descripcion,imagen,id_tipo)
values(103,'Exeggutor','Exeggutor es un Pokémon de tipo planta/psíquico introducido en la primera generación.
       Es la forma habitual del Exeggutor de Alola. En ambas variantes, es la evolución de Exeggcute.','Exeggutor.jpeg',13);
