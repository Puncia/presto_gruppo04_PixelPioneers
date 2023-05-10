<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Vista dell'annuncio
    public function createAnnouncement()
    {
        return view('announcements.create');
    }

    public function showAnnouncement(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    public function indexAnnouncement()
    {
        $announcements = Announcement::paginate(6);
        return view('announcements.index', compact('announcements'));
    }
}
