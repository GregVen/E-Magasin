<?php

?>


<ul class="list-group list-group-flush listeCategorie">
        <a href="./index.php"><li class="list-group-item list-group-item-danger">Tous les produits</li></a>
    <?php foreach(recupListeCategories() as $value): ?>
        <a href="<?php echo "./src/pages/categories.php?id=".$value->categoryId ?>"><li class="list-group-item"><?php echo $value->typeProduct ?></li></a>
    <?php endforeach ?>
</ul>
