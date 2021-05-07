<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConsortiaMember;

class ConsortiaMembersController extends Controller
{
    public function addConsortiaMember(Request $request){
        $this->validate($request, array(
            'acronym' => 'required|max:255',
            'name' => 'required'
        ));

        $consortia_member = new ConsortiaMember;
        $consortia_member->acronym = $request->acronym;
        $consortia_member->name = $request->name;
        $consortia_member->profile = $request->profile;
        $consortia_member->contact_name = $request->contact_name;
        $consortia_member->contact_details = $request->contact_details;
        $consortia_member->website = $request->website;
        $consortia_member->consortia_id = $request->consortia;
        $consortia_member->save();

        return redirect()->back()->with('success','Consortia Member Added.'); 
    }
    
    public function editConsortiaMember(Request $request, $consortia_member_id){
        $this->validate($request, array(
            'acronym' => 'required|max:255',
            'name' => 'required'
        ));
        
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        $consortia_member->acronym = $request->acronym;
        $consortia_member->name = $request->name;
        $consortia_member->profile = $request->profile;
        $consortia_member->contact_name = $request->contact_name;
        $consortia_member->contact_details = $request->contact_details;
        $consortia_member->website = $request->website;
        $consortia_member->consortia_id = $request->consortia;
        $consortia_member->save();

        return redirect()->back()->with('success','Consortia Member Updated.'); 
    }

    public function deleteConsortiaMember($consortia_member_id){
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        $consortia_member->delete();
        return redirect()->back()->with('success','Consortia Member Deleted.'); 
    }
}
