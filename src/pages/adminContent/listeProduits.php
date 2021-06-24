<?php

require "../fonctions/db_access.php";
require "../fonctions/dbProduitsFonctions.php";

    try{
        
        $result = recupListeProduits();
    
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }

?>

<section>
<div class="text-center mt-3">
                <h2>Liste des produits</h2>
            </div>
    <div class="container mt-4">
    <div class="container mt-5">
        <table class="table table-striped">
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>On Top</th>
                <th></th>     
                <th></th>

            </tr>

            <?php foreach ($result as $value): ?>
                <tr>         
                    <td> <?php echo $value->productName ;?> </td>
                    <td> <?php echo $value->description;?></td>
                    <td> <?php echo $value->prix;?></td>
                    <td> <?php echo $value->onTop;?></td>
                    <td><a class="btn btn-primary" href="<?php echo "admin.php?page=modifProduit&&id=".$value->productIdINT ?>" title="Editer"> Modifier </a></td>
                    <td><a class="btn btn-danger" href="<?php echo "../fonctions/deleteProduit.php?id=".$value->productIdINT ?>" title="Supprimer"> Supprimer</a></td>
                </tr>
            <?php endforeach ?>
        </table>
        
    </div>
</section>