<?php

require "config.php";
require "functions.php";

$subscribersModel = new App\Model\SubscribersModel();
$verifyEmail = $subscribersModel->verifyEmail($email);



$filename = $argv[1];
if (!file_exists($filename)) {
    echo "Erreur : fichier '$filename' introuvable";
    exit;
}



$file = fopen($filename, "r");

$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASS);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdoStatement = $pdo->prepare('INSERT INTO subscribers (created_on, email, firstname, lastname) VALUES (?,?,?,?)');

while ($row = fgetcsv($file)) {


    $created_on = new DateTime();
    $firstname = $row[0];
    $lastname = $row[1];
    $email = $row[2];
    $newDate = $created_on->format("Y-m-d H:i:s");

    $firstname = strtolower($firstname);
    $firstname = ucwords($firstname, " -");
    $lastname = strtolower($lastname);
    $lastname = ucwords($lastname, " -");
    $email = str_replace(" ", "", $email);
    if ($verifyEmail == false) {
        $pdoStatement->execute([$newDate, $email, $firstname, $lastname]);
    } else {

        echo $email . " existe déjà ! \n";
    }
}

echo 'Import terminé!';
