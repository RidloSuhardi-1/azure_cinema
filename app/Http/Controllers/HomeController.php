<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $home = Ticket::where('broadcast_date', '>', date('Y-m-d'))->get();
        $soon = \App\Film::where('label', 'soon')->get();

        $data = array('tickets' => $home, 'comingsoon' => $soon);

        return view('home.index')->with($data);
    }
}
