<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Course;

use Livewire\WithPagination;

class CourseIndex extends Component
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
        $courses = Course::where('name', 'LIKE','%'. $this->search .'%') //filtro para BUSCADOR
        /* $activities = Course::where('user_id', auth()->user()->id) */
                /* ->where('name', 'LIKE','%'. $this->search .'%') */
                ->first('id') //para colocar el ultimo de primero**lasted**
                ->paginate();  //paginar el orden de todo

        return view('livewire.admin.course-index', compact('courses'));
    }
}
