<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Headline;

class HeadlinesController extends Controller
{
    public function addHeadline(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));

        $headline = new Headline;
        $headline->title = $request->title;
        $headline->link = $request->link;
        $headline->save();

        return redirect()->back()->with('success','Headline Added.'); 
    }
    
    public function editHeadline(Request $request, $headline_id){
        $this->validate($request, array(
            'title' => 'required|max:255',
        ));
        
        $headline = Headline::find($headline_id);
        $headline->title = $request->title;
        $headline->save();

        return redirect()->back()->with('success','Headline Updated.'); 
    }

    public function deleteHeadline($headline_id){
        $headline = Headline::find($headline_id);
        $headline->delete();
        return redirect()->back()->with('success','Headline Deleted.'); 
    }
}
