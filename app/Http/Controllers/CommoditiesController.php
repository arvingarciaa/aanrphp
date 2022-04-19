<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commodity;

class CommoditiesController extends Controller
{
    public function addCommodity(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));

        
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $commodity = new Commodity;
            $commodity->name = $request->name;
            $commodity->isp_id = $request->isp;
            $commodity->description = $request->description;
            $commodity->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added </strong>\''. $commodity->name.'\' <strong>to commodities</strong>';
            $log->action = 'Added \''. $commodity->name.'\' to commodities';
            $log->IP_address = $request->ip();
            $log->resource = 'Commodities';
            $log->save();

            return redirect()->back()->with('success','Commodity Added.'); 
        }
    }
    
    public function editCommodity(Request $request, $commodity_id){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));
        
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $commodity = Commodity::find($commodity_id);

            if($commodity->name != $request->name){
                $temp_changes = $temp_changes.'<strong>Name:</strong> '.$commodity->name.' <strong>-></strong> '.$request->name.'<br>';
            }
            if($commodity->isp_id != $request->isp_id){
                $temp_changes = $temp_changes.'<strong>ISP ID:</strong> '.$commodity->isp_id.' <strong>-></strong> '.$request->isp.'<br>';
            }
            if($commodity->description != $request->description){
                $temp_changes = $temp_changes.'<strong>Description:</strong> '.$commodity->description.' <strong>-></strong> '.$request->description.'<br>';
            }

            $commodity->name = $request->name;
            $commodity->isp_id = $request->isp;
            $commodity->description = $request->description;
            $commodity->save();

            

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $commodity->name.'\' details';
            $log->IP_address = $request->ip();
            $log->resource = 'Commodities';
            $log->save();

            return redirect()->back()->with('success','Commodity Updated.');
        } 
    }

    public function deleteCommodity($commodity_id, Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $commodity = Commodity::find($commodity_id);
            $deletedName = $commodity->name;
            $commodity->delete();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Deleted </strong>\''. $deletedName;
            $log->action = 'Deleted \''. $deletedName.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Commodities';
            $log->save();

            return redirect()->back()->with('success','Commodity Deleted.'); 
        }
    }
}
