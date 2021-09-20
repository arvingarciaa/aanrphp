<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ISPViews;
use App\ArtifactAANR;
use Auth;

class ISPViewsController extends Controller
{
    //
    public static function createISPViewLog(Request $request) {
        $artifactaanr = ArtifactAANR::find($request->get('content_id'));
        if($artifactaanr->isp()->allRelatedIds()){
            foreach($artifactaanr->isp()->allRelatedIds() as $isp){
                $ispView = new ISPViews;
                $ispView->id_isp = $isp;
                $ispView->session_id = \Request::getSession()->getId();
                if(Auth::user()){
                    $ispView->user_id = \Auth::user()->id;
                } else {
                    $ispView->user_id = 0;
                }
                $ispView->ip = \Request::getClientIp();
                $ispView->agent = \Request::header('User-Agent');
                $ispView->save();
            }   
        }
    }
}
