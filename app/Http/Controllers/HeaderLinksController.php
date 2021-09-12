<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HeaderLink;

class HeaderLinksController extends Controller
{
    //
    public function editHeaderLink(Request $request, $header_id){
        $this->validate($request, array(
            'name' => 'required|max:50'
        ));
        
        $header = HeaderLink::find($header_id);
        $header->name = $request->name;
        if($request->link){
            if (!preg_match("~^(?:f|ht)tps?://~i", $request->link)) {
                $header->link = "http://" . $request->link;
            }
        }
        $header->save();

        return redirect()->back()->with('success','Header Link Updated.'); 
    }
}
