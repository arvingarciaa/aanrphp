<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtifactAANR;

class ArtifactAANRController extends Controller
{
    public function addArtifactAANR(Request $request){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));

        $user = auth()->user();
        $artifactaanr = new ArtifactAANR;
        $artifactaanr->title = $request->title;
        $artifactaanr->date_published = $request->date_published;
        $artifactaanr->description = $request->description;
        $artifactaanr->content = $request->content;
        $artifactaanr->subcontent_id = $request->subcontent;
        $artifactaanr->link = $request->link;
        $artifactaanr->industry_id = $request->industry;
        $artifactaanr->author = $request->author;
        $artifactaanr->keywords = $request->keywords;
        $artifactaanr->gad = $request->gad;
        $artifactaanr->imglink = $request->imglink;
        $artifactaanr->save();

        return redirect()->back()->with('success','ArtifactAANR Added.'); 
    }
    
    public function editArtifactAANR(Request $request, $artifactaanr_id){
        $this->validate($request, array(
            'title' => 'required|max:255'
        ));
        
        $user = auth()->user();
        $artifactaanr = ArtifactAANR::find($artifactaanr_id);
        $artifactaanr->title = $request->title;
        $artifactaanr->date_published = $request->date_published;
        $artifactaanr->description = $request->description;
        $artifactaanr->content = $request->content;
        $artifactaanr->subcontent_id = $request->subcontent;
        $artifactaanr->link = $request->link;
        $artifactaanr->industry_id = $request->industry;
        $artifactaanr->author = $request->author;
        $artifactaanr->keywords = $request->keywords;
        $artifactaanr->gad = $request->gad;
        $artifactaanr->imglink = $request->imglink;
        $artifactaanr->save();

        return redirect()->back()->with('success','ArtifactAANR Updated.'); 
    }

    public function deleteArtifactAANR($artifactaanr_id, Request $request){
        $artifactaanr = ArtifactAANR::find($artifactaanr_id);
        $artifactaanr->delete();

        return redirect()->back()->with('success','ArtifactAANR Deleted.'); 
    }
}
