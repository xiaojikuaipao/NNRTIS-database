<?php
require_once('fuc_db_connect.php');
function cansmile_search($can){
    $cansmiles_arr=array();
    $db=db_connect();
    $query='select * from pubchem_info where canonical_smiles like '."'%$can%'".' limit 20';
    $result=$db->query($query);
    $result_num=$result->num_rows;
    if($result_num>0){
        for($a=0;$a<$result_num;$a++){
            $cans=$result->fetch_assoc();
            $pubchem_id=$cans['pubchem_id'];
            $cansmiles_arr[$can][]=$pubchem_id;
}
        return $cansmiles_arr;
}
}
?>
