<?php

namespace App\Models;


class Chien extends Model {

    protected $table = 'chiens';

    public function getPersonne()
    {
        return $this->query("
            SELECT p.* FROM personnes p
            INNER JOIN chien_personne cp ON cp.personne_id = p.numero
            WHERE cp.chien_id = ?
        ", [$this->matricule]);
    }

    public function vueNaitre(){
        return $this->query("SELECT p.* FROM personnes p INNER JOIN vue_naitre vn ON(p.numero = vn.personne_id) WHERE vn.chien_id = ?;
        ", [$this->matricule]);        
    }

    public function create(array $data, ?array $chien_parente = null, ?array $chien_personne = null, ?array $numero_personne = null)
    {
        parent::create($data);
        $id = $this->db->getPDO()->lastInsertId();

        foreach ($numero_personne as $vn) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO vue_naitre (chien_id, personne_id) VALUES(?, ?)");
            $stmt->execute([$id, $vn]);
        }

        foreach ($chien_parente as $chien) {
            $stmt = $this->db->getPDO()->prepare("INSERT INTO parente (chien, chien_parente) VALUES (?, ?)");
            $stmt->execute([$id, $chien]);
        }

        if(!is_null($chien_personne))
        {
            for($i=0; $i<2; $i++) {
                $stmt = $this->db->getPDO()->prepare("INSERT INTO chien_personne (personne_id, chien_id, date_acquisition, prix) VALUES(?, ?, ?, ?)");
                $stmt->execute([$chien_personne[0], $id, $chien_personne[2], $chien_personne[1]]);
            }
        }

        return true;
    }




}