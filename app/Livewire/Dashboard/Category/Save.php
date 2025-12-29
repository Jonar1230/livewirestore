<?php

namespace App\Livewire\Dashboard\Category;

use App\Models\Category;

use Livewire\Component;
use Livewire\WithFileUploads;


class Save extends Component
{

    use WithFileUploads;

    public $category;

    public $title;
    public $slug;
    public $text;
    public $image;


    protected $rules = [
        'title' => 'required|string|min:2|max:255',
        'text' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
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
            $this->dispatch('updated');
        } else {
          $this->category = Category::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'text' => $this->text,
            ]);

            $this->dispatch('created');
        }

        //Upload

        if($this->image){
            $imageName = $this->category->slug . '-' . time() . '.' . $this->image->getClientOriginalExtension(); 
            $this->image->storeAs('images/categories', $imageName, 'public_upload');

            $this->category->update([
                'image' => 'images/categories/' . $imageName,
            ]);


        }

    }

}
