<?php

namespace App\Controllers;

use App\Models\Chien;
use App\Models\Concour;

class ConcourController extends BaseController{
    
    public function index()
    {
        $this->isAdmin();
        $concour = new Concour($this->getDB());
        $concours = $concour->all();
        return $this->view('concours.home', compact('concours'));
    }

    public function create()
    {
        $this->isAdmin();
        return $this->view('concours.create');
    }

    public function createPost()
    {
        $this->isAdmin();

        $concour = new Concour($this->getDB());

        $result = $concour->create($_POST);

        if ($result) {
            return header('Location:'. BASE_URL. 'concours');
        }
        
    }

    public function concour(int $id)
    {
        $this->isAdmin();
        $concour = new concour($this->getDB());
        $concour = $concour->findById($id);
        return $this->view('concours.show', compact('concour'));
    }

    public function destroy(int $id)
    {
        $this->isAdmin();

        $concour = new Concour($this->getDB());
        $result = $concour->deleteWhere('id', $id);

        if ($result) {
            return header('Location:'. BASE_URL. 'concours');
        }
    }

    public function add_participant(int $id)
    {
        $this->isAdmin();
        $concour = new Concour($this->getDB());
        $chiens = new Chien($this->getDB());
        $chiens = $chiens->all();
        $concour = $concour->findById($id);
        return $this->view('concours.add', compact('concour', 'chiens'));
    }

    public function addPost()
    {
        $this->isAdmin();
        $chien_matricule = array_pop($_POST);
        $id = $_POST['concour_id'];
        $concour = new Concour($this->getDB());
        $result = $concour->create($id, $chien_matricule);
        if ($result) {
            return header('Location:'. BASE_URL. 'concour/'.$id);
        }
    }

    public function add_vainqueur(int $id)
    {
        $this->isAdmin();
        $cncr = new Concour($this->getDB());
        $concour = $cncr->findById($id);
        $chiens = $cncr->getAll($id);

        return $this->view('concours.ad', compact('concour', 'chiens'));

    }

    
}