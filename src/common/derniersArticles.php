<?php

try{
        
    $result = lastProducts();//fonction dans dbproduitFonctions

} catch (PDOException $e){
    echo $e->getMessage();
    echo $e->getLine();
    exit();
}

?>


<div class="container">
    <div class="row wrap justify-content-center">   

    <?php foreach ($result as $value): ?>
        <div class="col-4 mb-2">
        <a href ="../../src/pages/article.php?id=<?php echo $value['productIdINT'];?>">
            <div class="card" style="width: 18rem;">
                <img src="<?php echo $value['imgUrl'];?>" class="card-img-top" alt="...">
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


