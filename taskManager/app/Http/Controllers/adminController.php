<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\giver;
use App\Models\receiver;

class adminController extends Controller
{

    function adminEdit(){

        $receivers = receiver::paginate('15');
        $givers = giver::paginate('15');
        $search = '';
        $Data = compact('givers','receivers','search');
        return view('admin/admin')->with($Data);

    }

    
    function showGiversAdmin(){

        $givers = giver::paginate('15');
        $receivers = [];
        $search = '';
        $Data = compact('givers','receivers','search');
        return view('admin/admin')->with($Data);

    }

    function showReceiversAdmin(){
        $givers = [];
        $search = '';
        $receivers = receiver::paginate('15');
        $Data = compact('givers','receivers','search'); 
        return view('admin/admin')->with($Data);
    }

    function addGiver(Request $request){
        return view('register_giver');
    }

    function addReceiver(Request $request){
        return view('register_receiver');
    }

    function search(Request $request){
        $search = $request['search'] ?? '';

        if($search != ''){
            $givers = giver::where('name','LIKE', '%'.$search.'%')->orwhere('email','like','%'.$search.'%')->paginate('15');
            $receivers = receiver::where('name','LIKE', '%'.$search.'%')->orwhere('email','like','%'.$search.'%')->paginate('15');
        }
        else{
            return redirect(route('adminEdit'))->with('error','Search by name or email');
        }
        $Data = compact('givers','receivers','search');
            return view('admin/admin')->with($Data);
    }

    function trashSearch(Request $request){
        $search = $request['search'] ?? '';

        if($search != ''){
            $givers = giver::onlyTrashed()->where('name','like','%'.$search.'%')->get();
            $receivers = receiver::onlyTrashed()->where('name','like','%'.$search.'%')->get();
        }
        else{
            return redirect(route('viewTrash'))->with('error','Search by name');
        }
        $Data = compact('givers','receivers','search');
            return view('admin/trash')->with($Data);
    }

    function trashGiver($id){
        $giver = giver::find($id)->delete();
        if($giver){
            return redirect()->back()->with('success','Deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Could not delete');
        }
    }

    function trashReceiver($id){
        $receiver = receiver::find($id)->delete();
        if($receiver){
            return redirect()->back()->with('success','Deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Could not delete');
        }
    }

    function viewTrash(){
        $givers = giver::onlyTrashed()->get();
        $receivers = receiver::onlyTrashed()->get();
        $search = '';
        $Data = compact('givers','receivers','search');
        return  view('admin/trash')->with($Data);
    }

    function restoreGiver($id){
        $givers = giver::withTrashed()->find($id);
        if($givers){
            $givers->restore();
            return redirect()->back()->with('success','Restored Successfully');
        }
        return redirect()->back()->with('error','Could not find the giver') ;
    }

    function restoreReceiver($id){
        $receivers = receiver::withTrashed()->find($id);
        if($receivers){
            $receivers->restore();
            return redirect()->back()->with('success','Restored Successfully');
        }
        return redirect()->back()->with('error','Could not find the receiver') ;

    }

    function deleteGiverForce($id){
        $giver = giver::withTrashed()->find($id);
        if($giver){
            $giver->forceDelete();
            return redirect()->back()->with('error','Deleted giver permanently');
        }
        return redirect()->back()->with('error','Could not find the giver');
    }

    function deleteReceiverForce($id){
        $receiver = receiver::withTrashed()->find($id);
        if($receiver){
            $receiver->forceDelete();
            return redirect()->back()->with('error','Deleted receiver permanently');
        }
        return redirect()->back()->with('error','Could not find the receiver');
    }
}
