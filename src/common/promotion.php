<?php


try{
        
    $result = alaune();//fonction dans dbproduitFonctions

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}


?>

<div class="container pt-5">
    <div class="row justify-content-center">
        <h2>En promotion cette semaine</h2>

        <?php foreach ($result as $value): ?>
        <div class="col">
            
            <div class="card" style="width: 15rem; height: 15rem">
            <a href ="../../src/pages/article.php?id=<?php echo $value['productIdINT'];?>">
                <div class="card-body" style="background: url(<?php echo $value['imgUrl'];?>) no-repeat"> 
                    <div class="d-flex justify-content-center">
                        <div class="textepromo">
                            <p class="categorie"><?php echo $value['typeProduct'];?></p>
                            <p class="description"><?php echo $value['productName'];?></p>
                            <p class="prix"><?php echo $value['prix'];?> €</p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
          
        </div>
        
        <?php  endforeach ?>
            
    </div>
</div>
 