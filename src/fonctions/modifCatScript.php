<?php
session_start();
$typeProduct=htmlspecialchars($_POST["categorie"]);
$category_id=$_SESSION["category_id"];
 
require "../fonctions/db_access.php";
require "../fonctions/dbCategorieFonctions.php";

try{
    echo "ok";
    update_categorie($typeProduct,$category_id); 
    echo "ok";

    header('location: ../pages/admin.php?page=categorieProduit');
    exit;

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}