<?php

namespace App\Controllers;

use App\Models\Chien;
use App\Models\Personne;

class ChienController extends BaseController{

    public function index()
    {
        $this->isAdmin();

        return $this->view('home');

    }

    public function chiens()
    {
        $this->isAdmin();


        $chien = new Chien($this->getDB());
        $chiens = $chien->all();
        return $this->view('chiens.index', compact('chiens'));

    }

    public function chien(int $id)
    {
        $this->isAdmin();


        $chien = new Chien($this->getDB());
        $chien = $chien->where('matricule', $id);
        return $this->view('chiens.show', compact('chien'));

    }
    
    public function destroy(int $id)
    {
        $this->isAdmin();

        $post = new Chien($this->getDB());
        $result = $post->deleteWhere('matricule', $id);

        if ($result) {
            return header('Location:'. BASE_URL. 'gestion-des-chiens');
        }
    }

    public function create()
    {
        $this->isAdmin();
        $personne = new Personne($this->getDB());
        $chien = new Chien($this->getDB());

        $chiens = $chien->all();
        $personnes = $personne->all();
        return $this->view('chiens.create', compact('personnes', 'chiens'));
    }

    public function createPost()
    {
        $this->isAdmin();

        $chien = new Chien($this->getDB());

        $chien_parente = array_pop($_POST);
        $prix = array_pop($_POST);
        $date_acquisition = array_pop($_POST);
        $proprietaire = array_pop($_POST);
        $chien_personne = [];
        $chien_personne[0] = $proprietaire;
        $chien_personne[1] = $prix;
        $chien_personne[2] = $date_acquisition;
        $numero_personne = array_pop($_POST);

        $result = $chien->create($_POST, $chien_parente, $chien_personne, $numero_personne);
        
        if ($result) {
            return header('Location:'. BASE_URL. 'gestion-des-chiens');
        }
        
    }


}