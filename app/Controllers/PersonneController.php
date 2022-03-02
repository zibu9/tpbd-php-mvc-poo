<?php

namespace App\Controllers;

use App\Models\Personne;

class PersonneController extends BaseController{

    public function index()
    {
        $this->isAdmin();

        return $this->view('home');

    }

    public function membres()
    {
        $this->isAdmin();


        $membre = new Personne($this->getDB());
        $membres = $membre->all();
        return $this->view('membres.index', compact('membres'));

    }

    public function membre(int $id)
    {
        $this->isAdmin();


        $membre = new Personne($this->getDB());
        $membre = $membre->where('numero', $id);
        return $this->view('membres.show', compact('membre'));

    }

    public function destroy(int $id)
    {
        $this->isAdmin();

        $personne = new Personne($this->getDB());
        $result = $personne->deleteWhere('numero', $id);

        if ($result) {
            return header('Location:'. BASE_URL. 'gestion-des-membres');
        }
    }

    public function create()
    {
        $this->isAdmin();
        return $this->view('membres.create');
    }

    public function createPost()
    {
        $this->isAdmin();

        $personne = new Personne($this->getDB());

        $result = $personne->create($_POST);

        if ($result) {
            return header('Location:'. BASE_URL. 'gestion-des-membres');
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $personne = (new Personne($this->getDB()))->where('numero', $id);

        return $this->view('membres.update', compact('personne'));
    }

    public function update(int $id)
    {
        $this->isAdmin();

        $personne = new Personne($this->getDB());

        $result = $personne->update('numero', $id, $_POST);

        if ($result) {
            return header('Location:'. BASE_URL. 'gestion-des-membres');
        }
    }

}