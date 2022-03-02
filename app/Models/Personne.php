<?php

namespace App\Models;


class Personne extends Model {

    protected $table = 'personnes';

    public function getChiens()
    {
        return $this->query("
            SELECT c.*, cp.* FROM chiens c
            INNER JOIN chien_personne cp ON cp.chien_id = c.matricule
            WHERE cp.personne_id = ?
        ", [$this->numero]);
    }

}