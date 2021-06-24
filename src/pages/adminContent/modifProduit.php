<?php 
// $style = "../../../../src/css/style.css";

require "../fonctions/db_access.php";
require "../fonctions/dbCategorieFonctions.php";

// require "../../common/dbCategorieFonctions.php";

// function modifProduct($id){
//     $bdd = bdd();
//     $sql = "SELECT * FROM product
//     inner join fichetechnique
//     on product.productIdINT = fichetechnique.productId
//     inner join category
//     on product.categoryID = category.categoryId
//     where product.productIdINT = $id";//requete

//     $stmt = $bdd->prepare($sql);//preparation de la requete
//     $stmt->execute();//execution de la requete

//     // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
//     $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
//     return $result;

// }

$idproduit = $_GET["id"];
$resultat=modifProduct($idproduit);

$nom = $resultat->productName;
$categoryID = $resultat->categoryID;
$typeProduct = $resultat->typeProduct;
$description = $resultat->description;
$prix = $resultat->prix;
$tailleMemoire = $resultat->tailleMemoire;
$processeur = $resultat->processeur;
$processeurFab = $resultat->processeurFab;
$CG = $resultat->carteGraphique;
$resolution = $resultat->resolutionEcran;
$tailleEcran = $resultat->tailleEcran;
$typeHdd = $resultat->typeHdd;
$tailleHdd = $resultat->tailleHdd;
$poids = $resultat->poids;
$OS = $resultat->OS;

$_SESSION["productID"] = $productid = $resultat->productId;

?>



<form action="../fonctions/modifproduit.php" method="post" enctype="multipart/form-data">
    <div class=" container text-center mt-3">
        <div class="row">
            <div class="col">
                <h2>Nouveau Produit</h2>
            </div>
            <div class=" col input-group mb-3">
                <label class="input-group-text" id="basic-addon3">Prix</label>
                <input type="text"  class="form-control text-danger" aria-describedby="basic-addon3" name="prix" placeholder="PRIX" value = "<?php echo $prix ?>" required>
                <span class="input-group-text">€</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-5">
                <div class="row justify-content-evenly">
                    <div class=" col input-group mb-3">
                        <label class="input-group-text"  id="basic-addon3">Nom du Produit</label>
                        <input type="text" class="form-control" aria-describedby="basic-addon3" name="productName" placeholder="Nom du Produit" value = "<?php echo $nom ?>" required>
                    </div>
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Mettre "On Top" ?</label>
                        <select class="custom-select" id="inputGroupSelect01"  name="onTop" required>
                            <?php if ($categorie = 1){?>
                                <option value="0">NON</option>
                                <option value="1" selected>OUI</option>
                            <?php }
                                if ($categorie = 0){?>
                                <option value="0" selected>NON</option>
                                <option value="1">OUI</option>
                            <?php } ?>
                        </select>
                    </div>
                    
                </div>

                <div class="input-group mb-3"> 
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    <select class="form-select" id="inputGroupSelect01" name="categoryID" required>
                        <option selected value="<?php echo $categoryID ?>"><?php echo $typeProduct ?></option>
                            <?php foreach(recupListeCategories() as $value): ?>
                                    <option value="<?php echo $value->categoryId ?>"><?php echo $value->typeProduct ?></option>
                            <?php endforeach ?>
                    </select>
                </div>

                <div  class="mb-3">
                    <h6>UPLOADER un fichier</h6>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                    <input class="form-control" type="file" id="formFile" name="fichier" required>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Description" rows="5" name="description" required ><?php echo $description ?></textarea>
                </div>

            </div>
            <div class="col-5">
                <div>
                    <h5>Caractéristiques Techniques</h5>
                </div>  
                <div class="row justify-content-evenly">  
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille Memoire</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleMemoire" placeholder="en Go" value = "<?php echo $tailleMemoire ?>">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3"> Processeur</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="processeur" placeholder="Processeur" value = "<?php echo $processeur ?>">
                    </div>
                    
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Fabriquant du Processeur</label>
                    <input type="text"  class="form-control" aria-describedby="basic-addon3" name="processeurFab" placeholder="Fabriquant du Processeur" value = "<?php echo $processeurFab ?>">
                </div>
                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Carte Graphique</label>
                    <input type="text"  class="form-control" aria-describedby="basic-addon3" name="carteGraphique" placeholder="Carte Graphique" value = "<?php echo $CG ?>" >
                </div>

                <div class="row justify-content-evenly">
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille d'Ecran</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleEcran" placeholder="Taille d'Ecran" value = "<?php echo $tailleEcran ?>" >
                    </div>
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Résolution</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="resolutionEcran" placeholder="Résolution" value = "<?php echo $resolution ?>">
                    </div>
                </div>
                <div class="row justify-content-evenly" >  
                    <div class=" col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Type de disque</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="typeHDD" placeholder="Type de disque" value = "<?php echo $typeHdd ?>">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Taille du Disque</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="tailleHDD" placeholder="En Go" value = "<?php echo $tailleMemoire ?>">
                    </div>
                </div>
                <div class="row justify-content-evenly">
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">Poids</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="poids" placeholder="En Kg" value = "<?php echo $poids ?>">
                    </div>
                    <div class="col input-group mb-3">
                        <label class="input-group-text" id="basic-addon3">OS</label>
                        <input type="text"  class="form-control" aria-describedby="basic-addon3" name="OS" placeholder="OS" value = "<?php echo $OS ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-3">
        <button type="submit" class="btn btn-secondary btn-lg btn-block" title="Valider">Valider</button>
    </div>
    
</form>

