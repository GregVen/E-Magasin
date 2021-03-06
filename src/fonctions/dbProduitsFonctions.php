<?php


function nouveauProduit($imgUrl, $description, $categoriyID, $onTop, $productName, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS){
       
    $bdd = bdd();
    
    $sql = "INSERT INTO product(imgUrl, description, categoryID, onTop, productName) VALUES(?, ?, ?, ?, ?)";//requete
    
    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$imgUrl, $description, $categoriyID, $onTop, $productName]);//execution de la requete

    $productId=$bdd->lastInsertId();//on recupere l'id du produit

    $sql = "INSERT INTO fichetechnique(productId, prix, tailleMemoire, processeur, processeurFab, resolutionEcran, tailleEcran, carteGraphique, typeHdd, tailleHdd, poids, OS) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $smtp=$bdd ->prepare($sql);

    $smtp ->execute([(int)$productId, $prix, $tailleMemoire, $processeur, $processeurFab, $resolutionEcran, $tailleEcran, $carteGraphique, $typeHdd, $tailleHdd, $poids, $OS]);

}

function recupListeProduits(){   

    $bdd = bdd();
    $sql = "SELECT * FROM product
    inner join fichetechnique
    on product.productIdINT = fichetechnique.productId";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
} 

function deleteProduits($idcategorie){
    $bdd = bdd();
    $sql = "DELETE from product where productIdINT = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete

    $sql = "DELETE from fichetechnique where productId = ?";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute([$idcategorie]);//execution de la requete
}

function modifProduct($id){
    $bdd = bdd();
    $sql = "SELECT * FROM product
    inner join fichetechnique
    on product.productIdINT = fichetechnique.productId
    where product.productIdINT = $id";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetch(PDO::FETCH_OBJ); //objet
    return $result;

}

function alaune(){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT * from fichetechnique 
    inner join product
    on fichetechnique.productId = product.productIdINT
    inner join category
    on product.categoryID = category.categoryId where onTop = 1
    ORDER BY product.productIdINT DESC LIMIT 5");

    $sql->execute();
    $resultat = $sql ->fetchAll();
    return $resultat; 
}

function lastProducts(){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT * from fichetechnique 
    inner join product
    on fichetechnique.productId = product.productIdINT
    inner join category
    on product.categoryID = category.categoryId
    ORDER BY product.productIdINT DESC LIMIT 12");

    $sql->execute();
    $resultat = $sql ->fetchAll();
    return $resultat; 
}

function withIdProducts($categoryID){

    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT * from fichetechnique 
    inner join product
    on fichetechnique.productId = product.productIdINT
    inner join category
    on product.categoryID = category.categoryId
    where category.categoryID = ?
    ORDER BY product.productName ASC");

    $sql->execute([$categoryID]);
    $resultat = $sql ->fetchAll();
    return $resultat; 

}

function nameCategory($categoryID){
    $bdd = bdd();
    $sql = $bdd-> prepare("SELECT typeProduct from category
    where categoryId = ?");
    $sql->execute([$categoryID]);
    $resultat = $sql ->fetch();
    return $resultat; 
}

function recupListeCategories(){

    $bdd = bdd();
    $sql = "SELECT * FROM category";//requete

    $stmt = $bdd->prepare($sql);//preparation de la requete
    $stmt->execute();//execution de la requete

    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC); asso
    $result = $stmt->fetchAll(PDO::FETCH_OBJ); //objet
    return $result;
}

function RecupInfoProduct($id){
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


