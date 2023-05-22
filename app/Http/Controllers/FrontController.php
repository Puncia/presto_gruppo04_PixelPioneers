<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function welcome()
    {
        $announcements = Announcement::take(6)->orderByDesc('created_at')->where('is_accepted', true)->get();

        return view('welcome', compact('announcements'));
    }

    public function categoryShow(Category $category)
    {
        $announcements = $category->announcements()->where('is_accepted', true)->orderByDesc('created_at')->paginate(12);

        // if ($announcements->currentPage() === 1 && $announcements->count() < 12 && $announcements->count() > 1) {
        //     $extraAnnouncement = Announcement::orderByDesc('created_at')
        //         ->skip($announcements->count())
        //         ->first();

        //     if ($extraAnnouncement) {
        //         $announcements->push($extraAnnouncement);
        //     }
        // }

        return view('categoryShow', compact('announcements', 'category'));
    }

    //ricerca annunci
    public function searchAnnouncements(Request $request)
    {
        $announcements = Announcement::search($request->searched)->orderBy('created_at', 'desc')->where('is_accepted', true)->paginate(12);
        return view('announcements.index', compact('announcements'));
    }

    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
