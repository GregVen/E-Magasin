<?php
$style="../css/style.css";
session_start();
include "../common/template.php";

require "../fonctions/db_access.php";
require "../fonctions/dbProduitsFonctions.php";


$categoryID = $_GET["id"];
$nameCategory=nameCategory($categoryID);


try{
        
    $result = withIdProducts($categoryID);//fonction dans dbProduitsFonctions
    $result2 = alaune();//fonction dans dbproduitFonctions

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}

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
    <h2> Nos <?php echo $nameCategory['typeProduct'];?> ...</h2> 
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
                        <div class="row wrap justify-content-center">   

                            <?php foreach ($result as $value): ?>

                                <div class="col-4 mb-2">
                                <a href ="./article.php?id=<?php echo $value['productIdINT'];?>">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?php 
                                        $img = str_replace("./src", "..", $value['imgUrl']);
                                        echo $img;?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $value['productName'];?></h5>
                                            <p class="card-text"><?php echo $value['description'];?></p>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                
                            <?php  endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <?php 
 include "../common/footer.php";