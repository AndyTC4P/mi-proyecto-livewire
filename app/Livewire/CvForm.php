<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;

class CvForm extends Component
{
    public $nombre;
    public $apellido;
    public $experiencia;
    public $publico = false; // Cambié "privado" por "publico" para que coincida con la DB

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'experiencia' => 'required|string',
        'publico' => 'boolean', // Cambiado de "privado" a "publico"
    ];

    public function save()
    {
        $this->validate();

        Cv::create([
            'user_id' => Auth::id(),
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'experiencia' => $this->experiencia,
            'publico' => $this->publico, // Cambiado de "privado" a "publico"
        ]);

        session()->flash('message', 'Tu CV ha sido guardado exitosamente.');

        $this->reset(['nombre', 'apellido', 'experiencia', 'publico']);
    }

    public function render()
    {
        return view('livewire.cv-form');
    }
}

