create database votacion;

\c votacion

create table votante (
    nombre varchar(50),
    alias varchar(50),
    rut varchar(15) primary key,
    email varchar (50),
    region varchar(100),
    comuna varchar(100),
    candidato varchar(100),
    procedencia varchar(25)
);

create table region (
    id_region serial primary key,
    region varchar(25)
);

create table comuna (
    id_comuna serial primary key,
    id_region int,
    comuna varchar(25),
    constraint fk_region 
        foreign key(id_region)
            references region(id_region)
);

create table candidato (
    id serial primary key,
    id_region int,
    nombre varchar(100),
    constraint fk_region
        foreign key(id_region)
            references region(id_region)
);


