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
    public $publico = false; // Predeterminado como privado

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellido' => 'required|string|max:255',
        'titulo' => 'nullable|string|max:255',
        'perfil' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048', // Solo imágenes de máximo 2MB
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

        // Manejo de imagen
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
            'experiencia' => json_encode($this->experiencia), // Guardado como JSON
            'educacion' => json_encode($this->educacion), // Guardado como JSON
            'publico' => $this->publico,
        ]);

        // Emitir evento para actualizar Livewire y mostrar mensaje de éxito
        $this->dispatch('cvSaved');

        // Limpiar los campos después de guardar
        $this->reset(['nombre', 'apellido', 'titulo', 'perfil', 'imagen', 'correo', 'telefono', 'direccion', 'experiencia', 'educacion', 'publico']);
    }

    // Función para agregar una experiencia laboral
    public function addExperience()
    {
        $this->experiencia[] = ['empresa' => '', 'puesto' => '', 'inicio' => '', 'fin' => ''];
    }

    // Función para eliminar una experiencia laboral
    public function removeExperience($index)
    {
        unset($this->experiencia[$index]);
        $this->experiencia = array_values($this->experiencia);
    }

    // Función para agregar un estudio superior
    public function addEducation()
    {
        $this->educacion[] = ['universidad' => '', 'carrera' => '', 'inicio' => '', 'fin' => ''];
    }

    // Función para eliminar un estudio superior
    public function removeEducation($index)
    {
        unset($this->educacion[$index]);
        $this->educacion = array_values($this->educacion);
    }

    public function render()
    {
        return view('livewire.cv-form');
    }
}




