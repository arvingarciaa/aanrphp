<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consortium;

class ConsortiaController extends Controller
{
    public function addConsortia(Request $request){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required',
            'image' => 'required'
        ));

        $consortia = new Consortium;
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->save();

        return redirect()->back()->with('success','Consortia Added.'); 
    }
    
    public function editConsortia(Request $request, $consortia_id){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required',
            'image' => 'required'
        ));
        
        $consortia = Consortium::find($consortia_id);
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('image')){
            if($consortia->thumbnail != null){
                $image_path = public_path().'/storage/images/'.$consortia->thumbnail;
                unfull_name($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->save();

        return redirect()->back()->with('success','Consortia Updated.'); 
    }

    public function deleteConsortia($consortia_id){
        $consortia = Consortium::find($consortia_id);
        if($consortia->thumbnail != null){
            $image_path = public_path().'/storage/images/'.$consortia->thumbnail;
            unfull_name($image_path);
        }
        $consortia->delete();
        return redirect()->back()->with('success','Consortia Deleted.'); 
    }
}
