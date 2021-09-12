<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentSubtype;

class ContentSubtypesController extends Controller
{
    public function addContentSubtype(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));

        $user = auth()->user();
        $content_subtype = new ContentSubtype;
        $content_subtype->name = $request->name;
        $content_subtype->content_id = $request->content;
        $content_subtype->save();

        return redirect()->back()->with('success','ContentSubtype Added.'); 
    }
    
    public function editContentSubtype(Request $request, $content_subtype_id){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        
        $user = auth()->user();
        $content_subtype = ContentSubtype::find($content_subtype_id);
        $content_subtype->name = $request->name;
        $content_subtype->content_id = $request->content;
        $content_subtype->save();

        return redirect()->back()->with('success','ContentSubtype Updated.'); 
    }

    public function deleteContentSubtype(Request $request){
        $content = ContentSubtype::whereIn('id', $request->input('content_subtype_check'))->delete();
        return redirect()->back()->with('success','Selected Content Subtype Deleted.'); 
    }
}
