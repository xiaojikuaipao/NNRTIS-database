<?php
$queryitem=$_POST['content'];
$queryitem=trim($queryitem);

if(!$queryitem ){
	echo "You have not entered search details.";
	exit;
}


@ $db=new mysqli('127.0.0.1','mysql','mysql','moleculedatabase');

if (mysqli_connect_errno()){
	echo'Error:Could not connect to database. Please try again later.';
	exit;
}


if (!get_magic_quotes_gpc()){
	$queryitem=addslashes($queryitem);
}

$query1="select *  from targets where targets.targetname like '%".$queryitem."%'";
$result1=$db -> query($query1);


$num_result1=$result1->num_rows;

for ($i=0;$i<$num_result1;$i++){
	$row_result1=$result1->fetch_assoc();

	$targetid=stripslashes($row_result1['target_id']);

	$query1all="select * from  targets,taractlink,activities,ligactlink,ligands,ligcitlink,citations where citations.citation_id=ligcitlink.citation_id and ligcitlink.ligand_id=ligands.ligand_id and ligands.ligand_id=ligactlink.ligand_id and ligactlink.activity_id=activities.activity_id and activities.activity_id=taractlink.activity_id and taractlink.target_id=targets.target_id  and targets.target_id = '$targetid' ";

	$result1all=$db -> query($query1all);


	$row_results1all=$result1all->fetch_assoc();
	echo "<p><strong>" . ($i+1) . ".TargetName: ";
	echo htmlspecialchars(stripslashes($row_results1all['targetname']));
	echo "</strong><br />Ligandname: ";
	echo stripslashes($row_results1all['ligandname']);
	echo "<br />Canonicalsmiles: ";
	echo stripslashes($row_results1all['cansmil']);
	echo "<br />BindingID: ";
	echo stripslashes($row_results1all['bindingdb_id']);
	echo "<br />PubchemID: ";
	echo stripslashes($row_results1all['pubchem_id']);
	echo "<br />IC50: ";
	echo stripslashes($row_results1all['ic50']);
	echo "<br />EC50: ";
	echo stripslashes($row_results1all['ec50']);
	echo "<br />KI: ";
	echo stripslashes($row_results1all['ki']);
	echo "<br />KD: ";
	echo stripslashes($row_results1all['kd']);
	echo "<br />PubmedID: ";
	echo stripslashes($row_results1all['pubmedid']);
	echo "</p>";
}

$query2="select * from ligands where ligands.ligandname like '%".$queryitem."%'";

$result2=$db -> query($query2);

$num_result2=$result2->num_rows;


for ($i=0;$i<$num_result2;$i++){

	$row_result2=$result2->fetch_assoc();

	$ligandid=stripslashes($row_result2['ligand_id']);

	$query2all="select * from targets,taractlink,activities,ligactlink,ligands,ligcitlink,citations where citations.citation_id=ligcitlink.citation_id and ligcitlink.ligand_id=ligands.ligand_id and ligands.ligand_id=ligactlink.ligand_id and  ligands.ligand_id ='$ligandid' and ligactlink.activity_id=activities.activity_id and activities.activity_id=taractlink.activity_id and taractlink.target_id=targets.target_id ";

	$result2all=$db->query($query2all);

	$row_results2all=$result2all->fetch_assoc();
	echo "<p><strong>" . ($i+1) .".TargetName: ";
	echo htmlspecialchars(stripslashes($row_results2all['targetname']));
	echo "</strong><br />Ligandname: ";
	echo stripslashes($row_results2all['ligandname']);
	echo "<br />Canonicalsmiles: ";
	echo stripslashes($row_results2all['cansmil']);
	echo "<br />BindingID: ";
	echo stripslashes($row_results2all['bindingdb_id']);
	echo "<br />PubchemID: ";
	echo stripslashes($row_results2all['pubchem_id']);
	echo "<br />IC50: ";
	echo stripslashes($row_results2all['ic50']);
	echo "<br />KI: ";
	echo stripslashes($row_results2all['ki']);
	echo "<br />KD: ";
	echo stripslashes($row_results2all['kd']);
	echo "<br />PubmedID: ";
	echo stripslashes($row_results2all['pubmedid']);
	echo "</p>";

}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"
>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <title>Active Database</title>
        <link rel="stylesheet" type="text/css" href="homepage.css">
</head>
<body id="homepage">
        <div id="outer_wrap">
                <div id="header">
                        <div class="h1t"><h1 class="hivdata"><strong>Active Database</strong></h1></div>
                </div>
        </div>
        <div id="content_wrap">
                <ul class="dirct">
                        <li class="homepage"><a href="hiv.html"><span class="rarrow"></span>HomePage</a></li>
                        <li class="targetpage"><a href="target.html"><span class="rarrow"></span>Target</a></li>
                        <li class="compound"><a href="compound.html"><span class="rarrow"></span>Compound</a></li>
                        <li class="Docking"><a href="docking.html"><span class="rarrow"></span>Docking</a></li><br >
                <ul>
	</div>
	</div>














	<div id="footer">
                <div></div> 
                <p class="exlink">link</p>
                <ul class="outlink">
                        <li class="GZUCM"><a href="http://www.gzhtcm.edu.cn">Guangzhou University of Chinese Medicine</a></li>
                        <li class="RCDD"><a href="http://rcdd.sysu.edu.cn">RCDD</a></li>
                        <li class="Binding"><a href="http://www.bindingdb.org/bind">The Binding Database</a></li>
                        <li class="pdb"><a href="http://www.rcsb.org/pdb/home/home.do">RCSB PDB</a></li>
                </ul>
                <p class="cr">Copyright &copy;<strong>Active Database</strong>All rights reserved!</p>

        </div>







</body>
</html>
