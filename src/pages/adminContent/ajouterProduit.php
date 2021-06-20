<?php 

require "../common/dbCategorieFonctions.php";

?>


<form action="./adminContent/modifProduit/insertProduit.php" method="post" enctype="multipart/form-data">
    <h2>Nouveau Produit</h2>
    <div class="container">
        <div class="row justify-content-evenly">
            <div class="col-5">
                <div class="input-group mb-3">
                    <label class="input-group-text" id="basic-addon3">Nom du Produit</label>
                    <input type="text" class="form-control" aria-describedby="basic-addon3" name="productName" placeholder="Nom du Produit" required>
                </div>

                <div class="input-group mb-3"> 
                    <label class="input-group-text" for="inputGroupSelect01">Catégorie</label>
                    <select class="form-select" id="inputGroupSelect01" name="categoryId" required>
                        <option selected>Choisir la catégorie...</option>
                    <?php foreach(recupListeCategories() as $value): ?>
                        <option value="<?php echo $value->categoryId ?>"><?php echo $value->typeProduct ?></option>
                    <?php endforeach ?>
                    </select>
                </div>

                <div  class="mb-3">
                    <h6>UPLOADER un fichier</h6>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
                    <input class="form-control" type="file" id="formFile" name="fichier">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Description</span>
                    <textarea class="form-control" aria-label="With textarea" placeholder="Description" rows="5" name="description"></textarea>
                </div>

                <div>
                    <div>
                        <label class="label">Mettre "On Top" ?</label>
                        <select name="onTop" required>
                            <option value="1">OUI</option>
                            <option value="0">NON</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div>
                    <h5>Caractéristiques Techniques</h5>
                </div>  
                <div>  
                    <div>
                        <label>Processeur</label>
                        <input type="text"  name="processeur" placeholder="Processeur" required>
                    </div>
                    <div>
                        <label>Fabriquant du Processeur</label>
                        <input type="text"  name="processeurFabricant" placeholder="Fabriquant du Processeur" required>
                    </div>
                </div>
                <div>
                    <label>Carte Graphique</label>
                    <input type="text"  name="carteGraphique" placeholder="Carte Graphique" required>
                </div>
                <div>  
                    <div>
                        <label>Taille d'Ecran</label>
                        <input type="text"  name="tailleEcran" placeholder="Taille d'Ecran" required>
                    </div>
                    <div>
                        <label>Résolution</label>
                        <input type="text"  name="resolutionEcran" placeholder="Résolution" required>
                    </div>
                </div>
                <div>  
                    <div>
                        <label>Type de disque</label>
                        <input type="text"  name="typeHDD" placeholder="Type de disque" required>
                    </div>
                    <div>
                        <label>Taille du Disque</label>
                        <input type="text"  name="tailleHDD" placeholder="Taille du Disque" required>
                    </div>
                </div>
                <div>
                    <label>Poids</label>
                    <input type="text"  name="poids" placeholder="Poids" required>
                </div>
                <div>
                    <label>OS</label>
                    <input type="text"  name="OS" placeholder="OS" required>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-5">
        <button type="submit" title="Valider">Valider</button>
    </div>
    
</form>
