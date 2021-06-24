<?php

function sendImg($img){

    if(isset($img) && $img["error"] == 0){
        if($img["size"] <= 1000000000){
         
            $extensionArray = ["png", "gif", "jpg", "JPEG", "jfif", "jpeg"]; //extension a vérifier dans tableau
    
            // on prend toutes les informations du fichier grâce à la fonction pathinfo()
            // qui aura pour paramètres le nom de notre fichier:
            $infoFichier = pathinfo($img["name"]);
           
            // on récupére l'extension du fichier qui a été envoyé
            $extensionImage = $infoFichier["extension"];
            /*var_dump($extensionImage);*/
    
            // On vérifie si l'extension du fichier envoyé est une extension autorisée
            if(in_array($extensionImage, $extensionArray)){
                // variable qui contiendra la chaîne de caractère du repertoire dans lequel l'upload
                // sera enregistré, avec modif du nom du fichier pour éviter un doublon
                $destination = "../img/produits/" . time() . "-". basename($img["name"]);
                $destinationdb = str_replace("..", "./src", $destination);
                move_uploaded_file($img["tmp_name"], $destination);
                echo "<div class=\"imageloaded\" ><p class=\"textreussi\">Envoi du fichier " . $img["name"] . " réussi !!!</p>";
                echo "<img class=\"imagefull\" src=\"uploads/" . time() . "-". basename($img["name"])."\"></div>";
                
            }
        }
        if ($img["size"] > 1000000000){
            /*var_dump($_FILES);*/
        echo "<script>alert(\"Le fichier est supérieur à 10Mo, recommencez\")</script>";
        }
    }
    return $destinationdb;

}