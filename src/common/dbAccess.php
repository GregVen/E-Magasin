<?php

function bdd(){   
    $bdd = new PDO("mysql:host=localhost;dbname=emagasin", "root","");//connexion db
    return $bdd;
}

function insert($login, $email, $password, $ban, $roleId){
    $bdd = bdd();

    $sql = "INSERT INTO users(login,email,password,ban,roleID) VALUES(?,?,?,?,?)";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$login, $email, $password, $ban, $roleId]);//execution de la requete
}