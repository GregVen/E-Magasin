<?php session_start();

if(!empty($_GET['id'])){
    $_SESSION["category_id"]=$id_role=$_GET["id"];
    }
    
    require "../../../common/dbCategorieFonctions.php";
    
    if(isset($_GET["id"])){    
        $resultat = viewUpDateCategorie($_GET["id"]);
        $typeProduct = $resultat->typeProduct;
    }

?>


<form action="./modifCatScript.php" method="post">
    <h3>Modification d'une catégorie</h3>
    <div class="field columns is-mobile mt-6">
        <div class="column is-half is-offset-one-quarter">
        <label class="label">Catégorie à modifier:</label>
            <div class="control has-icons-left has-icons-right mt-5">
                <input class="input form-control" type="text" placeholder="Catégorie" name="categorie" value="<?php if(!empty($typeProduct)){echo $typeProduct;}else{echo "";} ?>" required>
            </div>
        </div>
    </div>

    <div class="field columns is-mobile mt-5" >
        <div class="column is-half is-offset-one-quarter">
            <button type="submit" title="Valider" class="button is-fullwidth is-info is-outlined">Valider</button>
        </div>
    </div>
</form>