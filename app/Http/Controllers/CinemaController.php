<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cinema;

class CinemaController extends Controller
{
    // views

    public function viewCinemas()
    {
        $cinemas = Cinema::paginate(5);

        $data = array('cinemas' => $cinemas);

        return view('portal.pages.cinemas.cinemas')->with($data);
    }

    public function viewUpdate($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $cinemas = Cinema::find($decrypt_id);

        $data = array('cinemas' => $cinemas);

        return view('portal.pages.cinemas.cinema_edit')->with($data);
    }

    // logic

    public function store(Request $request)
    {
        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'cinema_name' => ['required', 'min:5'],
            'location' => ['required', 'min:5'],
            'desc' => ['max:500'],
            'image' => ['max: 4096', 'mimes:jpg,bmp,png'],
        ]);

        if ($validator->fails()) {
            return redirect('/cinemas')
                        ->withErrors($validator)
                        ->withInput();
        }

        // check if file is available in request

        if ($request->hasFile('image')) {
            if ($request->file('image')) {
                $input['image'] = $request->file('image')->store('images/cinemas', 'public');
            }
        } else {
            $input['image'] = 'empty';
        }

        // store

        Cinema::create($input);

        return redirect('/cinemas')->withSuccess('Data saved successfully');
    }

    public function update(Request $request, $id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $cinemas = Cinema::find($decrypt_id);

        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'cinema_name' => ['required', 'min:5'],
            'location' => ['required', 'min:5'],
            'desc' => ['max:500'],
            'image' => ['max:4096', 'mimes:jpg,bmp,png'],
        ]);

        if ($validator->fails()) {
            return redirect('/cinema/id/'.$id.'/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        /**
         *
         * check if file is available in request
         * if the image already exists, delete the existing image in storage
         *
        **/

        if ($request->hasFile('image')) {
            if ($cinemas->image && file_exists(storage_path('app/public/'.$cinemas->image))) {
                \Storage::delete('public/'.$cinemas->image);
            }

            /**
             * store the image to 'storage/images/cinemas' path
             * and set image path
            **/

            $image = $request->file('image')->store('images/cinemas', 'public');

            $cinemas->image = $image;
        }

        // store

        $cinemas->cinema_name = $request->cinema_name;
        $cinemas->location = $request->location;
        $cinemas->desc = $request->desc;

        $cinemas->save();

        return redirect('/cinemas')->withSuccess('Data has been successfully changed');

    }

    public function destroy($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $cinemas = Cinema::find($decrypt_id);

        /**
         *
         * check if file is available in request
         * if the image is exists, delete the existing image in storage
         *
        **/

        if ($cinemas->image && file_exists(storage_path('app/public/'.$cinemas->image)))
        {
            \Storage::delete('public/'.$cinemas->image);
        }

        /**
         *
         * delete all seat data related to cinema
         *
         */

        $seats = $cinemas->seats->where('cinema_id', $decrypt_id);
        $seats->each->delete();

        $cinemas->delete();

        return redirect('/cinemas')->withSuccess('Data deleted successfully');
    }

    public function search(Request $request, $key)
    {
        $cinemas = Cinema::where($key, 'like', '%'.$request->keyword.'%')->paginate(10);
        $result = $request->keyword;
        $total = $cinemas->total();

        $data = array('cinemas' => $cinemas, 'result' => $result, 'total' => $total);

        return view('portal.pages.cinemas.cinemas')->with($data);
    }
}
