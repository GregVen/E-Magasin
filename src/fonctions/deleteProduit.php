<?php
session_start();
$idproduit=$_GET["id"];

try{
    require "./db_access.php";
    require "./dbProduitsFonctions.php";
    deleteProduits($idproduit);

    header("location: ../pages/admin.php?page=listeProduits");
    exit;
    

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine(); 
    exit();
} 