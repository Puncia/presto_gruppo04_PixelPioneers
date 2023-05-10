<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Vista dell'annuncio
    public function createAnnouncement()
    {
        return view('announcements.create');
    }
}
