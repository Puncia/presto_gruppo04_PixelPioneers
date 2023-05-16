<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::take(6)->orderByDesc('created_at')->get();

        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements()->orderByDesc('created_at')->paginate(10);
        return view('categoryShow', compact('announcements'));
    }
    //ricerca annunci
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->where('is_accepted', true)->paginate(10);
        return view('announcements.index', compact('announcements'));
    }
}
