<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    use WithFileUploads;

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = $vacante->ultimo_dia;
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    protected $rules = [
        'titulo' => 'required',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nueva' => 'max:1024',
    ];

    public function editarVacante(){
        $datos = $this->validate();

        // Verificar si hay una nueva imagen

        if ($datos['imagen_nueva']!=null) {
            // File::delete(public_path('vacantes/'.$this->imagen));
            unlink(public_path().'/storage/vacantes/'.$this->imagen);

            //Almacenar la imagen
            $imagen_nueva = $this->imagen_nueva->store('public/vacantes');
            $nombre_imagen_nueva = str_replace('public/vacantes/','',$imagen_nueva);

            //Encontrar la vacante a editar
            $vacante = Vacante::find($this->vacante_id);

            //Obtener la data
            $vacante->titulo = $datos['titulo'];
            $vacante->salario_id = $datos['salario'];
            $vacante->categoria_id = $datos['categoria'];
            $vacante->empresa = $datos['empresa'];
            $vacante->ultimo_dia = $datos['ultimo_dia'];
            $vacante->descripcion = $datos['descripcion'];
            $vacante->imagen = $nombre_imagen_nueva;
        }
        else{
            //Encontrar la vacante a editar
            $vacante = Vacante::find($this->vacante_id);

            //Obtener la data
            $vacante->titulo = $datos['titulo'];
            $vacante->salario_id = $datos['salario'];
            $vacante->categoria_id = $datos['categoria'];
            $vacante->empresa = $datos['empresa'];
            $vacante->ultimo_dia = $datos['ultimo_dia'];
            $vacante->descripcion = $datos['descripcion'];
        }


        $vacante->save();

        //Crear Mensaje a retornar
        Session()->flash('mensaje','La vacante se actualizo correctamente');

        //Retonar a la vista
        return redirect()->route('vacantes.index');
    }

    public function render()
    {
        $salarios = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.editar-vacante'
        ,['salarios' => $salarios,
        'categorias' => $categorias]);
    }
}
