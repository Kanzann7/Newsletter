<?php


// Inclusion des dépendances
require 'config.php';
require 'functions.php';


$errors = [];
$success = null;
$email = '';
$firstname = '';
$lastname = '';
$interestSelected = '';

// Si le formulaire a été soumis...
if (!empty($_POST)) {

    // On récupère les données
    $email = trim($_POST['email']);
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    // On récupère l'origine
    $originSelected = $_POST['origin'];

    if (isset($_POST['interests_choice'])) {
        $interestSelected = $_POST['interests_choice'];
    }


    // Validation 
    if (!$email) {
        $errors['email'] = "Merci d'indiquer une adresse mail";
    }

    if (!$firstname) {
        $errors['firstname'] = "Merci d'indiquer un prénom";
    }

    if (!$lastname) {
        $errors['lastname'] = "Merci d'indiquer un nom";
    }

    if (!$interestSelected) {
        $errors['interests_choice'] = "Veuillez cocher au moins une option !";
    }

    if (verifyEmail($email) == true) {
        $errors['email'] = "Cet email existe déjà !";
    }



    // Si tout est OK (pas d'erreur)
    if (empty($errors) && verifyEmail($email) == false) {

        // Ajout de l'email dans le fichier csv
        $lastID = addSubscriber($email, $firstname, $lastname, $originSelected);
        addInterests($lastID, $interestSelected);

        // Message de succès
        $success  = 'Merci de votre inscription';
        header('Location: index.php');
        exit();
    }
}


//////////////////////////////////////////////////////
// AFFICHAGE DU FORMULAIRE ///////////////////////////
//////////////////////////////////////////////////////

// Sélection de la liste des origines
$origins = getAllOrigins();
$interests = getAllInterests();

// Inclusion du template
include 'index.phtml';
