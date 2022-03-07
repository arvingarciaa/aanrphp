<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FooterLink;

class FooterLinksController extends Controller
{
    //
    public function AddFooterLink(Request $request){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        
        $footer = new FooterLink;
        $footer->name = $request->name;
        $footer->position = $request->weight;
        $footer->link = "http://" . $request->link;
        $footer->save();

        return redirect()->back()->with('success','Footer Link Updated.'); 
    }
    public function editFooterLink(Request $request, $footer_id){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        
        $footer = FooterLink::find($footer_id);
        $footer->name = $request->name;
        $footer->position = $request->weight;
        $footer->link = $request->link;
        $footer->save();

        return redirect()->back()->with('success','Footer Link Updated.'); 
    }
    public function deleteFooterLink($footer_id){
        $footer = FooterLink::find($footer_id);
        $footer->delete();
        return redirect()->back()->with('success','Footer Link Deleted.'); 
    }
}
