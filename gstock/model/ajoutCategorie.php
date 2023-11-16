<?php

include 'connexion.php';
if (
          !empty($_POST['libelle_categorie'])
) {

$sql = "INSERT INTO categorie_article(libelle_categorie) VALUES (?)";
        $req = $connexion->prepare($sql);

        $req->execute(array(
          $_POST['libelle_categorie'],

        ));

       if ($req->rowCount()!=0) {
          $_SESSION['message']['text']= "Catégorie ajouté avec succès";
          $_SESSION['message']['type']= "success";

       } else {
          $_SESSION['message']['text']= "une erreur s'est produit lers de l'ajout du Catégorie";
          $_SESSION['message']['type']= "danger";
         }
       
}else {
          $_SESSION['message']['text']= "une information obligatoire non rensignée";
          $_SESSION['message']['type']= "danger";
}

header('Location:../vue/categorie.php');