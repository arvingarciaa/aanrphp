<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContentSubtype;

class ContentSubtypesController extends Controller
{
    public function addContentSubtype(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:50',
            'content' => 'required'
        ));

        $user = auth()->user();
        $content_subtype = new ContentSubtype;
        $content_subtype->name = $request->name;
        $content_subtype->content_id = $request->content;
        $content_subtype->save();

        return redirect()->back()->with('success','Content Subtype Added.'); 
    }
    
    public function editContentSubtype(Request $request, $content_subtype_id){
        $this->validate($request, array(
            'name' => 'required|max:50',
            'content' => 'required'
        ));
        
        $user = auth()->user();
        $content_subtype = ContentSubtype::find($content_subtype_id);
        $content_subtype->name = $request->name;
        $content_subtype->content_id = $request->content;
        $content_subtype->save();

        return redirect()->back()->with('success','Content Subtype Updated.'); 
    }

    public function deleteContentSubtype(Request $request, $content_subtype_id){
        $content_subtype = ContentSubtype::find($content_subtype_id);
        $content_subtype->delete();
        return redirect()->back()->with('success','Content Subtype Deleted.'); 
    }
}
