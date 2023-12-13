<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\giver;
use App\Models\receiver;

class giverController extends Controller
{
    function uploadGiver(Request $request){
        
        $name = date("Y-m-d",time()).'-'.time().'-'.$request->file('file')->getClientOriginalName();

        $request->file('file')->storeAs('public/givers', $name);

        $user = giver::find(Auth::guard('givers')->user()->giver_id);
        $user['images'] = $name;
        $user->save();

        return redirect(route('homepageGiver'))->with('success','Successfully updated');

    }

    function updateGiver(Request $request){
        $user = giver::find(Auth::guard('givers')->user()->giver_id);
        
        $user->name = $request->input('name') ?? $user->name; 
        $user->email = $request->input('email') ?? $user->email; 
        $user->save();
        return redirect(route('homepageGiver'))->with('success','Successfully updated');
    }
}
