<?php

require_once('fuc_db_connect.php');

function target_database($name){
    $synonyms_arr=array();
    $query1='select pubchem_id from ligands where target like'."'%$name%'"." limit 20";
    $db=db_connect();
    $result=$db->query($query1);
    $row_num=$result->num_rows;
    if($row_num>0){
        for($j=0;$j<$row_num;$j++){
            $target=$result->fetch_assoc();
            $pubchem_id=$target['pubchem_id'];
            $target_arr[$name][]=$pubchem_id;
  }
        return $target_arr;
  }
    
}

?>   
