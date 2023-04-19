<?php

namespace App\Model;

use App\Core\AbstractModel;
use App\Entity\Interests;


class InterestsModel extends AbstractModel
{
    function getAllInterests()
    {


        $sql = 'SELECT id, interests_label as interestsLabel
                FROM interests
                ORDER BY interests_label';

        $results = $this->db->getAllResults($sql);
        $interests = [];
        foreach ($results as $result) {
            $interests[] = new Interests($result);
        }

        return $interests;
    }

    // ajout d'un intérêt à la base de données
    function addInterests($lastID, $interestSelected)
    {

        $sql = 'INSERT INTO subscribers_interests
        (subscribers_id, interests_id) 
        VALUES (?,?)';

        // Insertion de l'id de l'abonné et l'id de son intérêt dans la table subscribers
        foreach ($interestSelected as $interest_id) {
            $this->db->prepareAndExecute($sql, [$lastID, $interest_id]);
        }
    }
}
