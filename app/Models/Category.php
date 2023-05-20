<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function getCategoryLocale()
    {
        switch ($this->id) {
            case 1:
                return __('ui.M');
                break;
            case 2:
                return __('ui.I');
                break;
            case 3:
                return __('ui.E');
                break;
            case 4:
                return __('ui.L');
                break;
            case 5:
                return __('ui.G');
                break;
            case 6:
                return __('ui.S');
                break;
            case 7:
                return __('ui.Im');
                break;
            case 8:
                return __('ui.T');
                break;
            case 9:
                return __('ui.A');
                break;
        }
    }
}
