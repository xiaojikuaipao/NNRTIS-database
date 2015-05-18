
use ligand;
drop table if exists pubchem_info;
create table pubchem_info
(
  pubchem_info_id int(12) NOT NULL,
  pubchem_id int(12) NOT NULL,
  molecular_formula varchar(100) NOT NULL,
  molecular_weight float NOT NULL,
  canonical_smiles varchar(250) NOT NULL,
  isomeric_smiles  varchar(250) NOT NULL,
  inchi varchar(250) NOT NULL,
  inchikey varchar(250) NOT NULL,
  iupac_name varchar(250) NOT NULL,
  xlogp  float  NOT NULL,
  dnonor int(12) NOT NULL,
  accept int(12) NOT NULL,
  roat int(12) NOT NULL,
  constraint pubchem_info primary key(pubchem_info_id)
);


drop table if exists pubchem_name;
create table pubchem_name
(
  pubchem_name_id int(12) NOT NULL,
  pubchem_id int(12) NOT NULL,
  synonyms varchar(250) NOT NULL,
  constraint pubchem_name primary key(pubchem_name_id)
);
