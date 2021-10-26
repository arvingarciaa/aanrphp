<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use App\Advertisement;
use App\Agenda;
use App\Announcement;
use App\ArtifactAANR;
use App\Content;
use App\ContentSubtype;
use App\Contributor;
use App\ConsortiaMember;
use App\ISP;
use App\Sector;
use App\Commodity;
use App\Consortia;
use App\Subscriber;
use App\Agrisyunaryo;
use App\SearchQuery;
use App\PageViews;
use Auth;
use DB;
use Redirect;
use Carbon\Carbon;
use Stevebauman\Location\Facades\Location;

class PagesController extends Controller
{
    public function industryProfileView(){
        return view('pages.industryProfile');
    }

    public function aboutUs(){
        return view('pages.about');
    }

    public function usefulLinks(){
        return view('pages.usefulLinks');
    }

    public function searchAnalytics(){
        return view('analytics.search');
    }

    

    public function getLandingPage(){
        $pageView = new PageViews;
        $pageView->session_id = \Request::getSession()->getId();
        if(Auth::user()){
            $pageView->user_id = \Auth::user()->id;
        } else {
            $pageView->user_id = 0;
        }
        $pageView->ip = \Request::getClientIp();
        $pageView->agent = \Request::header('User-Agent');
        $pageView->save();
        return view('pages.index');
    }



    public function contentEdit($content_id){

        $advertisements = Advertisement::all();
        $content = Content::pluck('type', 'id')->all();
        $content_subtype = ContentSubtype::all();
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $isp = ISP::pluck('name', 'id')->all();
        $commodities = Commodity::pluck('name', 'id')->all();
        $artifact = ArtifactAANR::find($content_id);
        return view('pages.artifactEdit')
            ->withArtifact($artifact)
            ->withConsortia($consortia)
            ->withContent($content)
            ->withContentSubtypes($content_subtype)
            ->withISP($isp)
            ->withCommodities($commodities);
    }

    public function search(Request $request){
        $query = $request->search;
        if($query != null){
            $search_query = new SearchQuery;
            $search_query->query = $request->search;
            $userIp = $request->ip();
            $locationData = \Location::get($userIp);
            if($locationData){
                if($locationData->countryCode == 'PH'){
                    $search_query->location = $locationData->regionName;
                } else {
                    $search_query->location = null;
                }
            }
            $search_query->save();
        }
        $content_type = $request->content_type;
        $consortia = $request->consortia;
        $start = $request->start;
        $end = $request->end;
        $is_gad = $request->is_gad;
        /*if($request->consortium){
            $artifacts = $artifacts->where('consortia_id', '=', $request->consortium)->where('title','LIKE','%'.$query.'%');
        } else{
            $artifacts = $artifacts->where('title','LIKE','%'.$query.'%');
        } */

        
        $results = ArtifactAANR::query();
        
        if($content_type && $content_type != 'all'){
            $results = $results->where('content_id', $content_type);
        }

        if($consortia){
            $results = $results->where('consortia_id', $consortia);
        }

        if($start && $end){
            $startDate = Carbon::createFromFormat('d/m/Y', '01/01/'.$request->start);
            $endDate = Carbon::createFromFormat('d/m/Y', '06/01/'.$request->end);
            $results = $results->whereBetween('date_published', array($startDate, $endDate));
        }

        if($is_gad){
            $results->where('is_gad', '=', 1);
        }
        
        $results = $results->search($query)->paginate(10);

        return view('pages.search')
            ->withQuery($query)
            ->withResults($results);
    }

    public function advancedSearch(Request $request){
        $query = $request->search;
        $results = ArtifactAANR::all()->get();

        $results = $results->whereHas('consortia', function($q) {
            $q->where('short_name', 'like', '%' . 'STAARRDEC' . '%');
        })->search($query)->paginate(10);
    }

    public function agrisyunaryo(Request $request){
        if($request->letter){
            $agrisyunaryos = Agrisyunaryo::where('title','LIKE',$request->letter.'%')->paginate(10);
        } else {
            $agrisyunaryos = Agrisyunaryo::paginate(10);
        }
        return view('pages.agrisyunaryo')
            ->withAgrisyunaryos($agrisyunaryos);
    }

    public function agrisyunaryoSearch(Request $request){
        $query = $request->search;
        $results = Agrisyunaryo::where('title','LIKE','%'.$query.'%')->paginate(10);
        return view('pages.agrisyunaryoSearch')
            ->withQuery($query)
            ->withResults($results);
    }

