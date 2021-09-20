<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommodityViews;
use App\ArtifactAANR;
use Auth;

class CommodityViewsController extends Controller
{
    //
    public static function createCommodityViewLog(Request $request) {
        $artifactaanr = ArtifactAANR::find($request->get('content_id'));
        if($artifactaanr->commodities()->allRelatedIds()){
            foreach($artifactaanr->commodities()->allRelatedIds() as $commodity){
                $commodityView = new CommodityViews;
                $commodityView->id_commodity = $commodity;
                $commodityView->session_id = \Request::getSession()->getId();
                if(Auth::user()){
                    $commodityView->user_id = \Auth::user()->id;
                } else {
                    $commodityView->user_id = 0;
                }
                $commodityView->ip = \Request::getClientIp();
                $commodityView->agent = \Request::header('User-Agent');
                $commodityView->save();
            }   
        }
    }
}
