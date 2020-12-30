<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Member;
use Illuminate\Support\Facades\Validator;
use PDF;

class ManageUserController extends Controller
{
     // public function __construct()
    // {
    //     //$this->middleware('auth');
    //      $this->middleware(function($request, $next){
    //     if(Gate::allows('login-employee')) return $next($request);
    //     abort(403, 'Anda tidak memiliki cukup hak akses');
    //     });
    // }  
  public function manage() {
        $user = Member::paginate(5);
        return view('manage.user_manage', ['users' => $user]);
      }
  
  public function store(Request $request){
          $input = $request->all();
  
          // validate incoming request
  
          $validator = Validator::make($input, [
              'username' => ['required', 'min:5'],
              'email' => ['required', 'min:5'],
          ]);
  
          if ($validator->fails()) {
              return redirect('/usermanage')
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
  
          Member::create($input);
  
          return redirect('/usermanage')->withSuccess('Data saved successfully');
      }

      public function viewUpdate($id)
      {
          // decrypt id request
  
          $decrypt_id = \Crypt::decrypt($id);
          $users = Member::find($decrypt_id);
  
          $data = array('users' => $users);
  
          return view('manage.user_edit')->with($data);
      }
  
      public function update(Request $request, $id)
      {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $users = Member::find($decrypt_id);

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

        return redirect('/usermanage')->withSuccess('Data has been successfully changed');

    }  
    public function destroy($id)
      {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $users = Member::find($decrypt_id);

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

        return redirect('/usermanage')->withSuccess('Data deleted successfully');
    }
    public function search(Request $request, $key)
      {
        $users = Member::where($key, 'like', '%'.$request->keyword.'%')->paginate(10);
        $result = $request->keyword;
        $total = $users->total();

        $data = array('users' => $users, 'result' => $result, 'total' => $total);

        return view('manage.user_manage')->with($data);
      }

      public function showpremium() {
        $user = Member::where('label','premium')->paginate(5);
        return view('portal.pages.customers.premium_customers', ['users' => $user]);
      }
      public function show() {
        $user = Member::where('label','free')->paginate(5);
        return view('portal.pages.customers.free_customers', ['users' => $user]);
      }

      public function storepremium(Request $request,$id){
        $input = Member::find($id);

        // validate incoming request

        $validator = Validator::make($input, [
            'username' => ['required', 'min:5'],
            'email' => ['required', 'min:5'],
        ]);

        if ($validator->fails()) {
            return redirect('/usermanage')
                        ->withErrors($validator)
                        ->withInput();
        }

        // check if file is available in request

        // store

        Member::create($input);

        return redirect('/premium_customers')->withSuccess('Data saved successfully');
    }

  public function viewUpdatepremium($id)
      {
          // decrypt id request
  
          $decrypt_id = \Crypt::decrypt($id);
          $users = Member::find($decrypt_id);
  
          $data = array('users' => $users);
  
          return view('manage.userpremium_edit')->with($data);
      }
      public function updatepremium(Request $request, $id)
      {
        // decrypt id request

        $decrypt_id = \Crypt::decrypt($id);
        $users = Member::find($decrypt_id);

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

        return redirect('/usermanage')->withSuccess('Data has been successfully changed');

    }
      
      //public function cetak_pdf(){
      //$article = User::all();
      //$pdf = PDF::loadview('user_pdf',['user'=>$article]);
      //return $pdf->stream();
      //return view('user_pdf',['user'=>$article]);
    //}
}
