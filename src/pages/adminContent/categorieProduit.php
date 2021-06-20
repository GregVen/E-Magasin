<?php
require "../common/dbCategorieFonctions.php";

    try{
        
        $result = recupListeCategories();
    
    } catch (PDOException $e){
        echo $e->getMessage();
        echo $e->getLine();
        exit();
    }

?>

<section>
    <div>
        <table id="tableEmployes">
            <tr>
                <th>ID</th>
                <th>CATEGORIES</th>
                <th></th>
            </tr>

            <?php foreach ($result as $value): ?>
                <tr>         
                    <td> <?php echo $value->categoryId ;?> </td>
                    <td> <?php echo $value->typeProduct;?></td>
                    <td><a href="<?php echo "./adminContent/modifCategorie/modifCategorie.php?id=".$value->categoryId ?>" title="Editer"> Modifier </a></td>
                    <td><a href="<?php echo "./adminContent/modifCategorie/deleteCategorie.php?id=".$value->categoryId ?>" title="Supprimer"> Supprimer</a></td>
                </tr>
            <?php endforeach ?>
        </table>

        <form action="./adminContent/modifCategorie/ajoutCategorie.php" method="post">
            <h3>Ajout d'une catégorie</h3>
            <div>
                <div>
                <label>Nouvelle Catégorie :</label>
                    <div">
                        <input type="text" placeholder="Catégorie" name="categorie" required>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <button type="submit" title="Valider" >Valider</button>
                </div>
            </div>
        </form>
        
    </div>
</section>