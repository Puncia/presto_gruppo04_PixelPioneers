<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Announcement extends Model
{
    use HasFactory, Searchable;
    protected $fillable = ['title', 'body', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray(){

        $category = $this->category;
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$this->category,
        ];
        return $array;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAnnouncement($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    

    public static function toBeRevisionedCount()
    {

    return Announcement::where('is_accepted', null)->count();
    }

}
