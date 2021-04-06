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

    public function updateHeaderLogo(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->header_logo != null){
                $image_path = public_path().'/storage/page_images/'.$page->header_logo;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->header_logo = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Header Logo image updated');
    }

    public function updateLandingPageViews(Request $request){
        $page = LandingPageElement::find(1);
        $page->landing_page_item_carousel = $request->input('landing_page_item_carousel');
        $page->landing_page_item_social_media_button = $request->input('landing_page_item_social_media_button');
        $page->landing_page_item_search_bar = $request->input('landing_page_item_search_bar');
        $page->landing_page_item_technology_latest_in_aanr = $request->input('landing_page_item_technology_latest_in_aanr');
        $page->landing_page_item_consortia = $request->input('landing_page_item_consortia');
        $page->landing_page_item_explore_aanr = $request->input('landing_page_item_explore_aanr');
        $page->landing_page_item_need_help = $request->input('landing_page_item_need_help');
        $page->landing_page_item_elib_publication = $request->input('landing_page_item_elib_publication');
        $page->save();
        return redirect('/manage')->with('success', 'Landing page views updated');
    }
}
