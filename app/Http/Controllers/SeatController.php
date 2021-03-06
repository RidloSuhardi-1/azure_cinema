<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Seat;

class SeatController extends Controller
{
    // views

    public function viewSeats($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $seats = Seat::where('cinema_id', $decrypt_id)->orderBy('seat_name','asc')->paginate(5);

        $cinemas = \App\Cinema::find($decrypt_id);

        $data = array('seats' => $seats, 'cinemas' => $cinemas);

        return view('portal.pages.cinemas.cinema_seats')->with($data);
    }

    public function viewUpdate($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $seats = Seat::find($decrypt_id);

        $data = array('seats' => $seats);

        return view('portal.pages.cinemas.cinema_seat_edit')->with($data);
    }

    // logic

    public function store(Request $request, $id)
    {
        $input = $request->all();

        $decrypt_id = \Crypt::decrypt($id);

        $input['cinema_id'] = $decrypt_id;

        // validate incoming request

        $validator = Validator::make($input, [
            'seat_name' => ['required', 'min:2'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('seats', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        Seat::create($input);

        return redirect()->route('seats', $id)->withSuccess('Data saved successfully');
    }

    public function update(Request $request, $id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $seats = Seat::find($decrypt_id);

        $input = $request->all();

        $cinemaID = \Crypt::encrypt($seats->cinema_id);

        // validate incoming request

        $validator = Validator::make($input, [
            'seat_name' => ['required', 'min:2'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('seat.edit', $id)
                        ->withErrors($validator)
                        ->withInput();
        }

        // store

        $seats->seat_name = $request->seat_name;

        $seats->save();

        return redirect()->route('seats', $cinemaID)->withSuccess('Data has been successfully changed');
    }

    public function destroy($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $seats = Seat::find($decrypt_id);

        $cinemaID = \Crypt::encrypt($seats->cinema_id);

        /**
         *
         * delete seat data related to cinema
         *
         */

         $seats->delete();

         return redirect()->route('seats', $cinemaID)->withSuccess('Seat data deleted successfully');
    }
}
