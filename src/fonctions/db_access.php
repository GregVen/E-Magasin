<?php
function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db
    return $bdd;
}