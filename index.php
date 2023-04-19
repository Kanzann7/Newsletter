<?php
require 'vendor/autoload.php';

use App\Model\SubscribersModel;
use App\Model\InterestsModel;
use App\Model\OriginsModel;

// Inclusion des dépendances

require 'app/config.php';
require 'lib/functions.php';

$subscribersModel = new SubscribersModel();
$interestsModel = new InterestsModel();
$originsModel = new OriginsModel();

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
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Merci d'indiquer une adresse mail valide";
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

    $verifyEmail = $subscribersModel->verifyEmail($email);
    if ($verifyEmail == true) {
        $errors['email'] = "Cet email existe déjà !";
    }



    // Si tout est OK (pas d'erreur)

    if (empty($errors)) {

        $addSubscriber = $subscribersModel->addSubscriber($email, $firstname, $lastname, $originSelected);
        $addInterests = $interestsModel->addInterests($lastID, $interestSelected);

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
$origins = $originsModel->getAllOrigins();

$interests = $interestsModel->getAllInterests();




// Inclusion du template
include 'index.phtml';
