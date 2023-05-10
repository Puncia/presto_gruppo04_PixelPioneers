<?php

namespace App\Http\Livewire;

use App\Models\Announcement;
use App\Models\Category;
use Livewire\Component;

class CreateAnnouncement extends Component
{
    public $title;
    public $body;
    public $price;
    public $category;

    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category' => 'required',
        'price' => 'required|numeric'
    ];

    protected $messages = [
        'required' => 'Il campo è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute dev\'essere un numero',
    ];

    public function store()
    {
        $this->validate();

        $category = Category::find($this->category);
        $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        session()->flash('message', 'Annuncio inserito con successo');
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
