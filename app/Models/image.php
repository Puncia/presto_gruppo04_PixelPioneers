<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function announcement(){
        return $this->belongsTo(announcement::class);
    }
}
