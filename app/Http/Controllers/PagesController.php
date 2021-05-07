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
use App\ISP;
use App\Sector;
use App\Commodity;
use App\Consortia;
use App\Subscriber;

class PagesController extends Controller
{
    public function industryProfileView($industry_id){
        return view('pages.industryProfile');
    }

    public function aboutUs(){
        return view('pages.about');
    }

    public function search(){
        return view('pages.search');
    }

    public function dashboardManage(){
        $advertisements = Advertisement::all();
        $agendas = Agenda::all();
        $announcements = Announcement::all();
        $artifactAANR = ArtifactAANR::all();
        $content = Content::all();
        $content_subtype = ContentSubtype::all();
        $contributors = Contributor::all();
        $consortia = Consortia::pluck('short_name', 'id')->all();
        $isp = ISP::pluck('name', 'id')->all();
        $sectors = Sector::pluck('name', 'id')->all();
        $industries = Industry::pluck('name', 'id')->all();
        $commodities = Commodity::all();
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
    }
}
