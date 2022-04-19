<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderLink;
use App\Log;

class HeaderLinksController extends Controller
{
    //
    public function AddHeaderLink(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $header = new HeaderLink;
            $header->name = $request->name;
            $header->position = $request->weight;
            $header->link = "http://" . $request->link;
            $header->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added:</strong> '.$header->name.'';
            $log->action = 'Added \''. $header->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Header Links';
            $log->save();

            return redirect()->back()->with('success','Header Link Updated.');
        } 
    }
    public function editHeaderLink(Request $request, $header_id){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $header = HeaderLink::find($header_id);

            if($header->name != $request->name){
                $temp_changes = $temp_changes.'<strong>Name:</strong> '.$header->name.' <strong>-></strong> '.$request->name.'<br>';
            }
            if($header->position != $request->position){
                $temp_changes = $temp_changes.'<strong>Position:</strong> '.$header->position.' <strong>-></strong> '.$request->position.'<br>';
            }
            if($header->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$header->link.' <strong>-></strong> '.$request->link.'<br>';
            }

            $header->name = $request->name;
            $header->position = $request->weight;
            /*
            if($request->link){
                if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                    $header->link = "http://" . $request->link;
                }
            } */
            $header->link = $request->link;
            $header->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $header->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Header Links';
            $log->save();

            return redirect()->back()->with('success','Header Link Updated.'); 
        }
    }
    public function deleteHeaderLink($header_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $header = HeaderLink::find($header_id);

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Deleted:</strong> '.$header->name.'';
            $log->action = 'Deleted \''. $header->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Header Links';
            $log->save();

            $header->delete();
            return redirect()->back()->with('success','Header Link Deleted.'); 
        }
    }
}
