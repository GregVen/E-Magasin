 <?php 

 include "../../src/common/template.php";

 ?>
 


 <form class="formulaire" action="../../src/common/dbFonction.php" method="post">
    <h2>Enregistrez-vous</h2>
    <div class="donnees">
        <div class="donneesbis">
            <label for="login">Login</label>
            <input type="text" name="login" placeholder="Votre login">
        </div>    
        <div class="donneesbis">
            <label for="email">Adresse Email</label>
            <input type="email" name="email" placeholder="name@example.com">
        </div>
        <div class="donneesbis">
            <label for="password">Votre mot de passe</label>
            <input type="password"  name="password" placeholder="mot de passe">
        </div>
        <div class="donneesbis">
            <label for="password2">Adresse Email</label>
            <input type="password" name="password2" placeholder="vérification du mot de passe">
        </div>
        <div class="center">
            <button type="submit" title="Valider">Valider</button>
        </div>
    </div>
</form>

<?php

    if(isset($_GET["error"]) && $_GET["error"] == true){
            
    if($_GET["message"] == "mots de passe différents"){
?>

<div class="erreur">
    <h4 style="color:red"><?= $_GET["message"] ?></h4>    
</div>

<?php 
    
    } 
}
