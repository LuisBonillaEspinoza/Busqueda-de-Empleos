<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    // protected $listeners = ['prueba'];

    protected $listeners = ['eliminar_vacante'];

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(2);
        
        $params = [
            'vacantes' => $vacantes,
        ];

        return view('livewire.mostrar-vacantes',$params);
    }

    // public function prueba($vacante){
    //     dd($vacante);
    // }

    public function eliminar_vacante(Vacante $vacante){
        $vacante->delete();
    }
}
