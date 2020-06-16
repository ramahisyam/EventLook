<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\User;

class CreateEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('create-event');
    }

    public function store()
    {

        Event::create([
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

        return redirect()->route('home')->with('success', "Event Anda Berhasil Dipublikasi");
    }

    
}
