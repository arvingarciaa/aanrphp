<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;

class IndustriesController extends Controller
{
    public function addIndustry(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $user = auth()->user();
        $industry = new Industry;
        $industry->name = $request->name;
        $industry->save();

        return redirect()->back()->with('success','Industry Added.'); 
    }
    
    public function editIndustry(Request $request, $industry_id){
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $industry = Industry::find($industry_id);
        $industry->name = $request->name;
        $industry->save();

        return redirect()->back()->with('success','Industry Updated.'); 
    }

    public function deleteIndustry($industry_id, Request $request){
        $industry = Industry::find($industry_id);
        $deletedName = $industry->name;
        $industry->articles()->delete();
        $industry->delete();

        return redirect()->back()->with('success','Industry Deleted.'); 
    }

}
