<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HIV-1 Reverse transcriptase</title>
    <!-- Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/db_php_search.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid"`>
      <div class="header">
        <div class="col-md-12">
          <div class="bar-title">
            <p class="bg-primary">HIV-1 Reverse Transcriptase DataBase</p>
            <a href="../../html/index.html"> Home Page </a> 
          </div>
        </div>
      </div>
    </div>  
  </body>
</html>

<?php

require_once('fuc_db_connect.php');
require_once('fuc_cansmile_search.php');
require_once('fuc_pubchemid_search.php');
echo "<p id=table-title> The search results for HIV-1 Reverse transcriptase Database </p>";
echo "<table border=1>";
echo "<tr>";
echo "<th> molecule structure </th>";
echo "<th> stucture property";
echo "<th> target </th>";
echo "<th> pdb_id </th>";
echo "<th> IC50(nm) </th>";
echo "<th> citation</th>";
echo "</tr>";

$ligand=$_POST["compound"];
$ligand=trim($ligand);
$can_arr=cansmile_search($ligand);
$pubchem_id_arr=$can_arr[$ligand];
$pubchem_id_arr=array_unique($pubchem_id_arr);
foreach($pubchem_id_arr as $pubchem_id){
    $pubchem_info=pubchemid_search($pubchem_id);
    if(!empty($pubchem_info)){
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

#echo "<td><img src=../../images/pubchemid/"."$pubchem_id".".png"." /></td>";
        $info_arr=explode("\t",$info);
        $target=$info_arr[1];
        $ic50=$info_arr[2];
        $pubmed=$info_arr[3];
        echo "<tr>";
        echo "<td width=15%><img src=../../images/pubchemid/"."$pubchem_id".".png"." /></td>";
        echo "<td width=15%>molecular_formula:".$molecular_formula."</br>"."molecular_weight:".$molecular_weight.
              "</br>"."xlogp:".$xlog."</br>"."dnonor:".$dnonor."</br>"."accept:".$accept."</br>"."roat:".$roat."</br>".
              "</td>";
        echo "<td width=15% >".$target."</td>";
        echo "<td width=15% style=word-break:break-all>".$pdb_info."</td>";
        echo "<td width=15% >".$ic50."</td>";
        echo "<td width=15%>"."pubchemid:".$pubchem_id."</br>".$bindingdb_id."</br>"."pubmed_id:".
              $pubmed."</br>"."</td>";
        echo "</tr>";

}

}

echo "</table>";

?>
