<?php
session_start();
$idcategorie=$_GET["id"];

echo getcwd();
try{
    require "../fonctions/db_access.php";
    require "../fonctions/dbCategorieFonctions.php";
    
    deleteCategory($idcategorie);

    header("location: ../pages/admin.php?page=categorieProduit");
    exit;
    

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
} 