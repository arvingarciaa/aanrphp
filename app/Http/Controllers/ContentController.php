<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function addContent(Request $request){
        $this->validate($request, array(
            'type' => 'required|max:50'
        ));

        $user = auth()->user();
        $content = new Content;
        $content->type = $request->type;
        $content->save();

        return redirect()->back()->with('success','Content Added.'); 
    }
    
    public function editContent(Request $request, $content_id){
        $this->validate($request, array(
            'type' => 'required|max:50'
        ));
        
        $user = auth()->user();
        $content = Content::find($content_id);
        $content->type = $request->type;
        $content->save();

        return redirect()->back()->with('success','Content Updated.'); 
    }

    public function deleteContent($content_id, Request $request){
        $content = Content::find($content_id);
        $content->delete();

        return redirect()->back()->with('success','Content Deleted.'); 
    }
}
