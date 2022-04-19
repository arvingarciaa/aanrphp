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
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $aanr_page = AANRPage::find($consortia_id);

            if($aanr_page->short_name != $request->short_name){
                $temp_changes = $temp_changes.'<strong>Short Name:</strong> '.$aanr_page->short_name.' <strong>-></strong> '.$request->short_name.'<br>';
            }
            if($aanr_page->full_name != $request->full_name){
                $temp_changes = $temp_changes.'<strong>Full Name:</strong> '.$aanr_page->full_name.' <strong>-></strong> '.$request->full_name.'<br>';
            }
            if($aanr_page->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$aanr_page->link.' <strong>-></strong> '.$request->link.'<br>';
            }
            if($aanr_page->profile != $request->profile){
                $temp_changes = $temp_changes.'<strong>Profile:</strong> '.$aanr_page->profile.' <strong>-></strong> '.$request->profile.'<br>';
            }
            if($aanr_page->welcome_message != $request->welcome){
                $temp_changes = $temp_changes.'<strong>Welcome Message:</strong> '.$aanr_page->welcome_message.' <strong>-></strong> '.$request->welcome.'<br>';
            }
            if($aanr_page->contact_name != $request->contact_name){
                $temp_changes = $temp_changes.'<strong>Contact Name:</strong> '.$aanr_page->contact_name.' <strong>-></strong> '.$request->contact_name.'<br>';
            }
            if($aanr_page->contact_details != $request->contact_details){
                $temp_changes = $temp_changes.'<strong>Contact Details:</strong> '.$aanr_page->contact_details.' <strong>-></strong> '.$request->contact_details.'<br>';
            }

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
                $temp_changes = $temp_changes.'<strong>Thumbnail:</strong> '.$aanr_page->thumbnail.' <strong>-></strong> '.$imageName.'<br>';
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

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $aanr_page->short_name.'\' details';
            $log->IP_address = $request->ip();
            $log->resource = 'AANR Page';
            $log->save();

            return redirect()->back()->with('success','AANR Page Updated.'); 
        }
    }

    public function editAANRPageBanner(Request $request, $consortia_id){
        $this->validate($request, array(
            'welcome' => 'required',
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $aanr_page = AANRPage::find($consortia_id);

            if($aanr_page->is_gradient != $request->banner_color_radio){
                $temp_changes = $temp_changes.'<strong>Is Gradient?:</strong> '.$aanr_page->is_gradient.' <strong>-></strong> '.$request->banner_color_radio.'<br>';
            }
            if($aanr_page->banner_color != $request->banner_color){
                $temp_changes = $temp_changes.'<strong>Banner Color:</strong> '.$aanr_page->banner_color.' <strong>-></strong> '.$request->banner_color.'<br>';
            }
            if($aanr_page->gradient_first != $request->gradient_first){
                $temp_changes = $temp_changes.'<strong>First Gradient:</strong> '.$aanr_page->gradient_first.' <strong>-></strong> '.$request->gradient_first.'<br>';
            }
            if($aanr_page->gradient_second != $request->gradient_second){
                $temp_changes = $temp_changes.'<strong>Second Gradient:</strong> '.$aanr_page->gradient_second.' <strong>-></strong> '.$request->gradient_second.'<br>';
            }
            if($aanr_page->gradient_direction != $request->gradient_direction){
                $temp_changes = $temp_changes.'<strong>Gradient Direction:</strong> '.$aanr_page->gradient_direction.' <strong>-></strong> '.$request->gradient_direction.'<br>';
            }
            if($aanr_page->button_text != $request->button_text){
                $temp_changes = $temp_changes.'<strong>Button Text:</strong> '.$aanr_page->button_text.' <strong>-></strong> '.$request->button_text.'<br>';
            }
            if($aanr_page->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$aanr_page->link.' <strong>-></strong> '.$request->link.'<br>';
            }
            if($aanr_page->welcome_message != $request->welcome){
                $temp_changes = $temp_changes.'<strong>Welcome Message:</strong> '.$aanr_page->welcome_message.' <strong>-></strong> '.$request->welcome.'<br>';
            }

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
                $temp_changes = $temp_changes.'<strong>Thumbnail:</strong> '.$aanr_page->thumbnail.' <strong>-></strong> '.$imageName.'<br>';
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

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $aanr_page->short_name.'\' banner details';
            $log->IP_address = $request->ip();
            $log->resource = 'AANR Page';
            $log->save();

            return redirect()->back()->with('success','AANR Page Banner Updated.'); 
        }
    }

    public function editAANRPageDetails(Request $request, $consortia_id){
        
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $aanr_page = AANRPage::find($consortia_id);

            if($aanr_page->profile != $request->profile){
                $temp_changes = $temp_changes.'<strong>Profile:</strong> '.$aanr_page->profile.' <strong>-></strong> '.$request->profile.'<br>';
            }
            if($aanr_page->contact_name != $request->contact_name){
                $temp_changes = $temp_changes.'<strong>Contact Name:</strong> '.$aanr_page->contact_name.' <strong>-></strong> '.$request->contact_name.'<br>';
            }
            if($aanr_page->contact_details != $request->contact_details){
                $temp_changes = $temp_changes.'<strong>Contact Details:</strong> '.$aanr_page->contact_details.' <strong>-></strong> '.$request->contact_details.'<br>';
            }
            if($aanr_page->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$aanr_page->link.' <strong>-></strong> '.$request->link.'<br>';
            }

            $aanr_page->profile = $request->profile;
            $aanr_page->contact_name = $request->contact_name;
            $aanr_page->contact_details = $request->contact_details;
            if($request->link){
                if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                    $aanr_page->link = "http://" . $request->link;
                }
            }
            $aanr_page->save(); 

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $aanr_page->short_name.'\' details';
            $log->IP_address = $request->ip();
            $log->resource = 'AANR Page';
            $log->save();

            return redirect()->back()->with('success','AANR Page Details Updated.'); 
        }
    }
}
