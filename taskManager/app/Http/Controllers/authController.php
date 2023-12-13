<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

use App\Models\giver;

use App\Models\receiver;


use App\Http\Controllers\adminController;

class authController extends Controller{

    public function __invoke(Request $request){
        
    }

    function loginGiver(){
        if(Auth::guard('givers')->check()){
            return redirect(route('homepageGiver'));
        }
        else{
            return view('givers/login_giver');
        }
    }

    function loginReceiver(){
        if(Auth::guard('receivers')->check()){
            return redirect(route('homepageReceiver'));
        }
        else{
            return view('receivers/login_receiver');
        }
    }

    function registerGiver(){
        if(Auth::guard('givers')->check()){
            return redirect(route('homepageGiver'));
        }
        else{
            return view('givers/register_giver');
        }
    }

    function registerReceiver(){
        if(Auth::guard('receivers')->check()){
            return redirect(route('homepageReceiver'));
        }
        else{
            return view('receivers/register_receiver');
        }
    }
    
    function loginGiverPost(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::guard('givers')->attempt($credentials)){
            return redirect(route('homepageGiver'));
        }
        else{
            return redirect(route('loginGiver'))->with('error','Invalid credentials. Try again');
        }
    }

    function loginReceiverPost(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::guard('receivers')->attempt($credentials)){
            return redirect(route('homepageReceiver'));
        }
        else{
            return redirect(route('loginReceiver'))->with('error','Invalid credentials. Try again');
        }
    }

    function registerGiverPost(Request $request){
        
        $request->validate([
            'email'=> 'unique:givers'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = giver::create($data);

        if($user){
            return redirect(route('loginGiver'))->with('success','Registration successful');
        }

        else{
            return redirect(route('registerGiver'))->with('error','Registration failed');
        }

    }

    function registerReceiverPost(Request $request){
        
        $request->validate([
            'email'=> 'unique:receivers'
        ]);

        $receiverData = new receiver;
        $receiverData->name = $request['name'];
        $receiverData->email = $request['email'];
        $receiverData->password = Hash::make($request['password']);
        $saveSuccess = $receiverData->save();

        if($saveSuccess){
            return redirect(route('loginReceiver'))->with('success','Registration successful as a RECEIVER');
        }

        else{
            return redirect(route('registerReceiver'))->with('error','Registration failed');
        }

    }

    function homepageGiver(){
        if(Auth::guard('givers')->check()){
            return view('givers/homepage_giver');
        }
        else{
            return redirect(route('loginGiver'))->with('error','You must be logged in to access this page');
        }
    }
    
    function homepageReceiver(){
        if(Auth::guard('receivers')->check()){
            return view('receivers/homepage_receiver');
        }
        else{
            return redirect(route('loginReceiver'))->with('error','You must be logged in to access this page');
        }
    }

    function profileGiver(){
        if(Auth::guard('givers')->check()){
            $users = giver::find(Auth::guard('givers')->user()->giver_id);
            $user = compact('users');
            return view('givers/profile_giver')->with($user);
        }
        else{
            return redirect(route('loginGiver'))->with('error','You must be logged in to access this page');
        }
    }

    function profileReceiver(){
        if(Auth::guard('receivers')->check()){
            return view('receivers/profile_receiver');
        }
        else{
            return redirect(route('loginReceiver'))->with('error','You must be logged in to access this page');
        }
    }

    function showGivers(){
        if(Auth::guard('givers')->check()){
            $givers = giver::all();
            $giversData = compact('givers');
            return view('givers/givers_data')->with($giversData);
        }
        else{
            return redirect(route('loginGiver'))->with('error','You must be logged in to access this page');
        }
    }
    
    function showReceivers(){
        if(Auth::guard('receivers')->check()){
            $receivers = receiver::all();
            $receiversData = compact('receivers');
            return view('receivers/receivers_data')->with($receiversData);
        }
        else{
            return redirect(route('loginReceiver'))->with('error','You must be logged in to access this page');
        }
    }

    function logoutGiver(){
        if(Auth::guard('givers')->check()){
            
            Auth::guard('givers')->logout();
            return redirect(route('loginGiver'))->with('success','Successfully logged out');
        }
        else{
            return redirect(route('loginGiver'))->with('error','You must be logged in to access this page');
        }
        
    }

    function logoutReceiver(){
        if(Auth::guard('receivers')->check()){
            
            Auth::guard('receivers')->logout();
            return redirect(route('loginReceiver'))->with('success','Successfully logged out');
        }
        else{
            return redirect(route('loginReceiver'))->with('error','You must be logged in to access this page');
        }
    }

}
