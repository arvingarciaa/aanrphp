<?php

namespace App\Http\Controllers;
use App\ISP;
use Illuminate\Http\Request;
use App\Log;

class ISPController extends Controller
{
    public function addISP(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:100',
            'sector' => 'required'
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $isp = new ISP;
            $isp->name = $request->name;
            $isp->sector_id = $request->sector;
            $isp->description = $request->description;
            $isp->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added:</strong> '.$isp->name.'';
            $log->action = 'Added \''. $isp->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'ISP';
            $log->save();

            return redirect()->back()->with('success','ISP Added.'); 
        }
    }
    
    public function editISP(Request $request, $isp_id){
        $this->validate($request, array(
            'name' => 'required|max:100',
            'sector' => 'required'
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $isp = ISP::find($isp_id);

            if($isp->name != $request->name){
                $temp_changes = $temp_changes.'<strong>Name:</strong> '.$isp->name.' <strong>-></strong> '.$request->name.'<br>';
            }
            if($isp->sector_id != $request->sector){
                $temp_changes = $temp_changes.'<strong>Sector ID:</strong> '.$isp->sector_id.' <strong>-></strong> '.$request->sector.'<br>';
            }
            if($isp->description != $request->description){
                $temp_changes = $temp_changes.'<strong>Description:</strong> '.$isp->description.' <strong>-></strong> '.$request->description.'<br>';
            }

            $isp->name = $request->name;
            $isp->sector_id = $request->sector;
            $isp->description = $request->description;
            $isp->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $isp->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'ISP';
            $log->save();

            return redirect()->back()->with('success','ISP Updated.'); 
        }
    }

    public function deleteISP($isp_id, Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $isp = ISP::find($isp_id);

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Deleted:</strong> '.$isp->name.'';
            $log->action = 'Deleted \''. $isp->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'ISP';
            $log->save();

            $isp->delete();
            return redirect()->back()->with('success','ISP Deleted.'); 
        }
    }
}
