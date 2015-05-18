<?php

require_once('fuc_db_connect.php');

function synonyms_database($name){
    $synonyms_arr=array();
    $query1='select pubchem_id from pubchem_name where synonyms like'."'%$name%'"." limit 20";
    $db=db_connect();
    $result=$db->query($query1);
    $row_num=$result->num_rows;
    if($row_num>0){
        for($j=0;$j<$row_num;$j++){
            $synonyms=$result->fetch_assoc();
            $pubchem_id=$synonyms['pubchem_id'];
            $synonyms_arr[$name][]=$pubchem_id;
  }
        return $synonyms_arr;
  }
    
}

?>   
