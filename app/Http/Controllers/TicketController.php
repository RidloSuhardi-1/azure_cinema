<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Ticket;

class TicketController extends Controller
{
    // views

    public function viewTickets()
    {
        $tickets = Ticket::paginate(5);
        $cinemas = \App\Cinema::orderBy('cinema_name', 'ASC')->get();

        $films = \App\Film::where('label', 'standart')
                        ->orWhere('label', 'premium')->get();

        $data = array('tickets' => $tickets, 'cinemas' => $cinemas, 'films' => $films);

        return view('portal.pages.management.ticket')->with($data);
    }

    // logic

    public function store(Request $request)
    {
        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'item_id' => ['required'],
            'cinema_id' => ['required'],
            'broadcast_date' => ['required'],
            'broadcast_time' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('tickets')
                        ->withErrors($validator)
                        ->withInput();
        }

        Ticket::create($input);

        return redirect()->route('tickets')->withSuccess('Data saved successfully');
    }

    public function destroy($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $tickets = Ticket::find($decrypt_id);

        $tickets->delete();

        return redirect()->route('tickets')->withSuccess('Data deleted successfully');
    }
}
