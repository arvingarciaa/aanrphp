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
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->caption_align = $request->caption_align;
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
        $slider->save();

        return redirect()->back()->with('success','Slider Added.'); 
    }
    
    public function editSlider(Request $request, $slider_id){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        
        $slider = LandingPageSlider::find($slider_id);
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->description = $request->description;
        $slider->caption_align = $request->caption_align;
        $slider->button_text = $request->button_text;
        $slider->button_color = $request->button_color;
        if($request->hasFile('image')){
            if($slider->image != null){
                $image_path = public_path().'/storage/cover_images/'.$slider->image;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/cover_images/'), $imageName);
            $slider->image = $imageName;
        }
        $slider->save();

        return redirect()->back()->with('success','Slider Updated.'); 
    }

    public function deleteSlider($slider_id){
        $slider = LandingPageSlider::find($slider_id);
        if($slider->image != null){
            $image_path = public_path().'/storage/cover_images/'.$slider->image;
            unlink($image_path);
        }
        $slider->delete();
        return redirect()->back()->with('success','Slider Deleted.'); 
    }
}
