<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images= [];
    public $image;
    public $form_id;
    public $announcement;
    public $validated;
    public $message;



    protected $rules = [
        'title' => 'required',
        'body' => 'required',
        'category' => 'required',
        'price' => 'required|numeric',
        'images.*'=> 'image',
        'temporary_images.*'=> 'image',
    ];
    
    protected $messages = [
        'required' => 'Il campo è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute dev\'essere un numero',
        'images.image'=> "l'immagine deve essere un immagine",
        'images.max'=> "l'immagine deve essere massimo di 1mb",
        'temporary_images.required' =>"L' immagine è richiesta",
        'temporary_images.*.image' =>"i file devono essere immagini",
        'temporary_images.*.max' =>"l'immagine deve essere massimo di 1Mb",

    ];

    public function store()
    {
        $this->validate();

        $category = Category::find($this->category);
        $announcement = $category->announcements()->create([
            'title' => $this->title,
            'body' => $this->body,
            'price' => $this->price,
        ]);

        Auth::user()->announcements()->save($announcement);

        session()->flash('message', 'Annuncio inserito con successo');
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
            ])) 
            {
            
            foreach ($this->temporary_images as $image){
                $this->images[]= $image;
            }

            }
        }

}
