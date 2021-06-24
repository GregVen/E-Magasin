<?php
$style="../css/style.css";
session_start();
include "../common/template.php";

require "../fonctions/db_access.php";
// require "../fonctions/dbCategorieFonctions.php";
require "../fonctions/dbProduitsFonctions.php";



$idproduit = $_GET["id"];
$resultat=RecupInfoProduct($idproduit);

$result2 = alaune();//fonction dans dbproduitFonctions

$nom = $resultat->productName;
// $categoryID = $resultat->categoryID;
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
$link = $resultat->imgUrl;
$img = str_replace("./src", "..", $link);


// $_SESSION["productID"] = $productid = $resultat->productId;


?>

<div class="container pt-5">
    <div class="row justify-content-center">
        <h2>En promotion cette semaine</h2>

        <?php foreach ($result2 as $value): ?>
        <div class="col">
        <a href ="../../src/pages/article.php?id=<?php echo $value['productIdINT'];?>">
            <div class="card" style="width: 15rem; height: 15rem">
                <div class="card-body" style="background: url(<?php 
                $img1 = str_replace("./src", "..", $value['imgUrl']);
                echo $img1;?>) no-repeat"> 
                    <div class="d-flex justify-content-center">
                        <div class="textepromo">
                            <p class="categorie"><?php echo $value['typeProduct'];?></p>
                            <p class="description"><?php echo $value['productName'];?></p>
                            <p class="prix"><?php echo $value['prix'];?> €</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        </div>
        
        <?php  endforeach ?>
            
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="text-center">
            <h2> <?php echo $nom ?>  -  <?php echo $prix ?> €</h2> 
        </div>
        <div class="col-2">
            <ul class="list-group list-group-flush listeCategorie">
                <a href="../"><li class="list-group-item list-group-item-danger">Tous les produits</li></a>
                <?php foreach(recupListeCategories() as $value): ?>
                <a href="<?php echo "./categories.php?id=".$value->categoryId ?>"><li class="list-group-item"><?php echo $value->typeProduct ?></li></a>
                <?php endforeach ?>
            </ul></div>
            <div class="col-1"></div>
                <div class="col-9">

                <div class="container">
                    <div class="row justify-content-evenly">
                        <div class="col-5">

                            <table class="table">
    
                                <tbody>
                                    <tr>
                                    <th scope="row"></th>
                                    <td><img src="<?php echo $img ?>" alt="pas de bol" srcset=""></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Catégorie</th>
                                    <td><?php echo $typeProduct ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Description</th>
                                    <td><?php echo $description ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Poids</th>
                                    <td><?php echo $poids ?> Kg</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">OS</th>
                                    <td><?php echo $OS?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-5">
                            <div>
                                <h5>Caractéristiques Techniques</h5>
                            </div> 
                            <table class="table">    
                                <tbody>
                                    <tr>
                                    <th scope="row">Taille Memoire</th>
                                    <td><?php echo $tailleMemoire  ?> Go</td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Processeur</th>
                                    <td><?php echo $processeur ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Fabriquant du Processeur</th>
                                    <td><?php echo $processeurFab ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Carte Graphique</th>
                                    <td><?php echo $CG?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Taille d'Ecran</th>
                                    <td><?php echo $tailleEcran  ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Résolution</th>
                                    <td><?php echo $resolution ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Type de disque</th>
                                    <td><?php echo $typeHdd ?></td>
                                    </tr>
                                    <tr>
                                    <th scope="row">Taille du Disque</th>
                                    <td><?php echo $tailleHdd?> Go</td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
        <button type="button" class="btn btn-primary btn-lg btn-block">Ajouter au panier</button>
        </div>
    </div>
</div>


<?php 
include "../common/footer.php";
                