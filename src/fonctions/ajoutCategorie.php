<?php
// var_dump($_POST);
session_start();
$categorie=htmlspecialchars($_POST["categorie"]);

    require "../fonctions/db_access.php";
    require "../fonctions/dbCategorieFonctions.php";

try{
   


    nouvelleCategory($categorie); 

    header("location: ../pages/admin.php?page=categorieProduit");
    exit;

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}
