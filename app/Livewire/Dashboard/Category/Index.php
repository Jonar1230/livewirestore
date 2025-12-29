<?php

namespace App\Livewire\Dashboard\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Index extends Component
{

    use WithPagination; //utilizando esto, no se recarga al paginar.

    //Para evitar conflictos con Tailwind o Bootstrap en el paginado
    protected $paginationTheme = 'tailwind'; 
  
    public function render()
    {
        // Usamos paginate en vez de all()
        $categories = Category::paginate(2);
        return view('livewire.dashboard.category.index', compact('categories'));
    }


    function delete(Category $category)
    {
        $category->delete();
        $this->dispatch('deleted');
    }


}
