<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Film;

class FilmController extends Controller
{
    // views

    public function viewFilms()
    {
        $films = Film::paginate(5);

        $data = array('films' => $films);

        return view('portal.pages.films.films')->with($data);
    }

    public function viewFilmDetails($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $films = Film::find($decrypt_id);

        $data = array('films' => $films);

        return view('portal.pages.films.film_details')->with($data);
    }

    public function viewUpdate($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);

        $films = Film::find($decrypt_id);

        $data = array('films' => $films);

        return view('portal.pages.films.film_edit')->with($data);
    }

    // logic

    public function store(Request $request)
    {
        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'item_name' => ['required', 'min:5'],
            'genre' => ['required'],
            'desc' => ['required', 'min:5'],
            'image' => ['max:4096', 'mimes:jpg,bmp,png'],
        ]);

        if ($validator->fails()) {
            return redirect('/films')
                        ->withErrors($validator)
                        ->withInput();
        }

        // check if file is available in request

        if ($request->hasFile('image')) {
            if ($request->file('image')) {
                $input['image'] = $request->file('image')->store('images/films', 'public');
            }
        } else {
            $input['image'] = 'empty';
        }

        // data collections separated by commas

        $genre = $input['genre'];
        $input['genre'] = implode(',', $genre);

        // store

        Film::create($input);

        return redirect('/films')->withSuccess('Data saved successfully');
    }

    public function update(Request $request, $id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $films = Film::find($decrypt_id);

        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'item_name' => ['required', 'min:5'],
            'genre' => ['required'],
            'desc' => ['required', 'min:10'],
            'image' => ['max:4096', 'mimes:jpg,bmp,png'],
        ]);

        if ($validator->fails()) {
            return redirect('/film/id/'.$id.'/edit')
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
            if ($films->image && file_exists(storage_path('app/public/'.$films->image))) {
                \Storage::delete('public/'.$films->image);
            }

            /**
             * store the image to 'storage/images/films' path
             * and set image path
            **/

            $image = $request->file('image')->store('images/films', 'public');

            $films->image = $image;
        }

        // data collections separated by commas

        $genre = $input['genre'];
        $input['genre'] = implode(',', $genre);

        // store
        $request->genre = $input['genre'];

        $films->item_name = $request->item_name;
        $films->genre = $request->genre;
        $films->desc = $request->desc;
        $films->label = $request->label;

        $films->save();

        return redirect('/films')->withSuccess('Data has been successfully changed');
    }

    public function destroy($id)
    {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $films = Film::find($decrypt_id);

        $films->delete();

        return redirect('/films')->withSuccess('Data deleted successfully');
    }

    public function search(Request $request, $key)
    {
        $films = Film::where($key, 'like', '%'.$request->keyword.'%')->paginate(10);
        $result = $request->keyword;
        $total = $films->total();

        $data = array('films' => $films, 'result' => $result, 'total' => $total);

        return view('portal.pages.films.films')->with($data);
    }
}
