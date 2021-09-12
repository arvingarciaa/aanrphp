<?php

namespace App\Http\Controllers;
use App\ISP;
use Illuminate\Http\Request;

class ISPController extends Controller
{
    public function addISP(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));

        $isp = new ISP;
        $isp->name = $request->name;
        $isp->sector_id = $request->sector;
        $isp->description = $request->description;
        $isp->save();

        return redirect()->back()->with('success','ISP Added.'); 
    }
    
    public function editISP(Request $request, $isp_id){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));
        
        $isp = ISP::find($isp_id);
        $isp->name = $request->name;
        $isp->sector_id = $request->sector;
        $isp->description = $request->description;
        $isp->save();

        return redirect()->back()->with('success','ISP Updated.'); 
    }

    public function deleteISP($isp_id){
        $isp = ISP::find($isp_id);
        $isp->delete();
        return redirect()->back()->with('success','ISP Deleted.'); 
    }
}
