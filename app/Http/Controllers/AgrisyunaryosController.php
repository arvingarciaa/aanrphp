<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agrisyunaryo;
use App\ArtifactAANR;

class AgrisyunaryosController extends Controller
{
    public function addAgrisyunaryo(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $user = auth()->user();
        $agrisyunaryo = new Agrisyunaryo;
        $agrisyunaryo->title = $request->title;
        $agrisyunaryo->description = $request->description;
        $agrisyunaryo->link = $request->link;
        $agrisyunaryo->keywords = $request->keywords;
        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $agrisyunaryo->image = $imageName;
        }
        $agrisyunaryo->save();

        $artifact = ArtifactAANR::firstOrNew(['title' => $request->title]);
        $artifact->description = $request->description;
        $artifact->link = $request->link;
        $artifact->imglink = $agrisyunaryo->image;
        $artifact->keywords = $request->keywords;
        $artifact->is_agrisyunaryo = 1;
        $artifact->save();

        return redirect()->back()->with('success','Agrisyunaryo Added.'); 
    }
    
    public function editAgrisyunaryo(Request $request, $agrisyunaryo_id){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        $agrisyunaryo = Agrisyunaryo::find($agrisyunaryo_id);
        $user = auth()->user();
        $agrisyunaryo->title = $request->title;
        $agrisyunaryo->description = $request->description;
        $agrisyunaryo->link = $request->link;
        $agrisyunaryo->keywords = $request->keywords;
        if($request->hasFile('image')){
            if($agrisyunaryo->image != null){
                $image_path = public_path().'/storage/page_images/'.$agrisyunaryo->image;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $agrisyunaryo->image = $imageName;
        }
        $agrisyunaryo->save();

        $artifact = ArtifactAANR::firstOrNew(['title' => $request->title]);
        $artifact->description = $request->description;
        $artifact->link = $request->link;
        $artifact->imglink = $agrisyunaryo->image;
        $artifact->keywords = $request->keywords;
        $artifact->is_agrisyunaryo = 1;
        $artifact->save();

        return redirect()->back()->with('success','Agrisyunaryo Updated.'); 
    }

    public function deleteAgrisyunaryo(Request $request){
        $agrisyunaryo = Agrisyunaryo::whereIn('id', $request->input('agrisyunaryo_check'))->get();
        foreach ($agrisyunaryo as $agrisyunaryo_single) {
            if($agrisyunaryo_single->image != null){
                $image_path = public_path().'/storage/page_images/'.$agrisyunaryo_single->image;
                if(file_exists($image_path)){
                        unlink($image_path);
                    }
            }
            $agrisyunaryo_single->delete();
          }
        return redirect()->back()->with('success','Agrisyunaryo Deleted.'); 
    }
}
