<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AANRPage;
use App\Log;

class AANRPageController extends Controller
{
    public function editAANRPage(Request $request, $consortia_id){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));
        
        $user = auth()->user();
        $aanr_page = AANRPage::find($consortia_id);
        $aanr_page->short_name = $request->short_name;
        $aanr_page->full_name = $request->full_name;
        if($request->hasFile('image')){
            if($aanr_page->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$aanr_page->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $aanr_page->thumbnail = $imageName;
        }
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $aanr_page->link = "http://" . $request->link;
            }
        }
        $aanr_page->profile = $request->profile;
        if(!$request->welcome){
            $aanr_page->welcome_message = "Welcome to ".$request->short_name." page!";
        } else {
            $aanr_page->welcome_message = $request->welcome;
        }
        $aanr_page->contact_name = $request->contact_name;
        $aanr_page->contact_details = $request->contact_details;
        $aanr_page->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $aanr_page->short_name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'AANRPage';
        $log->save();

        return redirect()->back()->with('success','AANR Page Updated.'); 
    }

    public function editAANRPageBanner(Request $request, $consortia_id){
        $this->validate($request, array(
            'welcome' => 'required',
        ));
        
        $user = auth()->user();
        $aanr_page = AANRPage::find($consortia_id);
        if($request->hasFile('image')){
            if($aanr_page->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$aanr_page->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $aanr_page->thumbnail = $imageName;
        }
        $aanr_page->is_gradient = $request->banner_color_radio;
        $aanr_page->banner_color = $request->banner_color;
        $aanr_page->gradient_first = $request->gradient_first;
        $aanr_page->gradient_second = $request->gradient_second;
        $aanr_page->gradient_direction = $request->gradient_direction;
        
        if(!$request->button_text){
            $aanr_page->button_text = "Link to website";
        } else {
            $aanr_page->button_text = $request->button_text;
        }
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $aanr_page->link = "http://" . $request->link;
            } else {
                $aanr_page->link = $request->link;
            }
        }

        $aanr_page->welcome_message = $request->welcome;
        $aanr_page->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $aanr_page->short_name.'\' banner details';
        $log->IP_address = $request->ip();
        $log->resource = 'AANR Page';
        $log->save();

        return redirect()->back()->with('success','AANR Page Banner Updated.'); 
    }

    public function editAANRPageDetails(Request $request, $consortia_id){
        
        $user = auth()->user();
        $aanr_page = AANRPage::find($consortia_id);
        $aanr_page->profile = $request->profile;
        $aanr_page->contact_name = $request->contact_name;
        $aanr_page->contact_details = $request->contact_details;
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $aanr_page->link = "http://" . $request->link;
            }
        }
        $aanr_page->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $aanr_page->short_name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'AANR Page';
        $log->save();

        return redirect()->back()->with('success','AANR Page Details Updated.'); 
    }
}
