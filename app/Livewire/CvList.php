<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;

class CvList extends Component
{
    public $cvs;

    public function mount()
    {
        $this->cvs = CV::where('user_id', Auth::id())->latest()->get();
    }

    protected $listeners = ['cvCreated' => 'reloadCvs'];

    public function reloadCvs()
    {
        $this->cvs = CV::where('user_id', Auth::id())->latest()->get();
    }

    public function copiarEnlace($id)
    {
        $cv = CV::findOrFail($id);

        if (!$cv->publico) {
            session()->flash('error', 'Este CV es privado y no se puede compartir.');
            return;
        }

        $link = route('cv.show', $cv->id);
        $this->dispatch('copiar-enlace', $link);
    }

    public function render()
    {
        return view('livewire.cv-list');
    }
}





