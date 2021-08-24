<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
{
    //para usar paginacion en livewire
    use WithPagination;

    //para usar los estilos de bootstrap y no los de livewire
    protected $paginationTheme = "bootstrap";

    //para usar con el holder de busqueda
    public $search;

    //
    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
                ->where('name', 'LIKE','%'. $this->search .'%')  //filtro para BUSCADOR
                ->latest('id') //para colocar el ultimo de primero
                ->paginate();  //paginar el orden de todo

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
