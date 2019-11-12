CREATE DATABASE "academico";
CREATE TABLE "Curso" (
"id" serial,
"nome" varchar(100) NOT NULL,
"area" varchar(100) NOT NULL,
"cargaHoraria" int NOT NULL,
"dataFundacao" date NOT NULL,
CONSTRAINT "CursoPK" PRIMARY KEY ("id"));