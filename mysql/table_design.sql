
drop database if exists ligand;
create database ligand;
grant insert,delete,select,drop,delete,create,update,index,alter on ligand.* to ligand identified by 'ligand';

use  ligand;
drop table if exists ligands;
create table ligands
(
  ligand_id int(12) NOT NULL,
  ligand_name varchar(100) NOT NULL,
  bindingdb_id varchar(100) NOT NULL,
  pubchem_id varchar(100) NOT NULL,
  can varchar(250) NOT NULL,
  target varchar(100) NOT NULL,
  ic50  varchar(100) NOT NULL,
  pubmed varchar(100) NOT NULL,
  constraint ligands primary key(ligand_id)
);


drop table if exists pdb;
create table pdb
(
  pdb_id int(12) NOT NULL,
  pubchem_id int(12) NOT NULL,
  pdb_code varchar(100) NOT NULL,
  constraint pdb primary key(pdb_id)

);
