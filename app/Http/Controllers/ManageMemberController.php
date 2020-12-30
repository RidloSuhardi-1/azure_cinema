<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use PDF;

class ManageMemberController extends Controller
{
    public function manage() {
        $user = User::paginate(5);
        return view('portal.pages.employees.manage_members', ['users' => $user]);
      }
  
  public function store(Request $request){
          $input = $request->all();
  
          // validate incoming request
  
          $validator = Validator::make($input, [
              'username' => ['required', 'min:5'],
              'email' => ['required', 'min:5'],
          ]);
  
          if ($validator->fails()) {
              return redirect('/membermanage')
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
  
          User::create($input);
  
          return redirect('/membermanage')->withSuccess('Data saved successfully');
      }

      public function viewUpdate($id)
      {
          // decrypt id request
  
          $decrypt_id = \Crypt::decrypt($id);
          $users = User::find($decrypt_id);
  
          $data = array('users' => $users);
  
          return view('manage.user_edit')->with($data);
      }
  
      public function update(Request $request, $id)
      {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $users = User::find($decrypt_id);

        $input = $request->all();

        // validate incoming request

        $validator = Validator::make($input, [
            'username' => ['required', 'min:5'],
            'email' => ['max:500'],
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
        // store

        $users->username = $request->username;
        $users->email = $request->email;
        $users->save();

        return redirect('/membermanage')->withSuccess('Data has been successfully changed');

    }  
    public function destroy($id)
      {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $users = User::find($decrypt_id);

        /**
         *
         * check if file is available in request
         * if the image is exists, delete the existing image in storage
         *
        **/

        /**
         *
         * delete all seat data related to cinema
         *
         */
        $users->delete();

        return redirect('/membermanage')->withSuccess('Data deleted successfully');
    }
    public function search(Request $request, $key)
      {
        $users = User::where($key, 'like', '%'.$request->keyword.'%')->paginate(10);
        $result = $request->keyword;
        $total = $users->total();

        $data = array('users' => $users, 'result' => $result, 'total' => $total);

        return view('manage.user_manage')->with($data);
      }
}
