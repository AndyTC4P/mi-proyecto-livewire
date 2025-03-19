<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;

class CvList extends Component
{
    public function render()
    {
        $cvs = CV::where('user_id', Auth::id())->get();
        return view('livewire.cv-list', compact('cvs'));
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
}

