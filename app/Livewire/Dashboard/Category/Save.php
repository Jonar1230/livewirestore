<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;

use Livewire\Component;


class Save extends Component
{


    public $category;

    public $title;
    public $slug;
    public $text;


    protected $rules = [
        'title' => 'required|string|min:2|max:255',
        'text' => 'nullable|string',
    ];


    function mount($id = null){
        if($id != null){
            $this->category = Category::find($id);
            $this->title = $this->category->title;
            $this->slug = $this->category->slug;
            $this->text = $this->category->text;
        }
    }


    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {

        $this->validate();

        if($this->category) {
            $this->category->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);
        } else {
            Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);
        }

    }

}
