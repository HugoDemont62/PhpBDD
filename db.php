<?php 
session_start();
include "index.php";

$BDD = mysqli_connect('localhost:3306',"root","", "projet") or die("Impossible de se connecter au serveur : localhost:3306");
//$resultat=mysqli_query($BDD, "DROP DATABASE IF EXISTS projet");
//$resultat=mysqli_query($BDD, "CREATE DATABASE projet");

//echo "</br>";
//echo $_POST['name'];
//echo "</br>";
//echo $_POST['password'];
//echo "</br>";
//
//
//
//                                                  Confirmation d'une BDD
//echo "</br>";
//if($result) {
//    echo "Succes";
//}
//else{
//    echo "Echec requete";
//}
//echo "</br>";
//

$SQL = "SELECT name, password FROM projetsql";
$result = mysqli_query($BDD, $SQL);


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
        //var_dump($tableau);

    }

    $username = mysqli_real_escape_string($BDD, $_POST['name']);
    $password = mysqli_real_escape_string($BDD, $_POST['password']);

    $sql = "SELECT id FROM projetsql WHERE name='$username' and password='$password'";
    $result = mysqli_query($BDD,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);


    if(mysqli_num_rows($result) == 1)
    {
        header("location: https://hugodemont.fr/"); // Redirecting To Other Page
    }else
    {
        $message='Password Or Name is false';

        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
    }

    echo "</br>";





}
