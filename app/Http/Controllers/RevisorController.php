<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

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
        return redirect()->back()->with('message',"Complimenti, hai accettato l'annuncio");
        // return back()-›with('message',"Complimenti, hai accettato l\'annuncio");
    }
    // funzione RIFIUTA
    public function rejectAnnouncement (Announcement $announcement){

        $announcement->setAnnouncement(false);
        return redirect()->back()->with('message',"Complimenti, hai rifiuta l'annuncio");
    }
    //diventare revisore (invio mail)
    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Complimenti! hai richiesto di diventare revisore correttamente');
    }
    //rendere revisore
    public function makeRevisor(User $user){
       Artisan::call('presto:MakeUserRevisor', ["email"=>$user->email]);
       return redirect('welcome')->with('message', 'Complimenti! L\'utente è diventato revisore');
    }
}