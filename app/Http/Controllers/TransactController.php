<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactController extends Controller
{
    // views

    public function viewTransactions()
    {
        $trx = Transaction::paginate(5);

        $data = array('transaction' => $trx);

        return view('portal.pages.management.transaction')->with($data);
    }

    public function add()
    {
        $tickets = \App\Ticket::all();

        $data = array('tickets' => $tickets);

        return view('portal.pages.management.forms.add')->with($data);
    }
}
