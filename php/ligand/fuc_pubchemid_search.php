<?php

require_once('fuc_db_connect.php');
function pubchemid_search($pubchemid){
    $pubchem_information=array();
    $db=db_connect();
    $query_ligand="select * from ligands where pubchem_id="."'$pubchemid'".'and ic50!='."'n/a'".' limit 1';
    $query_pdb="select * from pdb where pubchem_id="."'$pubchemid'".'limit 15';
    $query_info='select * from pubchem_info where pubchem_id='."'$pubchemid'";
    $query_name='select * from pubchem_name where pubchem_id='."'$pubchemid'".'limit 5';
    $ligand_results=$db->query($query_ligand);
    $pdb_results=$db->query($query_pdb);
    $info_results=$db->query($query_info);
    $name_results=$db->query($query_name);
    $ligand_num=$ligand_results->num_rows;
    $pdb_num=$pdb_results->num_rows;
    $info_num=$info_results->num_rows;
    $name_num=$name_results->num_rows;
    if(($ligand_num>0)&&($pdb_num>0)&&($info_num>0)){
        for($j=0;$j<$ligand_num;$j++){
            $ligand_arr=$ligand_results->fetch_assoc();
            $pubchem_information['bindingdb_id']=$ligand_arr['bindingdb_id'];
            $pubchem_information['target']=$ligand_arr['target'];
            $pubchem_information['ic50']=$ligand_arr['ic50'];
            $pubchem_information['pubmed']=$ligand_arr['pubmed'];
            $pubchem_information['info']=$pubchem_information['bindingdb_id']."\t".$pubchem_information['target']."\t".$pubchem_information['ic50']."\t".$pubchem_information['pubmed'];

   }
        for($i=0;$i<$pdb_num;$i++){
            $pdb_arr=$pdb_results->fetch_assoc();
            $pubchem_information['pdb'][]=$pdb_arr['pdb_code'];
  }
        for($a=0;$a<$info_num;$a++){
            $info_arr=$info_results->fetch_assoc();
            $pubchem_information['molecular_formula']=$info_arr['molecular_formula'];
            $pubchem_information['molecular_weight']=$info_arr['molecular_weight'];
            $pubchem_information['canonical_smiles']=$info_arr['canonical_smiles'];
            $pubchem_information['isomeric_smiles']=$info_arr['isomeric_smiles'];
            $pubchem_information['inchi']=$info_arr['inchi'];
            $pubchem_information['inchikey']=$info_arr['inchikey'];
            $pubchem_information['iupac_name']=$info_arr['iupac_name'];
            $pubchem_information['xlogp']=$info_arr['xlogp'];
            $pubchem_information['dnonor']=$info_arr['dnonor'];
            $pubchem_information['accept']=$info_arr['accept'];
            $pubchem_information['roat']=$info_arr['roat'];
  }
        if($name_num>0){
            for($b=0;$b<$name_num;$b++){
                $name_arr=$name_results->fetch_assoc();
                $pubchem_information['synonyms'][]=$name_arr['synonyms'];
       
     }   
    }

}
    return $pubchem_information;
}
?>
