<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contributor;

class ContributorsController extends Controller
{
    public function addContributor(Request $request){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));

        $user = auth()->user();
        $contributor = new Contributor;
        $contributor->first_name = $request->first_name;
        $contributor->last_name = $request->last_name;
        $contributor->email = $request->email;
        $contributor->feedback = $request->feedback;
        $contributor->save();

        return redirect()->back()->with('success','Contributor Added.'); 
    }
    
    public function editContributor(Request $request, $contributor_id){
        $this->validate($request, array(
            'first_name' => 'required|max:200',
            'last_name' => 'required|max:200'
        ));
        
        $user = auth()->user();
        $contributor = Contributor::find($contributor_id);
        $contributor->first_name = $request->first_name;
        $contributor->last_name = $request->last_name;
        $contributor->email = $request->email;
        $contributor->feedback = $request->feedback;
        $contributor->save();

        return redirect()->back()->with('success','Contributor Updated.'); 
    }

    public function deleteContributor($contributor_id, Request $request){
        $contributor = Contributor::find($contributor_id);
        $contributor->delete();

        return redirect()->back()->with('success','Contributor Deleted.'); 
    }
}
