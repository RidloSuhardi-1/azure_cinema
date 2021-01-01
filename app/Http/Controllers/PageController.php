<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;
use App\Film;
use App\Ticket;
use App\Transaction;
use PDF;

class PageController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //     $this->middleware(function($request, $next){
    //         if(Gate::allows('login-customer')) return $next($request);
    //             return redirect()->route('home');
    //     });
    // }

    // view

     public function viewMovie($id)
     {
         $decrypt_id = \Crypt::decrypt($id);
         $tickets = Ticket::find($decrypt_id);

         $data = array('ticket' => $tickets);

         return view('home.pages.movie_details')->with($data);
     }

     public function viewMovieCart(Request $request, $id)
     {
         $decrypt_id = \Crypt::decrypt($id);
         $transact = Transaction::all();
         $tickets = Ticket::find($decrypt_id);

         $total = $request['qty'] * $tickets->price;

         $data = array('ticket' => $tickets, 'transact' => $transact, 'qty' => $request['qty'], 'total' => $total);

         return view('home.pages.movie_cart')->with($data);
     }

     public function viewMovieLists()
     {
         $films = Film::orderBy('created_at', 'DESC')->paginate(5);

         $data = array('films' => $films);

         return view('home.pages.movie_lists')->with($data);
     }

     public function viewTransactions()
     {
         $transact = Transaction::where('customer_id', Session('id'))->paginate(5);

         $data = array('transact' => $transact);

         return view('home.pages.transaction')->with($data);
     }

    //  logic

    public function checkout(Request $request, $id)
    {
        $input = $request->all();

        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $ticket = Ticket::find($decrypt_id);
        $codes = \App\Code::all();

        $validator = Validator::make($input, [
            'qty' => ['required'],
            'total' => ['required'],
            'seat-selection' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $code;
        $totalBefore = 0; // this variable holds the previous total value

        /**
         * compare the seat select between quantity
         */

        if ((count($input['seat-selection'])) == $input['qty']) {

            /**
             * Check the code if exists
             */

            //  dd($codes->count());


            if (isset($input['code']))
            {
                $status = 0;

                for ($i = 0; $i < $codes->count(); $i++) {
                    // if code not same
                    if ($input['code'] == $codes[$i]['code']) {
                        $status = 1;
                        if ($input['total'] > $codes[$i]['minimum']) {
                            $totalBefore = $input['total'];
                            $input['total'] = $input['total'] - $codes[$i]['value'];
                            break;
                        } else {
                            return redirect()->back()->with('reachminimum', 'Did not reach the minimum transaction');
                        }
                    } else {
                        $status = 0;
                    }
                }

                /**
                 *
                 * check if the status result is 0,
                 * if it is 0 then redirect to the previous page
                 *
                 */

                if ($status == 0) {
                    return redirect()->back()->with('codeinvalid', 'Code Invalid');
                }

            } else {
                $input['code'] = '-';
            }
        } else {
            return redirect()->back()->with('seatqty', 'Seats must match the quantity');
        }

        //

        $data = array('tickets' => $ticket, 'seats' => $input['seat-selection'], 'total' => $input['total'], 'totalBefore' => $totalBefore, 'qty' => $input['qty'], 'code' => $input['code']);

        return view('home.pages.checkout')->with($data);
    }

    public function checkoutProcess(Request $request)
    {
        $input = $request->all();

        $transact = new Transaction();
        $ticket = Ticket::find($input['ticket_id']);

        foreach($input['seats'] AS $key => $seat) {
            Transaction::create([
                'customer_id' => Session('id'),
                'ticket_id' => $input['ticket_id'],
                'seat_id' => $input['seats'][$key],
                'qty' => $input['qty'],
                'price_per_item' => $input['item_price'],
                'total_price' => $input['total'],
                'valid_until' => $input['valid']
            ]);
        }

        $ticket->stock -=  $input['qty'];
        $ticket->save();

        return redirect()->route('movie.transactions.thankyou');
    }

    public function viewThanks() {
        return view('home.pages.thankyou');
    }

    public function print($id)
    {
        $transact = Transaction::find($id);

        $pdf = PDF::loadview('home.pages.ticket', ['transact' => $transact]);
        return $pdf->stream();
        // return view('home.pages.ticket',  ['transact' => $transact]);
    }

}
