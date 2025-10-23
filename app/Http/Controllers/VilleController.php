<?php

namespace App\Http\Controllers;
use App\Models\Ville;
use Illuminate\Http\Request;

class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $villes = Ville::all(); // Eloquent a fait Select * from villes;        
        return view('ville.index', ["villes" => $villes]);       

    }

}