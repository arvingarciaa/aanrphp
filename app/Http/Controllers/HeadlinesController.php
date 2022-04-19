<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headline;
use App\Log;

class HeadlinesController extends Controller
{
    public function addHeadline(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $headline = new Headline;
            $headline->title = $request->title;
            $headline->link = $request->link;
            $headline->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added:</strong> '.$headline->title.'';
            $log->action = 'Added \''. $headline->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Headlines';
            $log->save();

            return redirect()->back()->with('success','Headline Added.'); 
        }
    }
    
    public function editHeadline(Request $request, $headline_id){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $headline = Headline::find($headline_id);

            if($headline->title != $request->title){
                $temp_changes = $temp_changes.'<strong>Name:</strong> '.$headline->title.' <strong>-></strong> '.$request->title.'<br>';
            }
            if($headline->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$headline->link.' <strong>-></strong> '.$request->link.'<br>';
            }
            
            $headline->title = $request->title;
            $headline->link = $request->link;
            $headline->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $headline->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Headlines';
            $log->save();

            return redirect()->back()->with('success','Headline Updated.'); 
        }
    }

    public function deleteHeadline($headline_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $headline = Headline::find($headline_id);

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Deleted:</strong> '.$headline->title.'';
            $log->action = 'Deleted \''. $headline->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Headlines';
            $log->save();

            $headline->delete();
            return redirect()->back()->with('success','Headline Deleted.'); 
        }
    }
}
