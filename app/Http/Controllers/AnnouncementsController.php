<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;

class AnnouncementsController extends Controller
{
    public function addAnnouncement(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $user = auth()->user();
        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->feature = $request->feature;
        $announcement->link = $request->link;
        $announcement->save();

        return redirect()->back()->with('success','Announcement Added.'); 
    }
    
    public function editAnnouncement(Request $request, $announcement_id){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $announcement = Announcement::find($announcement_id);
        $announcement->title = $request->title;
        $announcement->feature = $request->feature;
        $announcement->link = $request->link;
        $announcement->save();

        return redirect()->back()->with('success','Announcement Updated.'); 
    }

    public function deleteAnnouncement($announcement_id, Request $request){
        $announcement = Announcement::find($announcement_id);
        $announcement->delete();

        return redirect()->back()->with('success','Announcement Deleted.'); 
    }
}
