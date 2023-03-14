<?php

namespace App\Models;


class Concour extends Model {

    protected $table = 'concours';

    public function create($id, ?array $relations = null)
    {
        foreach ($relations as $participants) {
            $stmt = $this->db->getPDO()->prepare("INSERT participer (chien_matricule, concour_id) VALUES (?, ?)");
            $stmt->execute([$participants, $id]);
        }
        return true;
    }

    public function getAll($id)
    {
        return $this->query('SELECT c.* FROM chiens c 
        INNER JOIN participer p 
        ON(p.chien_matricule = c.matricule) 
        WHERE p.concour_id = ?', [$id]);
    }

    public function getParticipants()
    {
        return $this->query('SELECT c.nom AS cnom, c.matricule, c.race ,prs.numero, prs.nom AS pnom, prs.postnom, prs.prenom, prs.adresse, cp.* FROM chiens c 
        INNER JOIN participer p ON(p.chien_matricule = c.matricule ) 
        INNER JOIN chien_personne cp ON(cp.chien_id = c.matricule) 
        INNER JOIN personnes prs ON(prs.numero = cp.personne_id) 
        WHERE p.concour_id = ?', [$this->id]
        );
    }

    public function getWinner()
    {
        return $this->query('SELECT c.nom AS cnom, c.matricule, c.race, prs.numero, prs.nom AS pnom, prs.postnom, prs.prenom, prs.adresse, cp.* FROM chiens c 
        INNER JOIN participer p ON(p.chien_matricule = c.matricule )
        INNER JOIN chien_personne cp ON(cp.chien_id = c.matricule) 
        INNER JOIN personnes prs ON(prs.numero = cp.personne_id) 
        WHERE p.prix_gagne IS NOT NULL'        
        );
    }
}