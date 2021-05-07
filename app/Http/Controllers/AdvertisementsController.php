<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class AdvertisementsController extends Controller
{
    public function addAdvertisement(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:100'
        ));

        $user = auth()->user();
        $advertisement = new Advertisement;
        $advertisement->title = $request->title;
        $advertisement->ad_overview = $request->ad_overview;
        $advertisement->feature = $request->feature;
        $advertisement->link = $request->link;
        if($request->hasFile('image')){
            if($advertisement->img_filename != null){
                $image_path = public_path().'/storage/page_images/'.$advertisement->img_filename;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $advertisement->img_filename = $imageName;
        }
        $advertisement->save();

        return redirect()->back()->with('success','Advertisement Added.'); 
    }
    
    public function editAdvertisement(Request $request, $advertisement_id){
        $this->validate($request, array(
            'title' => 'required|max:100'
        ));
        
        $user = auth()->user();
        $advertisement = Advertisement::find($advertisement_id);
        $advertisement->title = $request->title;
        $advertisement->ad_overview = $request->ad_overview;
        $advertisement->feature = $request->feature;
        $advertisement->link = $request->link;
        if($request->hasFile('image')){
            if($advertisement->img_filename != null){
                $image_path = public_path().'/storage/page_images/'.$advertisement->img_filename;
                unlink($image_path);
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $advertisement->img_filename = $imageName;
        }
        $advertisement->save();

        return redirect()->back()->with('success','Advertisement Updated.'); 
    }

    public function deleteAdvertisement($advertisement_id, Request $request){
        $advertisement = Advertisement::find($advertisement_id);
        if($advertisement->img_filename != null){
            $image_path = public_path().'/storage/page_images/'.$advertisement->img_filename;
            unlink($image_path);
        }
        $advertisement->delete();

        return redirect()->back()->with('success','Advertisement Deleted.'); 
    }
}
