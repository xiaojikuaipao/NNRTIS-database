<?php

function db_connect(){
    $db=new mysqli('127.0.0.1','ligand','ligand','ligand');
    if(!$db){
        throw new Exception('Could not connect to database server');
        exit;
}
    else {
        return $db;
     }

}


?>
