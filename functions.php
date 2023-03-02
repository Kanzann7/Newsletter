<?php

/**
 * Récupère tous les enregistrements de la table origins
 */

function getPDOConnection()
{
    // Construction du Data Source Name
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
    $pdo->exec('SET NAMES UTF8');
    return $pdo;
}


function getAllOrigins()
{

    $pdo = getPDOConnection();
    $sql = 'SELECT *
            FROM origins
            ORDER BY originLabel';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getAllInterests()
{
    $pdo = getPDOConnection();

    $sql = 'SELECT *
            FROM interests
            ORDER BY interests_label';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}


/**
 * Ajoute un abonné à la liste des emails
 */
function addSubscriber(string $email, string $firstname, string $lastname, int $originSelected)
{
    $pdo = getPDOConnection();

    // Insertion de l'email, prénom, nom de famille, l'origine et la date dans la table subscribers
    $sql = 'INSERT INTO subscribers
            (email, firstname, lastname, origine_id, created_on) 
            VALUES (?,?,?,?, NOW())';

    $query = $pdo->prepare($sql);
    $query->execute([$email, $firstname, $lastname, $originSelected]);

    $lastID = $pdo->lastInsertId();
    return $lastID;
}

// ajout d'un intérêt à la base de données
function addInterests($lastID, $interestSelected)
{
    $pdo = getPDOConnection();

    // Insertion de l'id de l'abonné et l'id de son intérêt dans la table subscribers
    foreach ($interestSelected as $interest_id) {
        $associate = $pdo->prepare('INSERT INTO subscribers_interests
        (subscribers_id, interests_id) 
        VALUES (?,?)');
        $associate->execute([$lastID, $interest_id]);
    }
}


// vérifier la présence d'un mail dans la base de données

function verifyEmail($target)
{

    $pdo = getPDOConnection();

    $reqmail = $pdo->prepare("SELECT * FROM subscribers WHERE email = ?");
    $reqmail->execute(array($target));

    if ($reqmail->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}


function getAllEmails()
{
    $pdo = getPDOConnection();

    $sql = 'SELECT email
            FROM subscribers
            ';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}
