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
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //      $this->middleware(function($request, $next){
    //     if(Gate::allows('login-customer')) return $next($request);
    //     abort(403, 'Anda tidak memiliki cukup hak akses');
    //     });
    // }

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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $input_data = $request->all();
        $input_data['password'] = Hash::make($input_data['password']);
        Member::create($input_data);
        return redirect('/login_consumer');
    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        $data = Member::where('email',$email)->first();
        if($data){ //apakah email tersebut ada atau tidak
            if(Hash::check($password,$data->password)){
                Session::put('username',$data->username);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('/dash');
            }
            else{
                return redirect('/coba')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('/coba')->with('alert','Password atau Email, Salah!');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/login_consumer');
    }
    public function account()
    {
        $province = DB::table('provinces')->get();
        $user_login = Member::where('id', Auth::id())->first();
        return view('users.account', compact('province', 'user_login'));
    }
    public function updateprofile(Request $request, $id)
    {
        $this->validate($request, [
            'address' => 'required',
            'city' => 'required',
            'mobile' => 'required',
        ]);
        $input_data = $request->all();
        DB::table('members')->where('id', $id)->update([
            'name' => $input_data['name'],
            'address' => $input_data['address'],
            'city' => $input_data['city'],
            'province' => $input_data['province'],
            'pincode' => $input_data['pincode'],
            'mobile' => $input_data['mobile']
        ]);
        return back()->with('message', 'Update Profile already!');
    }
    public function updatepassword(Request $request, $id)
    {
        $oldPassword = Member::where('id', $id)->first();
        $input_data = $request->all();
        if (Hash::check($input_data['password'], $oldPassword->password)) {
            $this->validate($request, [
                'newPassword' => 'required|min:6|max:12|confirmed'
            ]);
            $new_pass = Hash::make($input_data['newPassword']);
            Member::where('id', $id)->update(['password' => $new_pass]);
            return back()->with('message', 'Update Password Already!');
        } else {
            return back()->with('oldpassword', 'Old Password is Inconrrect!');
        }
    }
}
