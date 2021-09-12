<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Log;

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

    public function deleteContent(Request $request){
        
        $content = Content::whereIn('id', $request->input('content_type_check'))->delete();

        return redirect()->back()->with('success','Selected Content Type Deleted.'); 
    }
}
