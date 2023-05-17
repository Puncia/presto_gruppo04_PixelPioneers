<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreateAnnouncement extends Component
{

    use WithFileUploads;

    public $title;
    public $body;
    public $category;
    public $message;
    public $validated;
    public $temporary_images;
    public $images = [];    
    public $announcement;
    public $price;
   


    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required |min:8',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'price'=>'numeric',
        'temporary_images.*' => 'image|max:1024',
    ];

    protected $messages = [
        'required' => 'Il campo è richiesto',
        'min' => 'Il campo :attribute è troppo corto',
        'numeric' => 'Il campo :attribute dev\'essere un numero',
        'images.image' => "l'immagine deve essere un immagine",
        'images.max' => "l'immagine deve essere massimo di 1mb",
        'temporary_images.required' => "L' immagine è richiesta",
        'temporary_images.*.image' => "i file devono essere immagini",
        'temporary_images.*.max' => "l'immagine deve essere massimo di 1Mb",

    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*' => 'image',
        ])) {

            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key)
    {

        if (in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    // public function store()
    // {
    //     $this->validate();

    //     $category = Category::find($this->category);
    
    //     $announcement = $category->announcements()->create([
    //         'title' => $this->title,
    //         'body' => $this->body,
    //         'price' => $this->price,

    //         $this→announcement = $image->user()->associate(Auth::user()),
    //         $this→announcement = $image->save(),
    //     ]);

    //     Auth::user()->announcements()->save($announcement);
        
    //     session()->flash('message', 'Annuncio inserito con successo');
    // $this->cleanform();
    // }

    public function store()
    {
        $this->validate();
        

        $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $this->announcement->images()->create(['path'=>$image->store('images', 'public')]);
               


            }
            $this→announcement = $image->user()->associate(Auth::user());
            $this→announcement = $image->save();
        }
        session()->flash('message', 'Annuncio inserito con successo, sarà pubblicato dopo la revisione');
        $this->cleanform();

    }

public function updated ($propertyName){
    $this->validateOnly($propertyName);
}

public function cleanform(){
    $this->title='';
    $this->body='';
    $this->category='';
    $this->message='';
    $this->temporary_images=[];
    $this->images =[] ;
    $this->price='';
}


    public function render()
    {
        return view('livewire.create-announcement');
    }
}
