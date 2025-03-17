<?php

namespace App\Http\Controllers;

use App\Models\CV;

class CVController extends Controller
{
    // Mostrar todos los CVs
    public function index()
    {
        $cvs = CV::with('user')->get(); // Obtiene todos los CVs junto con su relación con el usuario
        return view('cvs.index', compact('cvs'));
    }

    // Mostrar el CV público de un usuario (si es necesario)
    public function show($id)
    {
        $cv = CV::with('user')->findOrFail($id); // Encuentra el CV por ID
        return view('cvs.show', compact('cv'));
    }
}
