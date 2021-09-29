<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialMediaSticky;

class SocialMediaStickyController extends Controller
{
    //
    public function AddSocial(Request $request){
        
        $social = new SocialMediaSticky;
        $social->name = $request->name;
        $social->link = $request->link;
        $social->save();

        return redirect()->back()->with('success','Social Added.'); 
    }

    public function editSocial(Request $request, $social_id){
        
        $social = SocialMediaSticky::find($social_id);
        if($request->hasFile('image')){
            if($pcaarrd_page->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$pcaarrd_page->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $social->image = $imageName;
        }
                $social->link = $request->link;
        $social->save();

        return redirect()->back()->with('success','Social Updated.'); 
    }
}
