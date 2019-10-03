drop database if exists gestionstage;
create database if not exists gestionstage;
use gestionstage ;
create table filiere(
    idfiliere int(4)auto_increment primary key ,
    nomfiliere varchar(50),
    niveau varchar(50)
                    );
create  table stagiaire(
     idstagiaire int(4)auto_increment primary key ,
     nom varchar(50),
     prenom varchar(50),
     civilite varchar(1),
     photo varchar(100),
    idfiliere int(4) 
    
);
create table utilisateur(
  idutilisateur int(4)auto_increment primary key ,
  login varchar(50),
    email varchar( 255),
     role varchar(50),
    etat int(1),
    pwd varchar(255)  
);
alter table stagiaire add constraint foreign key(idfiliere) references filiere (idfiliere);
insert into  filiere (nomfiliere , niveau) values
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC');
insert into  filiere (nomfiliere , niveau) values
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC'),
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC'),
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC');
insert into  filiere (nomfiliere , niveau) values
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC');
insert into  filiere (nomfiliere , niveau) values
('Technique de management','TC'),
('Génie informatique','TC'),
('CHIMIE','TC'),
('BIOLOGIE','TC'),
('TSGE','TC'),
('CYCLE d ingénieur','TC');
insert into utilisateur (login,email,role, etat ,pwd) values 
('admin1','elmajnikhaoula@gmail.com','admin1',1,md5('123')),
('admin2','sokainadaabal@gmail.com','admin2',1,md5('123')),
('user1','elmajnikhaoula@gmail.com','visiteur',0,md5('123'));
insert into stagiaire (nom,prenom,civilite, photo ,idfiliere) values 
('elmajni','khaoula','F','Chrysanthème.jpg',1),
('daabal','sokaina','F','Dèsert.JPG',2),
('choukairi','ahmed','M','Hortensias.JPG',3),
('lafrayhi','yassine','M','Mèduses.JPG',4);
select * from filiere ;
select * from stagiaire ;
select * from utilisateur ;
