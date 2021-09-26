<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPageElement;

class LandingPageElementsController extends Controller
{
    public function updateTopBanner(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->top_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->top_banner;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->top_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Top banner image updated');
    }

    public function updateConsortiaBanner(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->consortia_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->consortia_banner;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->consortia_banner = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Consortia banner image updated');
    }

    public function updateHeaderLogo(Request $request){
        $this->validate($request, [
            'image' => 'required'
        ]);

        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->header_logo != null){
                $image_path = public_path().'/storage/page_images/'.$page->header_logo;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
    		$imageFile->move(public_path('/storage/page_images/'), $imageName);
        }

        $page->header_logo = $imageName;
        $page->save();

        return redirect('/manage')->with('success', 'Header Logo image updated');
    }

    public function updateLandingPageViews(Request $request){
        $page = LandingPageElement::find(1);
        $page->landing_page_item_carousel = $request->input('landing_page_item_carousel');
        $page->landing_page_item_social_media_button = $request->input('landing_page_item_social_media_button');
        $page->landing_page_item_search_bar = $request->input('landing_page_item_search_bar');
        $page->landing_page_item_technology_latest_in_aanr = $request->input('landing_page_item_technology_latest_in_aanr');
        $page->landing_page_item_consortia = $request->input('landing_page_item_consortia');
        $page->landing_page_item_explore_aanr = $request->input('landing_page_item_explore_aanr');
        $page->landing_page_item_need_help = $request->input('landing_page_item_need_help');
        $page->landing_page_item_elib_publication = $request->input('landing_page_item_elib_publication');
        $page->save();
        return redirect('/manage')->with('success', 'Landing page views updated');
    }

    public function editIndustryProfileSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->industry_profile_header = $request->input('industry_profile_header');
        $page->industry_profile_subheader = $request->input('industry_profile_subheader');
        if($request->hasFile('agri_icon')){
            if($page->industry_profile_agri_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_agri_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('agri_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_agri_icon = $imageName;
        }
        if($request->hasFile('agri_bg')){
            if($page->industry_profile_agri_bg != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_agri_bg;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('agri_bg');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_agri_bg = $imageName;
        }
        if($request->hasFile('aqua_icon')){
            if($page->industry_profile_aqua_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_aqua_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('aqua_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_aqua_icon = $imageName;
        }
        if($request->hasFile('aqua_bg')){
            if($page->industry_profile_aqua_bg != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_aqua_bg;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('aqua_bg');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_aqua_bg = $imageName;
        }
        if($request->hasFile('natural_icon')){
            if($page->industry_profile_natural_icon != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_natural_icon;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('natural_icon');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_natural_icon = $imageName;
        }
        if($request->hasFile('natural_bg')){
            if($page->industry_profile_natural_bg != null){
                $image_path = public_path().'/storage/page_images/'.$page->industry_profile_natural_bg;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('natural_bg');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->industry_profile_natural_bg = $imageName;
        }
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Industry Profile Section Updated');
    }

    public function editLatestAANRSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->latest_aanr_header = $request->input('latest_aanr_header');
        $page->latest_aanr_subheader = $request->input('latest_aanr_subheader');

        if($request->banner_color_radio_latest_aanr == 1){
            $image_path = public_path().'/storage/page_images/'.$page->latest_aanr_bg;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $page->latest_aanr_bg = $request->input('banner_color');
            $page->latest_aanr_bg_type = 1;
        } else {
            if($request->hasFile('image')){
                if($page->latest_aanr_bg != null){
                    $image_path = public_path().'/storage/page_images/'.$page->latest_aanr_bg;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
                $page->latest_aanr_bg = $imageName;
            }
            $page->latest_aanr_bg_type = 0;
        }

        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Latest AANR Section Updated');
    }

    public function editUserTypeRecommendationSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->user_type_recommendation_header = $request->input('user_type_recommendation_header');
        $page->user_type_recommendation_subheader = $request->input('user_type_recommendation_subheader');
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page User Type Recommendation Section Updated');
    }

    public function editFeaturedPublicationsSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->featured_publications_header = $request->input('featured_publications_header');
        $page->featured_publications_subheader = $request->input('featured_publications_subheader');
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Featured Publications Section Updated');
    }

    public function editFeaturedVideosSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->featured_videos_header = $request->input('featured_videos_header');
        $page->featured_videos_subheader = $request->input('featured_videos_subheader');
        $page->featured_video_link_1 = $request->input('first_link');
        $page->featured_video_link_2 = $request->input('second_link');
        $page->featured_video_link_3 = $request->input('third_link');
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Featured Videos Section Updated');
    }

    public function editRecommendedForYouSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->recommended_for_you_header = $request->input('recommended_for_you_header');
        $page->recommended_for_you_subheader = $request->input('recommended_for_you_subheader');
        if($request->banner_color_radio == 1){
            $image_path = public_path().'/storage/page_images/'.$page->recommended_for_you_bg;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            $page->recommended_for_you_bg = $request->input('banner_color');
            $page->recommended_for_you_bg_type = 1;
        } else {
            if($request->hasFile('image')){
                if($page->recommended_for_you_bg != null){
                    $image_path = public_path().'/storage/page_images/'.$page->recommended_for_you_bg;
                    if(file_exists($image_path)){
                        unlink($image_path);
                    }
                }
                $imageFile = $request->file('image');
                $imageName = uniqid().$imageFile->getClientOriginalName();
                $imageFile->move(public_path('/storage/page_images/'), $imageName);
                $page->recommended_for_you_bg = $imageName;
            }
            $page->recommended_for_you_bg_type = 0;
        }
        
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Recommended For You Section Updated');
    }

    public function editConsortiaMembersSection(Request $request){
        $page = LandingPageElement::find(1);
        $page->consortia_members_header = $request->input('consortia_members_header');
        $page->consortia_members_subheader = $request->input('consortia_members_subheader');
        $page->save();
        return redirect('/?edit=1')->with('success', 'Landing Page Consortia Members Section Updated');
    }

    public function editIndustryProfile(Request $request){
        $page = LandingPageElement::find(1);
        if($request->profile_1){
            $page->agriculture_profile = $request->profile_1;
            $page->save();
            return redirect('/aanr-industry-profile?edit=1&industry=1')->with('success', 'Profile Updated');
        } elseif($request->profile_2){
            $page->aquatic_profile = $request->profile_2;
            $page->save();
            return redirect('/aanr-industry-profile?edit=1&industry=2')->with('success', 'Profile Updated');
        } elseif($request->profile_3){
            $page->natural_profile = $request->profile_3;
            $page->save();
            return redirect('/aanr-industry-profile?edit=1&industry=3')->with('success', 'Profile Updated');
        }
    }

    public function editAgrisyunaryoSearchBanner(Request $request){
        $page = LandingPageElement::find(1);
        if($request->hasFile('image')){
            if($page->agrisyunaryo_search_banner != null){
                $image_path = public_path().'/storage/page_images/'.$page->agrisyunaryo_search_banner;
                if(file_exists($image_path)){
                    unlink($image_path);
                }
            }
            $imageFile = $request->file('image');
            $imageName = uniqid().$imageFile->getClientOriginalName();
            $imageFile->move(public_path('/storage/page_images/'), $imageName);
            $page->agrisyunaryo_search_banner = $imageName;
        }
        $page->save();
        return redirect('agrisyunaryo/?edit=1')->with('success', 'Agrisyunaryo Search Banner Updated');
    }
}
