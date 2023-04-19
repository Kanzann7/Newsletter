<?php

namespace App\Model;

use App\Core\AbstractModel;

class OriginsModel extends AbstractModel
{
    /**
     * Récupère tous les enregistrements de la table origins
     */

    function getAllOrigins()
    {


        $sql = 'SELECT *
            FROM origins
            ORDER BY originLabel';

        $results = $this->db->getAllResults($sql);


        return $results;
    }
}
