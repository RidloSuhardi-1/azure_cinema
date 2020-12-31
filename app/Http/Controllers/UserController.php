<?php

namespace App\Http\Controllers;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
//     public function __construct()
//     {
//         //$this->middleware('auth');
//             $this->middleware(function($request, $next){
//                 if(Gate::allows('login-customer')) return $next($request);
//                     return redirect()->route('home');
//             });
//         } else {
//             return redirect()->route('home');
//         }
//     }

    public function indexLogin()
    {
        $user = Member::all();
        return view('home.pages.login', ['users' => $user]);
    }

    public function indexRegister()
    {
        $user = Member::all();

        return view('home.pages.register', ['users' => $user]);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $input_data = $request->all();
        $input_data['password'] = Hash::make($input_data['password']);

        // store

        Member::create($input_data);

        return redirect()->route('consumer.login')->with('RegisterSuccess', 'Please login to start your session');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = Member::where('email',$email)->first();

        if($data){
            //apakah email tersebut ada atau tidak
            if(Hash::check($password, $data->password)) {
                Session::put('id',$data->id);
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect()->route('home');
            }
            else{
                return redirect()->route('consumer.login')->with('incorrect','Password does not match');
            }
        }
        else{
            return redirect()->route('consumer.login')->with('unavailable','Email or password not available');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('id');
        Session::forget('username');
        Session::forget('email');
        Session::forget('login');

        return redirect()->route('home')->with('LogoutSuccess', 'Logout was successful');
    }
}