    public function consortiaAboutPage(){
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $industries = Industry::pluck('name', 'id')->all();
        $artifactAANR = ArtifactAANR::where('is_agrisyunaryo', '=', 0)->get();
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $content = Content::pluck('type', 'id')->all();
        $content_subtype = ContentSubtype::all();
        return view('pages.consortiaAboutPage')
            ->withConsortia($consortia)
            ->withContent($content)
            ->withContentSubtypes($content_subtype)
            ->withIndustries($industries)
            ->withArtifactAANR($artifactAANR);
    }

    public function consortiaLandingPage(){
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $industries = Industry::pluck('name', 'id')->all();
        $artifactAANR = ArtifactAANR::all();
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $content = Content::pluck('type', 'id')->all();
        $content_subtype = ContentSubtype::all();
        return view('pages.consortiaLandingPage')
            ->withContent($content)
            ->withContentSubtypes($content_subtype)
            ->withConsortia($consortia)
            ->withIndustries($industries)
            ->withArtifactAANR($artifactAANR);
    }

    public function AANRAboutPage(){
        $consortia = Consortia::pluck('short_name', 'id')->all();
        return view('pages.AANRAboutPage')
            ->withConsortia($consortia);
    }

    public function PCAARRDAboutPage(){
        $consortia = Consortia::pluck('short_name', 'id')->all();
        return view('pages.PCAARRDAboutPage')
            ->withConsortia($consortia);
    }

    public function unitAboutPage(){
        $consortia = Consortia::pluck('short_name', 'id')->all();
        return view('pages.unitAboutPage')
            ->withConsortia($consortia);
    }

    public function dashboardManage(){
        if(Auth::check()){
            $advertisements = Advertisement::all();
            $agendas = Agenda::all();
            $announcements = Announcement::all();
            $artifactAANR = ArtifactAANR::where('is_agrisyunaryo', '=', 0)->get();
            $content = Content::pluck('type', 'id')->all();
            $content_subtype = ContentSubtype::all();
            $contributors = Contributor::all();
            $consortia = Consortia::pluck('short_name', 'id')->all();
            $isp = ISP::pluck('name', 'id')->all();
            $sectors = Sector::pluck('name', 'id')->all();
            $industries = Industry::pluck('name', 'id')->all();
            $commodities = Commodity::pluck('name', 'id')->all();
            $subscribers = Subscriber::all();
            return view('dashboard.manage')
                ->withAdvertisements($advertisements)
                ->withAgendas($agendas)
                ->withAnnouncements($announcements)
                ->withArtifactAANR($artifactAANR)
                ->withConsortia($consortia)
                ->withContent($content)
                ->withContentSubtypes($content_subtype)
                ->withContributors($contributors)
                ->withISP($isp)
                ->withSectors($sectors)
                ->withIndustries($industries)
                ->withCommodities($commodities)
                ->withSubscribers($subscribers);
        } else {
            return Redirect::route('login')->with('error','You have to be logged in to access this page.');
        }
    }

    public function userDashboard(){
        if(Auth::check()){
            $advertisements = Advertisement::all();
            $agendas = Agenda::all();
            $announcements = Announcement::all();
            $artifactAANR = ArtifactAANR::where('is_agrisyunaryo', '=', 0)->get();
            $content = Content::pluck('type', 'id')->all();
            $content_subtype = ContentSubtype::all();
            $contributors = Contributor::all();
            $consortia = Consortia::pluck('short_name', 'id')->all();
            $isp = ISP::pluck('name', 'id')->all();
            $sectors = Sector::pluck('name', 'id')->all();
            $industries = Industry::pluck('name', 'id')->all();
            $commodities = Commodity::all();
            $subscribers = Subscriber::all();
            return view('dashboard.userDashboard')
                ->withAdvertisements($advertisements)
                ->withAgendas($agendas)
                ->withAnnouncements($announcements)
                ->withArtifactAANR($artifactAANR)
                ->withConsortia($consortia)
                ->withContent($content)
                ->withContentSubtypes($content_subtype)
                ->withContributors($contributors)
                ->withISP($isp)
                ->withSectors($sectors)
                ->withIndustries($industries)
                ->withCommodities($commodities)
                ->withSubscribers($subscribers);
        } else {
            return Redirect::route('login')->with('error','You have to be logged in to access this page.');
        }
    }
}
