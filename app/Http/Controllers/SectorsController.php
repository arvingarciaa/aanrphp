<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sector;

class SectorsController extends Controller
{
    public function addSector(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));

        $user = auth()->user();
        $sector = new Sector;
        $sector->name = $request->name;
        $sector->industry_id = $request->industry;
        $sector->description = $request->description;
        $sector->save();

        return redirect()->back()->with('success','Sector Added.'); 
    }
    
    public function editSector(Request $request, $sector_id){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));
        
        $user = auth()->user();
        $sector = Sector::find($sector_id);
        $sector->name = $request->name;
        $sector->industry_id = $request->industry;
        $sector->description = $request->description;
        $sector->save();

        return redirect()->back()->with('success','Sector Updated.'); 
    }

    public function deleteSector($sector_id, Request $request){
        $sector = Sector::find($sector_id);
        $deletedName = $sector->name;
        $sector->delete();

        return redirect()->back()->with('success','Sector Deleted.'); 
    }
}
