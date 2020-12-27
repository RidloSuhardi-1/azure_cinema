<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Code;

class CodeController extends Controller
{
    // views

    public function viewCodes()
    {
        $codes = Code::paginate(5);

        $data = array('codes' => $codes);

        return view('portal.pages.management.code')->with($data);
    }

    public function viewUpdate($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $codes = Code::find($decrypt_id);

        $data = array('codes' => $codes);

        return view('portal.pages.management.code_edit')->with($data);
    }

    // logic

    public function store(Request $request)
    {
        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'code_name' => ['required', 'min:5'],
            'value' => ['required', 'numeric'],
            'code' => ['required', 'min:5'],
            'expired' => ['required'],
            'customer_type' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect('/codes')
                        ->withErrors($validator)
                        ->withInput();
        }

        Code::create($input);

        return redirect('/codes')->withSuccess('Data saved successfully');
    }

    public function destroy($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $codes = Code::find($decrypt_id);

        $codes->delete();

        return redirect('/codes')->withSuccess('Data deleted successfully');
    }

    public function search(Request $request, $key)
    {
        $codes = Code::where($key, 'like', '%'.$request->keyword.'%')->paginate(5);
        $result = $request->keyword;
        $total = $codes->total();

        $data = array('codes' => $codes, 'result' => $result, 'total' => $total);

        return view('portal.pages.management.code')->with($data);
    }
}
