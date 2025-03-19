<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;

class CvForm extends Component
{
    public $nombre;
    public $apellido;
    public $experiencia;
    public $publico = false; // Predeterminado como falso

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'experiencia' => 'nullable|string',
        'publico' => 'boolean',
    ];

    public function save()
    {
        $this->validate();

        CV::create([
            'user_id' => Auth::id(),
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'experiencia' => $this->experiencia,
            'publico' => $this->publico,
        ]);

        // Emitir evento para actualizar Livewire y mostrar mensaje
        $this->dispatch('cvSaved');

        // Limpiar los campos
        $this->reset();
    }

    public function render()
    {
        return view('livewire.cv-form');
    }
}



