<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consortia;

class ConsortiaController extends Controller
{
    public function addConsortia(Request $request){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));

        $consortia = new Consortia;
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('thumbnail')){
            $imageFile = $request->file('thumbnail');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->region = $request->region;
        $consortia->profile = $request->profile;
        $consortia->contact_name = $request->contact_name;
        $consortia->contact_details = $request->contact_details;
        $consortia->save();

        return redirect()->back()->with('success','Consortia Added.'); 
    }
    
    public function editConsortia(Request $request, $consortia_id){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));
        
        $consortia = Consortia::find($consortia_id);
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('thumbnail')){
            if($consortia->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
                unfull_name($image_path);
            }
            $imageFile = $request->file('thumbnail');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->region = $request->region;
        $consortia->profile = $request->profile;
        $consortia->contact_name = $request->contact_name;
        $consortia->contact_details = $request->contact_details;
        $consortia->save();

        return redirect()->back()->with('success','Consortia Updated.'); 
    }

    public function deleteConsortia($consortia_id){
        $consortia = Consortia::find($consortia_id);
        if($consortia->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
            unfull_name($image_path);
        }
        $consortia->delete();
        return redirect()->back()->with('success','Consortia Deleted.'); 
    }
}
