<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialMediaSticky;

class SocialMediaStickyController extends Controller
{
    //
    public function editSocial(Request $request, $social_id){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        
        $social = SocialMediaSticky::find($social_id);
        $social->name = $request->name;
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
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $social->link = "http://" . $request->link;
            }
        }
        $social->save();

        return redirect()->back()->with('success','Social Updated.'); 
    }
}
