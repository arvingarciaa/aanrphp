<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consortia;
use App\User;
use App\Log;

class ConsortiaController extends Controller
{
    public function addConsortia(Request $request){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));

        $user = auth()->user();
        $consortia = new Consortia;
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->region = $request->region;
        $consortia->profile = $request->profile;
        $consortia->banner_color = "#000000";
        $consortia->button_text = "Link to website";
        $consortia->welcome_message = $request->welcome;
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $consortia->link = "http://" . $request->link;
            }
        }
        $consortia->contact_name = $request->contact_name;
        $consortia->contact_details = $request->contact_details;
        $consortia->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Added \''. $consortia->short_name.'\' to consortia';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia';
        $log->save();

        return redirect()->back()->with('success','Consortia Added.'); 
    }
    
    public function editConsortia(Request $request, $consortia_id){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));
        
        $user = auth()->user();
        $consortia = Consortia::find($consortia_id);
        $consortia->short_name = $request->short_name;
        $consortia->full_name = $request->full_name;
        if($request->hasFile('image')){
            if($consortia->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->region = $request->region;
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $consortia->link = "http://" . $request->link;
            }
        }
        $consortia->profile = $request->profile;
        if(!$request->welcome){
            $consortia->welcome_message = "Welcome to ".$request->short_name." consortia page!";
        } else {
            $consortia->welcome_message = $request->welcome;
        }
        $consortia->contact_name = $request->contact_name;
        $consortia->contact_details = $request->contact_details;
        $consortia->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia->short_name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia';
        $log->save();

        return redirect()->back()->with('success','Consortia Updated.'); 
    }

    public function editConsortiaBanner(Request $request, $consortia_id){
        $user = auth()->user();
        $consortia = Consortia::find($consortia_id);
        if($request->hasFile('image')){
            if($consortia->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }
        $consortia->is_gradient = $request->banner_color_radio;
        $consortia->banner_color = $request->banner_color;
        $consortia->gradient_first = $request->gradient_first;
        $consortia->gradient_second = $request->gradient_second;
        $consortia->gradient_direction = $request->gradient_direction;

        if(!$request->button_text){
            $consortia->button_text = "Link to website";
        } else {
            $consortia->button_text = $request->button_text;
        }
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $consortia->link = "http://" . $request->link;
            } else {
                $consortia->link = $request->link;
            }
        }
        $consortia->welcome_message = $request->welcome;
        $consortia->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia->short_name.'\' banner details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia';
        $log->save();

        return redirect()->back()->with('success','Consortia Banner Updated.'); 
    }

    public function editConsortiaLandingPageBanner(Request $request, $consortia_id){
        $user = auth()->user();
        $consortia = Consortia::find($consortia_id);

        $consortia->landing_page_is_gradient = $request->banner_color_radio;
        $consortia->landing_page_banner_color = $request->banner_color;
        $consortia->landing_page_gradient_first = $request->gradient_first;
        $consortia->landing_page_gradient_second = $request->gradient_second;
        $consortia->landing_page_gradient_direction = $request->gradient_direction;
        if($request->hasFile('image')){
            if($consortia->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia->thumbnail = $imageName;
        }

        if(!$request->button_text){
            $consortia->landing_page_button_text = "Link to website";
        } else {
            $consortia->landing_page_button_text = $request->button_text;
        }
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $consortia->landing_page_link = "http://" . $request->link;
            } else {
                $consortia->landing_page_link = $request->link;
            }
        }
        $consortia->landing_page_welcome_message = $request->welcome;
        $consortia->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia->short_name.'\' landing page banner details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia';
        $log->save();

        return redirect()->back()->with('success','Consortia Landing Page Banner Updated.'); 
    }

    public function editConsortiaDetails(Request $request, $consortia_id){
        
        $user = auth()->user();
        $consortia = Consortia::find($consortia_id);
        $consortia->region = $request->region;
        $consortia->profile = $request->profile;
        $consortia->contact_name = $request->contact_name;
        $consortia->contact_details = $request->contact_details;
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $consortia->link = "http://" . $request->link;
            }
        }
        $consortia->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia->short_name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia';
        $log->save();

        return redirect()->back()->with('success','Consortia Details Updated.'); 
    }

    public function deleteConsortia($consortia_id){
        $consortia = Consortia::find($consortia_id);
        if($consortia->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$consortia->thumbnail;
            if(file_exists($image_path)){
                    unlink($image_path);
                }
        }
        $consortia->delete();
        return redirect()->back()->with('success','Consortia Deleted.'); 
    }

    public function setUserAdmin(Request $request, $user_id){

        $user = User::find($user_id);
        $user->role = $request->user_role;
        if($request->user_role == 1){
            $user->consortia_admin_id = $request->consortia_admin_id;
            $user->organization = Consortia::find($request->consortia_admin_id)->short_name;
        } else {
            $user->consortia_admin_id = null;
        }

        $user->save();
        return redirect()->back()->with('success','User role set.'); 
    }

    public function editConsortiaConsortiaMembersSection(Request $request, $consortia_id){
        $consortium = Consortia::find($consortia_id);
        $consortium->consortia_members_header = $request->input('consortia_members_header');
        $consortium->consortia_members_subheader = $request->input('consortia_members_subheader');
        $consortium->save();
        return redirect()->back()->with('success', 'Consortia Members Section Updated');
    }

    public function editConsortiaFeaturedPublicationsSection(Request $request, $consortia_id){
        $consortium = Consortia::find($consortia_id);
        $consortium->featured_publications_header = $request->input('featured_publications_header');
        $consortium->featured_publications_subheader = $request->input('featured_publications_subheader');
        $consortium->save();
        return redirect()->back()->with('success', 'Featured Publications Section Updated');
    }

    public function editConsortiaFeaturedVideosSection(Request $request, $consortia_id){
        $consortium = Consortia::find($consortia_id);
        $consortium->featured_videos_header = $request->input('featured_videos_header');
        $consortium->featured_videos_subheader = $request->input('featured_videos_subheader');
        $page->featured_video_link_1 = $request->input('first_link');
        $page->featured_video_link_2 = $request->input('second_link');
        $page->featured_video_link_3 = $request->input('third_link');
        $consortium->save();
        return redirect()->back()->with('success', 'Featured Videos Section Updated');
    }

    public function editConsortiaLatestAANRSection(Request $request, $consortia_id){
        $consortium = Consortia::find($consortia_id);
        $consortium->latest_aanr_header = $request->input('latest_aanr_header');
        $consortium->latest_aanr_subheader = $request->input('latest_aanr_subheader');

        if($request->banner_color_radio_latest_aanr == 1){
            $image_path = public_path().'/storage/page_images/'.$consortium->latest_aanr_bg;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $consortium->latest_aanr_bg = $request->input('banner_color');
            $consortium->latest_aanr_bg_type = 1;
        } else {
            if($request->hasFile('image')){
                if($consortium->latest_aanr_bg != null){
                    $image_path = public_path().'/storage/page_images/'.$consortium->latest_aanr_bg;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
                $consortium->latest_aanr_bg = $imageName;
            }
            $consortium->latest_aanr_bg_type = 0;
        }

        $consortium->save();
        return redirect()->back()->with('success', 'Latest AANR Section Updated');
    }
}
