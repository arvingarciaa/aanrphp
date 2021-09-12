<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPageSlider;

class LandingPageSlidersController extends Controller
{
    public function addSlider(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));

        $slider = new LandingPageSlider;
        $slider->title = $request->title;
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

        return redirect()->back()->with('success','Slider Added.'); 
    }
    
    public function editSlider(Request $request, $slider_id){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        
        $slider = LandingPageSlider::find($slider_id);
        $slider->title = $request->title;
        if($request->consortia == null || $request->consortia == 0){
            $slider->is_consortia = 0;
            $slider->consortia_id = null;
        } else {
            $slider->is_consortia = 1;
            $slider->consortia_id = $request->consortia;
        }
        if($request->is_video_edit == '0'){
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

        return redirect()->back()->with('success','Slider Updated.'); 
    }

    public function deleteSlider($slider_id){
        $slider = LandingPageSlider::find($slider_id);
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
