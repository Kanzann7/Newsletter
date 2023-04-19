<?php

namespace App\Model;

use App\Core\AbstractModel;

class SubscribersModel extends AbstractModel
{
    /**
     * Ajoute un abonné à la liste des emails
     */
    function addSubscriber(string $email, string $firstname, string $lastname, int $originSelected)
    {


        // Insertion de l'email, prénom, nom de famille, l'origine et la date dans la table subscribers
        $sql = 'INSERT INTO subscribers
            (email, firstname, lastname, origine_id, created_on) 
            VALUES (?,?,?,?, NOW())';

        $this->db->prepareAndExecute($sql, [$email, $firstname, $lastname, $originSelected]);
    }

    function verifyEmail($target)
    {


        $sql = "SELECT * FROM subscribers WHERE email = ?";
        $reqmail = $this->db->prepareAndExecute($sql, [$target]);


        if ($reqmail->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
