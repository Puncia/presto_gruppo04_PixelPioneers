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
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isRevisor')->except('becomeRevisor', 'makeRevisor');
    }

    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }

    // funzione ACCETTA
    public function acceptAnnouncement(Announcement $announcement)
    {
        $announcement->setAnnouncement(true);
        return redirect()->back()->with('message', "Complimenti, hai accettato l'annuncio")->with('announcement', $announcement);
    }

    // funzione RIFIUTA
    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAnnouncement(false);
        return redirect()->back()->with('message', "Complimenti, hai rifiutato l'annuncio")->with('announcement', $announcement);
    }

    public function revertAnnouncement(Announcement $announcement)
    {
        $announcement->setAnnouncement(null);
        return redirect()->route('revisor.index')->with('revert_message', "Operazione annullata con successo");
    }

    //diventare revisore (invio mail)
    public function becomeRevisor()
    {
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('message', 'Complimenti! hai richiesto di diventare revisore correttamente');
    }

    //rendere revisore
    public function makeRevisor(User $user)
    {
        Artisan::call('presto:makeUserRevisor', ["email" => $user->email]);
        return redirect('/')->with('message', "Complimenti! L'utente è diventato revisore");
    }
}
