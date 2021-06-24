<?php 

function recupListeCategories(){ 

    $bdd = bdd();
    $sql = "SELECT * FROM category";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso 
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
}

function nouvelleCategory($categorie){
       
    $bdd = bdd();
    
    $sql = "INSERT INTO category(typeProduct) VALUES(?)";//requete
    
    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$categorie]);//execution de la requete
}

function deleteCategory($idcategorie){
    $bdd = bdd();
    $sql = "DELETE from category where categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete

}

function update_categorie($categorie,$idcategorie){

    $bdd = bdd();
 
    $sql = "UPDATE category
            SET typeProduct = ? where categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$categorie, $idcategorie]);//execution de la requete 


}

function viewUpDateCategorie($idcategorie){
    $bdd = bdd();

    // $id = $_GET["id"];//on recupere le GET (valeur id de l'url recupérée)
    $sql = "SELECT * FROM category WHERE categoryId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete
    $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
    return $result;
}

function modifProduct($id){
    $bdd = bdd();
    $sql = "SELECT * FROM product
    inner join fichetechnique
    on product.productIdINT = fichetechnique.productId
    inner join category
    on product.categoryID = category.categoryId
    where product.productIdINT = $id";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
    return $result;

}
