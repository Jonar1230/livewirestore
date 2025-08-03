<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;

use Livewire\Component;


class Save extends Component
{

    public $title;
    public $slug;
    public $text;

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }

    public function submit()
    {
       
        Category::create([
            'title' => $this->title,
            'slug' => str($this->title)->slug(),
            'text' => $this->text,
        ]);

    }

}
