<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;

class CvForm extends Component
{
    use WithFileUploads;

    public $nombre;
    public $apellido;
    public $titulo;
    public $perfil;
    public $imagen;
    public $correo;
    public $telefono;
    public $direccion;
    public $experiencia = [];
    public $educacion = [];
    public $publico = false;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'titulo' => 'nullable|string|max:255',
        'perfil' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048',
        'correo' => 'nullable|email|max:255',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'experiencia' => 'nullable|array',
        'experiencia.*.empresa' => 'required|string|max:255',
        'experiencia.*.puesto' => 'required|string|max:255',
        'experiencia.*.inicio' => 'required|date',
        'experiencia.*.fin' => 'nullable|date|after_or_equal:experiencia.*.inicio',
        'educacion' => 'nullable|array',
        'educacion.*.universidad' => 'required|string|max:255',
        'educacion.*.carrera' => 'required|string|max:255',
        'educacion.*.inicio' => 'required|date',
        'educacion.*.fin' => 'nullable|date|after_or_equal:educacion.*.inicio',
        'publico' => 'boolean',
    ];

    public function save()
    {
        $this->validate();

        $imagenPath = $this->imagen ? $this->imagen->store('imagenes_perfil', 'public') : null;

        CV::create([
            'user_id' => Auth::id(),
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'titulo' => $this->titulo,
            'perfil' => $this->perfil,
            'imagen' => $imagenPath,
            'correo' => $this->correo,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'experiencia' => json_encode($this->experiencia),
            'educacion' => json_encode($this->educacion),
            'publico' => $this->publico,
        ]);

        // ✅ Redirigir directamente a la página de Mis CVs con mensaje de éxito
        return redirect()->route('cv.index')->with('message', '✅ CV creado correctamente.');
    }

    public function addExperience()
    {
        $this->experiencia[] = ['empresa' => '', 'puesto' => '', 'inicio' => '', 'fin' => ''];
    }

    public function removeExperience($index)
    {
        unset($this->experiencia[$index]);
        $this->experiencia = array_values($this->experiencia);
    }

    public function addEducation()
    {
        $this->educacion[] = ['universidad' => '', 'carrera' => '', 'inicio' => '', 'fin' => ''];
    }

    public function removeEducation($index)
    {
        unset($this->educacion[$index]);
        $this->educacion = array_values($this->educacion);
    }

    public function updatedImagen()
    {
        $this->dispatch('imagenSubida');
    }

    public function render()
    {
        return view('livewire.cv-form');
    }
}






