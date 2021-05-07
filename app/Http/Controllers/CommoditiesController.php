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

        $commodity = new Commodity;
        $commodity->name = $request->name;
        $commodity->isp_id = $request->isp;
        $commodity->description = $request->description;
        $commodity->save();

        return redirect()->back()->with('success','Commodity Added.'); 
    }
    
    public function editCommodity(Request $request, $commodity_id){
        $this->validate($request, array(
            'name' => 'required|max:100'
        ));
        
        $commodity = Commodity::find($commodity_id);
        $commodity->name = $request->name;
        $commodity->isp_id = $request->isp;
        $commodity->description = $request->description;
        $commodity->save();

        return redirect()->back()->with('success','Commodity Updated.'); 
    }

    public function deleteCommodity($commodity_id, Request $request){
        $commodity = Commodity::find($commodity_id);
        $deletedName = $commodity->name;
        $commodity->delete();

        return redirect()->back()->with('success','Commodity Deleted.'); 
    }
}
