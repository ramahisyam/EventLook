<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
        $events = Event::where('user_id', Auth::id())->latest()->get();
        return view('home', compact('events'));
    }
    
    public function edit(Event $event)
    {
        return view('edit-event', compact('event'));
    }

    public function update(Event $event)
    {
        if ($event->photo) {
            Storage::delete($event->photo);
        }

        $event->update([
            'user_id' => request('user_id'),
            'name' => request('name'),
            'place' => request('place'),
            'address' => request('address'),
            'city' => request('city'),
            'date' => request('date'),
            'starting_hour' => request('starting_hour'),
            'end_hour' => request('end_hour'),
            'registration_link' => request('registration_link'),
            'contact_person' => request('contact_person'),
            'description' => request('description'),
            'photo' => request()->file('photo')->store('images')
        ]);
        return redirect()->route('home')->with('info', "Event Anda Berhasil Dirubah");
    }

    public function destroy(Event $event)
    {
        $event->delete();
        Storage::delete($event->photo);
        return redirect()->route('home')->with('danger', "Event Anda Berhasil Dihapus");
    }
}
