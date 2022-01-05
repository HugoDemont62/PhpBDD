<?php 
session_start();
include "index.php";

$BDD = mysqli_connect('localhost:3306',"root","", "projet") or die("Impossible de se connecter au serveur : localhost:3306");
//$resultat=mysqli_query($BDD, "DROP DATABASE IF EXISTS projet");
//$resultat=mysqli_query($BDD, "CREATE DATABASE projet");

echo "</br>";
echo $_POST['name'];
echo "</br>";
echo $_POST['password'];
echo "</br>";



$SQL = "SELECT name, password FROM projetsql";
$result = mysqli_query($BDD, $SQL);


print_r($result);
echo "</br>";
if($result) {
    echo "Succes";
}
else{
    echo "Echec requete";
}
echo "</br>";





if(isset($_POST['submit'])) {
    $allowed = array();
    $allowed[] = 'name';
    $allowed[] = 'password';
    $allowed[] = 'submit';
    $sent = array_keys($_POST);

    if ($allowed !== $sent) {
        die();
    }
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

    while($line = mysqli_fetch_array($result)) {
        $tableau[] = array($line['name'],$line['password']);
        print_r($tableau);
    }




}


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
//if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
//    // Testons si le fichier n'est pas trop gros
//    if ($_FILES['screenshot']['size'] <= 1000000) {
//        // Testons si l'extension est autorisée
//        $fileInfo = pathinfo($_FILES['screenshot']['name']);
//        $extension = $fileInfo['extension'];
//        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
//        if (in_array($extension, $allowedExtensions)) {
//            // On peut valider le fichier et le stocker définitivement
//            move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
//            echo "L'envoi a bien été effectué !";
//        }
//    }
//}
//if (isset($_POST['email']) &&  isset($_POST['password'])) {
//    foreach ($users as $user) {
//        if (
//            $user['email'] === $_POST['email'] &&
//            $user['password'] === $_POST['password']
//        ) {
//            $loggedUser = [
//                'email' => $user['email'],
//            ];
//        } else {
//            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)',
//                $_POST['email'],
//                $_POST['password']
//            );
//        }
//    }
//}

