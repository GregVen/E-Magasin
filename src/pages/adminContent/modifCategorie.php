<?php 
if(!empty($_GET['id'])){
    $_SESSION["category_id"]=$id_role=$_GET["id"];
    }
    
    require "../fonctions/db_access.php";
    require "../fonctions/dbCategorieFonctions.php";
    
    if(isset($_GET["id"])){    
        $resultat = viewUpDateCategorie($_GET["id"]);
        $typeProduct = $resultat->typeProduct;
    }


?>
 
<form action="../fonctions/modifCatScript.php" method="post">

    <div class="text-center mt-3">
        <h2>Modification d'une catégorie</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class=" col input-group mb-3">
                <label class="input-group-text"  id="basic-addon3">Catégorie à modifier</label>
                <input type="text" class="form-control" aria-describedby="basic-addon3" name="categorie" placeholder="Catégorie" value="<?php if(!empty($typeProduct)){echo $typeProduct;}else{echo "";} ?>" required>
            </div>
            <div class=" col input-group mb-3">
                <button class="btn btn-secondary" type="submit" title="Valider" >Valider</button>
            </div>
        </div>
    </div>

</form>
