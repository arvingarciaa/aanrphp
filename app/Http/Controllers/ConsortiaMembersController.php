<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConsortiaMember;
use App\Log;

class ConsortiaMembersController extends Controller
{
    public function addConsortiaMember(Request $request){
        $this->validate($request, array(
            'acronym' => 'required|max:255',
            'name' => 'required'
        ));

        $user = auth()->user();
        $consortia_member = new ConsortiaMember;
        $consortia_member->acronym = $request->acronym;
        $consortia_member->name = $request->name;
        $consortia_member->profile = $request->profile;
        $consortia_member->contact_name = $request->contact_name;
        $consortia_member->contact_details = $request->contact_details;
        if($request->website){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->website)) {
                $consortia_member->website = "http://" . $request->website;
            }
        }
        
        $consortia_member->consortia_id = $request->consortia;
        if($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia_member->thumbnail = $imageName;
        }
        $consortia_member->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Added \''. $consortia_member->acronym.'\' to consortia members';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia Member';
        $log->save();

        return redirect()->back()->with('success','Consortia Member Added.'); 
    }
    
    public function editConsortiaMember(Request $request, $consortia_member_id){
        $this->validate($request, array(
            'acronym' => 'required|max:255',
            'name' => 'required'
        ));
        
        $user = auth()->user();
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        $consortia_member->acronym = $request->acronym;
        $consortia_member->name = $request->name;
        $consortia_member->profile = $request->profile;
        $consortia_member->contact_name = $request->contact_name;
        $consortia_member->contact_details = $request->contact_details;
        if($request->website){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->website)) {
                $consortia_member->website = "http://" . $request->website;
            } else {
                $consortia_member->website = $request->website;
            }
        }
        $consortia_member->consortia_id = $request->consortia;
        if($request->hasFile('image')){
            if($consortia_member->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia_member->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia_member->thumbnail = $imageName;
        }
        $consortia_member->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia_member->acronym.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia Member';
        $log->save();

        return redirect()->back()->with('success','Consortia Member Updated.'); 
    }

    public function editConsortiaMemberBanner(Request $request, $consortia_member_id){
        $user = auth()->user();
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        if($request->website){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->website)) {
                $consortia_member->website = "http://" . $request->website;
            }else {
                $consortia_member->website = $request->website;
            }
        }
        if($request->hasFile('image')){
            if($consortia_member->thumbnail != null){
                $image_path = public_path().'/storage/page_images/'.$consortia_member->thumbnail;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $consortia_member->thumbnail = $imageName;
        }
        $consortia_member->is_gradient = $request->banner_color_radio;
        $consortia_member->banner_color = $request->banner_color;
        $consortia_member->gradient_first = $request->gradient_first;
        $consortia_member->gradient_second = $request->gradient_second;
        $consortia_member->gradient_direction = $request->gradient_direction;

        if(!$request->button_text){
            $consortia_member->button_text = "Link to website";
        } else {
            $consortia_member->button_text = $request->button_text;
        }
        $consortia_member->welcome_message = $request->welcome;
        $consortia_member->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia_member->acronym.'\' banner';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia Member';
        $log->save();

        return redirect()->back()->with('success','Consortia Member Banner Updated.'); 
    }

    public function editConsortiaMemberDetails(Request $request, $consortia_member_id){
        $user = auth()->user();
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        $consortia_member->profile = $request->profile;
        $consortia_member->contact_name = $request->contact_name;
        $consortia_member->contact_details = $request->contact_details;
        $consortia_member->save();

        $log = new Log;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->action = 'Edited \''. $consortia_member->acronym.'\' details';
        $log->IP_address = $request->ip();
        $log->resource = 'Consortia Member';
        $log->save();

        return redirect()->back()->with('success','Consortia Member Details Updated.'); 
    }

    public function deleteConsortiaMember($consortia_member_id){
        $consortia_member = ConsortiaMember::find($consortia_member_id);
        if($consortia_member->thumbnail != null){
            $image_path = public_path().'/storage/page_images/'.$consortia_member->thumbnail;
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        $consortia_member->delete();
        return redirect()->back()->with('success','Consortia Member Deleted.'); 
    }

    
}
