<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }
    // funzione ACCETTA
    public function acceptAnnouncement (Announcement $announcement)
    {
        $announcement->setAnnouncement(true);
        return redirect()->back()->with('message',"Complimenti, hai accettato l\'annuncio");
        // return back()-›with('message',"Complimenti, hai accettato l\'annuncio");
    }
    // funzione RIFIUTA
    public function rejectAnnouncement (Announcement $announcement){

        $announcement->setAnnouncement(false);
        return redirect()->back()->with('message',"Complimenti, hai rifiuta l\'annuncio");
    }
}