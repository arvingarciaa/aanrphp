<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPageSlider;
use App\Log;

class LandingPageSlidersController extends Controller
{
    public function addSlider(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $slider = new LandingPageSlider;
            $slider->title = $request->title;
            $slider->weight = $request->weight;
            if($request->consortia == null || $request->consortia == 0){
                $slider->is_consortia = 0;
            } else {
                $slider->is_consortia = 1;
                $slider->consortia_id = $request->consortia;
            }
            if($request->is_video_create == '0'){
                $slider->link = $request->link;
                $slider->description = $request->description;
                $slider->caption_align = $request->caption_align;
                $slider->textcard_enable = $request->textcard_enable;
                if(!$request->button_text){
                    $slider->button_text = 'Learn More';
                } else {
                $slider->button_text = $request->button_text;
                }
                $slider->button_color = '#3490dc';
                if($request->hasFile('image')){
                    $imageFile = $request->file('image');
                    $imageName = uniqid().$imageFile->getClientOriginalName();
                    $imageFile->move(public_path('/storage/cover_images/'), $imageName);
                    $slider->image = $imageName;
                }
                $slider->is_video = 0;
                $slider->video_link = null;
            } else {
                $slider->is_video = 1;
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                $youtube_id = '';

                if (preg_match($longUrlRegex, $request->video_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }

                if (preg_match($shortUrlRegex, $request->video_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $slider->video_link = 'https://www.youtube.com/embed/' . $youtube_id ;
            }
            $slider->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Added:</strong> '.$slider->title.'';
            $log->action = 'Added \''. $slider->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Sliders';
            $log->save();

            return redirect()->back()->with('success','Slider Added.'); 
        }
    }
    
    public function editSlider(Request $request, $slider_id){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $slider = LandingPageSlider::find($slider_id);

            if($slider->title != $request->title){
                $temp_changes = $temp_changes.'<strong>Title:</strong> '.$slider->title.' <strong>-></strong> '.$request->title.'<br>';
            }
            if($slider->weight != $request->weight){
                $temp_changes = $temp_changes.'<strong>Weight:</strong> '.$slider->weight.' <strong>-></strong> '.$request->weight.'<br>';
            }

            $slider->title = $request->title;
            $slider->weight = $request->weight;
            if($request->consortia == null || $request->consortia == 0){
                $slider->is_consortia = 0;
                $slider->consortia_id = null;
            } else {
                $slider->is_consortia = 1;
                $slider->consortia_id = $request->consortia;
            }
            if($request->is_video_edit == '0'){

                if($slider->link != $request->link){
                    $temp_changes = $temp_changes.'<strong>Link:</strong> '.$slider->link.' <strong>-></strong> '.$request->link.'<br>';
                }
                if($slider->description != $request->description){
                    $temp_changes = $temp_changes.'<strong>Description:</strong> '.$slider->description.' <strong>-></strong> '.$request->description.'<br>';
                }
                if($slider->description != $request->description){
                    $temp_changes = $temp_changes.'<strong>Caption Align:</strong> '.$slider->description.' <strong>-></strong> '.$request->description.'<br>';
                }
                if($slider->button_text != $request->button_text){
                    $temp_changes = $temp_changes.'<strong>Button Text:</strong> '.$slider->button_text.' <strong>-></strong> '.$request->button_text.'<br>';
                }
                if($slider->button_color != $request->button_color){
                    $temp_changes = $temp_changes.'<strong>Button Color:</strong> '.$slider->button_color.' <strong>-></strong> '.$request->button_color.'<br>';
                }

                $slider->link = $request->link;
                $slider->description = $request->description;
                $slider->caption_align = $request->caption_align;
                $slider->textcard_enable = $request->textcard_enable;
                $slider->button_text = $request->button_text;
                $slider->button_color = $request->button_color;
                if($request->hasFile('image')){
                    if($slider->image != null){
                        $image_path = public_path().'/storage/cover_images/'.$slider->image;
                        if(file_exists($image_path)){
                        unlink($image_path);
                    }
                    }
                    $imageFile = $request->file('image');
                    $imageName = uniqid().$imageFile->getClientOriginalName();
                    $imageFile->move(public_path('/storage/cover_images/'), $imageName);
                    $temp_changes = $temp_changes.'<strong>Image:</strong> '.$slider->image.' <strong>-></strong> '.$imageName.'<br>';
                    $slider->image = $imageName;
                }
                $slider->is_video = 0;
                $slider->video_link = null;
            } else {
                $slider->is_video = 1;
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                $youtube_id = '';

                if (preg_match($longUrlRegex, $request->video_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }

                if (preg_match($shortUrlRegex, $request->video_link, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $slider->video_link = 'https://www.youtube.com/embed/' . $youtube_id ;
            }
            $slider->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited \''. $slider->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Sliders';
            $log->save();

            return redirect()->back()->with('success','Slider Updated.'); 
        }
    }

    public function deleteSlider($slider_id){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $slider = LandingPageSlider::find($slider_id);

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = '<strong>Deleted:</strong> '.$slider->title.'';
            $log->action = 'Deleted \''. $slider->title.'\'';
            $log->IP_address = $request->ip();
            $log->resource = 'Sliders';
            $log->save();

            if($slider->image != null){
                $image_path = public_path().'/storage/cover_images/'.$slider->image;
                if(file_exists($image_path)){
                        unlink($image_path);
                    }
            }
            $slider->delete();
            return redirect()->back()->with('success','Slider Deleted.'); 
        }
    }
}
