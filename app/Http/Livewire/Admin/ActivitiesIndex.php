<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Activity;

use Livewire\WithPagination;

class ActivitiesIndex extends Component
{
    //para usar paginacion en livewire
    use WithPagination;

    //para usar los estilos de bootstrap y no los de livewire
    protected $paginationTheme = "bootstrap";

    //para usar con el holder de busqueda
    public $search;

    //para resear el buscador a la primera pagina
    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $activities = Activity::where('user_id', auth()->user()->id)
                ->where('name', 'LIKE','%'. $this->search .'%')  //filtro para BUSCADOR
                ->latest('id') //para colocar el ultimo de primero
                ->paginate();  //paginar el orden de todo

        return view('livewire.admin.activities-index', compact('activities'));
    }
}
