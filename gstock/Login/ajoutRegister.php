<?php
include '../model/connexion.php';
if (
          !empty($_POST['name'])
           && !empty($_POST['email'])
           && !empty($_POST['password'])
          
) {

$sql = "INSERT INTO users(name, email, password)
        VALUES (?, ?, ?)";
        $req = $connexion->prepare($sql);

        $req->execute(array(
          $_POST['name'],
          $_POST['email'],
          $_POST['password']
        ));

       if ($req->rowCount()!=0) {
          $_SESSION['message']['text']= "users ajouté avec succès";
          $_SESSION['message']['type']= "success";

       } else {
          $_SESSION['message']['text']= "une erreur s'est produit lers de l'ajout du users";
          $_SESSION['message']['type']= "danger";
         }
       
}else {
          $_SESSION['message']['text']= "une information obligatoire non rensignée";
          $_SESSION['message']['type']= "danger";
}

header('Location:../vue/dashboard.php');
