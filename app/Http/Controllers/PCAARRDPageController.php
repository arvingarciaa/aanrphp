<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PCAARRDPage;
use App\Log;

class PCAARRDPageController extends Controller
{
    public function editPCAARRDPage(Request $request, $consortia_id){
        $this->validate($request, array(
            'short_name' => 'required|max:255',
            'full_name' => 'required'
        ));
        
        $user = auth()->user();
        $pcaarrd_page = PCAARRDPage::find($consortia_id);
        $pcaarrd_page->short_name = $request->short_name;
        $pcaarrd_page->full_name = $request->full_name;
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
            $pcaarrd_page->thumbnail = $imageName;
        }
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $pcaarrd_page->link = "http://" . $request->link;
            }
        }
        $pcaarrd_page->profile = $request->profile;
        if(!$request->welcome){
            $pcaarrd_page->welcome_message = "Welcome to ".$request->short_name." page!";
        } else {
            $pcaarrd_page->welcome_message = $request->welcome;
        }
        $pcaarrd_page->contact_name = $request->contact_name;
        $pcaarrd_page->contact_details = $request->contact_details;
        $pcaarrd_page->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $pcaarrd_page->short_name.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'PCAARRDPage';
        $log->save();

        return redirect()->back()->with('success','PCAARRD Page Updated.'); 
    }

    public function editPCAARRDPageBanner(Request $request, $consortia_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $pcaarrd_page = PCAARRDPage::find($consortia_id);
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
                $temp_changes = $temp_changes.'<strong>Image:</strong> '.$pcaarrd_page->thumbnail.' <strong>-></strong> '.$imageName.'<br>';
                $pcaarrd_page->thumbnail = $imageName;
            }

            if($pcaarrd_page->is_gradient != $request->banner_color_radio){
                $temp_changes = $temp_changes.'<strong>Is Gradient?:</strong> '.$pcaarrd_page->is_gradient.' <strong>-></strong> '.$request->banner_color_radio.'<br>';
            }
            if($pcaarrd_page->banner_color != $request->banner_color){
                $temp_changes = $temp_changes.'<strong>Banner Color:</strong> '.$pcaarrd_page->banner_color.' <strong>-></strong> '.$request->banner_color.'<br>';
            }
            if($pcaarrd_page->gradient_first != $request->gradient_first){
                $temp_changes = $temp_changes.'<strong>1st Gradient Color:</strong> '.$pcaarrd_page->gradient_first.' <strong>-></strong> '.$request->gradient_first.'<br>';
            }
            if($pcaarrd_page->gradient_second != $request->gradient_second){
                $temp_changes = $temp_changes.'<strong>2nd Gradient Color:</strong> '.$pcaarrd_page->gradient_second.' <strong>-></strong> '.$request->gradient_second.'<br>';
            }
            if($pcaarrd_page->gradient_direction != $request->gradient_direction){
                $temp_changes = $temp_changes.'<strong>Gradient Direction:</strong> '.$pcaarrd_page->gradient_direction.' <strong>-></strong> '.$request->gradient_direction.'<br>';
            }
            if($pcaarrd_page->button_text != $request->button_text){
                $temp_changes = $temp_changes.'<strong>Button Text:</strong> '.$pcaarrd_page->button_text.' <strong>-></strong> '.$request->button_text.'<br>';
            }
            if($pcaarrd_page->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$pcaarrd_page->link.' <strong>-></strong> '.$request->link.'<br>';
            }
            if($pcaarrd_page->welcome_message != $request->welcome_message){
                $temp_changes = $temp_changes.'<strong>Welcome Message:</strong> '.$pcaarrd_page->welcome_message.' <strong>-></strong> '.$request->welcome.'<br>';
            }

            $pcaarrd_page->is_gradient = $request->banner_color_radio;
            $pcaarrd_page->banner_color = $request->banner_color;
            $pcaarrd_page->gradient_first = $request->gradient_first;
            $pcaarrd_page->gradient_second = $request->gradient_second;
            $pcaarrd_page->gradient_direction = $request->gradient_direction;
            
            if(!$request->button_text){
                $pcaarrd_page->button_text = "Link to website";
            } else {
                $pcaarrd_page->button_text = $request->button_text;
            }
            if($request->link){
                if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                    $pcaarrd_page->link = "http://" . $request->link;
                } else {
                    $pcaarrd_page->link = $request->link;
                }
            }

            $pcaarrd_page->welcome_message = $request->welcome;
            $pcaarrd_page->save();

            $log = new Log;
            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $pcaarrd_page->short_name.'\' banner details';
            $log->IP_address = $request->ip();
            $log->resource = 'PCAARRD Page';
            $log->save();

            return redirect()->back()->with('success','PCAARRD Page Banner Updated.'); 
        }
    }

    public function editPCAARRDPageDetails(Request $request, $consortia_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $pcaarrd_page = PCAARRDPage::find($consortia_id);

            if($pcaarrd_page->profile != $request->profile){
                $temp_changes = $temp_changes.'<strong>Profile:</strong> '.$pcaarrd_page->profile.' <strong>-></strong> '.$request->profile.'<br>';
            }
            if($pcaarrd_page->contact_name != $request->contact_name){
                $temp_changes = $temp_changes.'<strong>Contact Name:</strong> '.$pcaarrd_page->contact_name.' <strong>-></strong> '.$request->contact_name.'<br>';
            }
            if($pcaarrd_page->contact_details != $request->contact_details){
                $temp_changes = $temp_changes.'<strong>Contact Details:</strong> '.$pcaarrd_page->contact_details.' <strong>-></strong> '.$request->contact_details.'<br>';
            }
            if($pcaarrd_page->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$pcaarrd_page->link.' <strong>-></strong> '.$request->link.'<br>';
            }


            $pcaarrd_page->profile = $request->profile;
            $pcaarrd_page->contact_name = $request->contact_name;
            $pcaarrd_page->contact_details = $request->contact_details;
            if($request->link){
                if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                    $pcaarrd_page->link = "http://" . $request->link;
                }
            }
            $pcaarrd_page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $pcaarrd_page->short_name.'\' details';
            $log->IP_address = $request->ip();
            $log->resource = 'PCAARRD Page';
            $log->save();

            return redirect()->back()->with('success','PCAARRD Page Details Updated.'); 
        }
    }
}
