<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtifactAANRViews;
use App\ArtifactAANR;
use Auth;

class ArtifactAANRViewsController extends Controller
{
    public static function createArtifactViewLog(Request $request) {
        $artifactaanr = ArtifactAANR::find($request->get('content_id'));
        //$artifactView = ArtifactAANRViews::firstOrNew(['title' => $artifactaanr->title]);
        $artifactView = new ArtifactAANRViews;
        $artifactView->id_artifact = $artifactaanr->id;
        $artifactView->title = $artifactaanr->title;
        $artifactView->session_id = \Request::getSession()->getId();
        if(Auth::user()){
            $artifactView->user_id = \Auth::user()->id;
        } else {
            $artifactView->user_id = 0;
        }
        $artifactView->ip = \Request::getClientIp();
        $artifactView->agent = \Request::header('User-Agent');
        $artifactView->save();
    }

}
