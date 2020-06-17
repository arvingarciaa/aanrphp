<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPageElement;

class LandingPageElementsController extends Controller
{
    public function updateTopBanner(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->top_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->top_banner;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->top_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Top banner image updated');
    }

    public function updateConsortiaBanner(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->consortia_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->consortia_banner;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->consortia_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Consortia banner image updated');
    }
}
