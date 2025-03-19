<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CVController extends Controller
{
    // Mostrar todos los CVs del usuario autenticado
    public function index()
    {
        $cvs = CV::where('user_id', Auth::id())->get();
        return view('cv.index', compact('cvs'));
    }

    // Mostrar un CV individual (público o privado)
    public function show($id)
    {
        $cv = CV::findOrFail($id);

        // Si el CV es privado y el usuario NO es el dueño, redirigir con error
        if (!$cv->publico && $cv->user_id !== Auth::id()) {
            return redirect()->route('cv.index')->with('error', 'No tienes permiso para ver este CV.');
        }

        return view('cv.show', compact('cv'));
    }
}

