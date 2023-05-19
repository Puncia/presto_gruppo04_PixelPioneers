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
        $announcements = Announcement::where('is_accepted', true)->orderByDesc('created_at')->paginate(10);

        if ($announcements->currentPage() === 1 && $announcements->count() < 10) {
            $extraAnnouncement = Announcement::orderByDesc('created_at')
                ->skip($announcements->count())
                ->first();

            if ($extraAnnouncement) {
                $announcements->push($extraAnnouncement);
            }
        }

        return view('announcements.index', compact('announcements'));
    }
}
