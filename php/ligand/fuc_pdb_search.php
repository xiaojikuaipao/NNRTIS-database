<?php

require_once('fuc_db_connect.php');

function pdb_database($name){
    $synonyms_arr=array();
    $query1='select pubchem_id from pdb where pdb_code like'."'%$name%'"." limit 20";
    $db=db_connect();
    $result=$db->query($query1);
    $row_num=$result->num_rows;
    if($row_num>0){
        for($j=0;$j<$row_num;$j++){
            $pdb=$result->fetch_assoc();
            $pubchem_id=$pdb['pubchem_id'];
            $pdb_arr[$name][]=$pubchem_id;
  }
        return $pdb_arr;
  }
    
}

?>   
