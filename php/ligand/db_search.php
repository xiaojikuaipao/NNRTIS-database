<?php

require_once('fuc_db_connect.php');
require_once('fuc_synonyms_search.php');
require_once('fuc_cansmile_search.php');
require_once('fuc_pubchemid_search.php');

$ligand=$_POST["compound"];
$ligand=trim($ligand);

$name_arr=synonyms_database($ligand);
$pubchem_id1=$name_arr[$ligand];
$pubchem_info1=pubchemid_search($pubchem_id1);

$can_arr=cansmile_search($ligand);
$pubchem_id2=$can_arr[$ligand];
$pubchem_info2=pubchemid_search($pubchem_id2);

if(!empty($pubchem_info1)){
    $pubchem_info=$pubchem_info1;
    $pubchem_id=$pubchem_id1;
}

if(!empty($pubchem_info2)){
    $pubchem_info=$pubchem_info2;
    $pubchem_id=$pubchem_id2;
}

$synonyms=$pubchem_info['synonyms'];
$molecular_formula=$pubchem_info['molecular_formula'];
$molecular_weight=$pubchem_info['molecular_weight'];
$canonical_smiles=$pubchem_info['canonical_smiles'];
$isomeric_smiles=$pubchem_info['isomeric_smiles'];
$inchi=$pubchem_info['inchi'];
$inchikey=$pubchem_info['inchikey'];
$iupac_name=$pubchem_info['iupac_name'];
$xlog=$pubchem_info['xlogp'];
$dnonor=$pubchem_info['dnonor'];
$accept=$pubchem_info['accept'];
$roat=$pubchem_info['roat'];
$bindingdb_id=$pubchem_info['bindingdb_id'];
$target=$pubchem_info['target'];
$pdb=$pubchem_info['pdb'];
$pdb_info=implode(",",$pdb);
$ic50=$pubchem_info['ic50'];
$pubmed=$pubchem_info['pubmed'];
$info=$pubchem_info['info'];

echo "<table border=1>";
echo "<tr>";
echo "<th> molecule structure </th>";
echo "<th> target </th>";
echo "<th> pdb_id </th>";
echo "<th> IC50 </th>";
echo "<th> Pubmed </th>";
echo "</tr>";
#echo "<td><img src=../../images/pubchemid/"."$pubchem_id".".png"." /></td>";
foreach($info as $info_value){
    $info_arr=explode("\t",$info_value);
    $target=$info_arr[1];
    $ic50=$info_arr[2];
    $pubmed=$info_arr[3];
    if($ic50!="n/a"){
        echo "<tr>";
        echo "<td width=15%><img src=../../images/pubchemid/"."$pubchem_id".".png"." /></td>";
        echo "<td width=15% >".$target."</td>";
        echo "<td width=15% style=word-break:break-all>".$pdb_info."</td>";
        echo "<td width=15% >".$ic50."</td>";
        echo "<td width=15%>".$pubmed."</td>";
        echo "</tr>";

}
}
echo "</table>";

?>
