<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SocialMediaSticky;
use App\Log;

class SocialMediaStickyController extends Controller
{
    //
    public function AddSocial(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $social = new SocialMediaSticky;
            $social->name = $request->name;
            $social->link = $request->link;
            $social->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added:</strong> '.$social->name.'';
            $log->action = 'Added \''. $social->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Social Sticky';
            $log->save();

            return redirect()->back()->with('success','Social Added.'); 
        }
    }

    public function editSocial(Request $request, $social_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $social = SocialMediaSticky::find($social_id);

            if($social->link != $request->link){
                $temp_changes = $temp_changes.'<strong>Link:</strong> '.$social->link.' <strong>-></strong> '.$request->link.'<br>';
            }

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
                $temp_changes = $temp_changes.'<strong>Image:</strong> '.$social->image.' <strong>-></strong> '.$imageName.'<br>';
                $social->image = $imageName;
            }
            $social->link = $request->link;
            $social->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $social->name.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Social Sticky';
            $log->save();

            return redirect()->back()->with('success','Social Updated.'); 
        }
    }
}
