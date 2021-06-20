
<?php
// if(isset($_FILES['fichier']))
// { 
//      $dossier = '../../../img/produits/';
//      $fichier = basename($_FILES['fichier']['name']);
//      if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
//      {
//           echo 'Upload effectué avec succès !';
//      }
//      else //Sinon (la fonction renvoie FALSE).
//      {
//           echo 'Echec de l\'upload !';
//           var_dump($_FILES['fichier']);
//      }
// }
// if (is_uploaded_file($_FILES['fichier']['tmp_name'])) {
//     echo "File ". $_FILES['fichier']['name'] ." téléchargé avec succès.\n";
//     echo "Affichage du contenu\n";
//     readfile($_FILES['fichier']['tmp_name']);
//  } else {
//     echo "Attaque possible par téléchargement de fichier : ";
//     echo "Nom du fichier : '". $_FILES['fichier']['tmp_name'] . "'.";

//  }

 if(isset($_FILES["fichier"]) && $_FILES["fichier"]["error"] == 0){
    if($_FILES["fichier"]["size"] <= 1000000000){
     
        $extensionArray = ["png", "gif", "jpg", "JPEG", "jfif", "jpeg"]; //extension a vérifier dans tableau

        // on prend toutes les informations du fichier grâce à la fonction pathinfo()
        // qui aura pour paramètres le nom de notre fichier:
        $infoFichier = pathinfo($_FILES["fichier"]["name"]);
       
        // on récupére l'extension du fichier qui a été envoyé
        $extensionImage = $infoFichier["extension"];
        /*var_dump($extensionImage);*/

        // On vérifie si l'extension du fichier envoyé est une extension autorisée
        if(in_array($extensionImage, $extensionArray)){
            // variable qui contiendra la chaîne de caractère du repertoire dans lequel l'upload
            // sera enregistré, avec modif du nom du fichier pour éviter un doublon
            $destination = "../../../img/produits/" . time() . "-". basename($_FILES["fichier"]["name"]);
            move_uploaded_file($_FILES["fichier"]["tmp_name"], $destination);
            echo "<div class=\"imageloaded\" ><p class=\"textreussi\">Envoi du fichier " . $_FILES["fichier"]["name"] . " réussi !!!</p>";
            echo "<img class=\"imagefull\" src=\"uploads/" . time() . "-". basename($_FILES["fichier"]["name"])."\"></div>";
            
        }
    }
    if ($_FILES["fichier"]["size"] > 1000000000){
        /*var_dump($_FILES);*/
    echo "<script>alert(\"Le fichier est supérieur à 10Mo, recommencez\")</script>";
    }
}