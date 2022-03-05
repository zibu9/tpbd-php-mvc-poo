<?php

namespace App\Controllers;

use App\Models\Concour;

class ConcourController extends BaseController{
    
    public function index()
    {
        $this->isAdmin();
        $concour = new Concour($this->getDB());
        $concours = $concour->all();
        return $this->view('concours.home', compact('concours'));
    }
}