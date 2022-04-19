<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandingPageElement;
use App\FooterInfo;
use App\Log;

class LandingPageElementsController extends Controller
{
    public function updateTopBanner(Request $request){
        $this->validate($request, [
            'image' => ['required', 'mimes:jpeg,bmp,png,gif', 'max:10240']
        ]);
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
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

            $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->top_banner.' <strong>-></strong> '.$imageName.'<br>';
            $page->top_banner = $imageName;
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Top Banner';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect()->back()->with('success', 'Top banner image updated');
        }
    }

    public function updateConsortiaBanner(Request $request){
        $this->validate($request, [
            'image' => ['required', 'mimes:jpeg,bmp,png,gif', 'max:10240']
        ]);

        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
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

            $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->consortia_banner.' <strong>-></strong> '.$imageName.'<br>';
            $page->consortia_banner = $imageName;
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Consortia Banner';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect()->back()->with('success', 'Consortia banner image updated');
        }
    }

    public function updateHeaderLogo(Request $request){
        $this->validate($request, [
            'image' => ['required', 'mimes:jpeg,bmp,png,gif', 'max:10240']
        ]);
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
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

            $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->header_logo.' <strong>-></strong> '.$imageName.'<br>';
            $page->header_logo = $imageName;
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Header Logo';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect()->back()->with('success', 'Header Logo image updated');
        }
    }

    public function updateLandingPageViews(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->landing_page_item_carousel != $request->landing_page_item_carousel){
                $temp_changes = $temp_changes.'<strong>Carousel:</strong> '.$page->landing_page_item_carousel.' <strong>-></strong> '.$request->landing_page_item_carousel.'<br>';
            }
            if($page->landing_page_item_social_media_button != $request->landing_page_item_social_media_button){
                $temp_changes = $temp_changes.'<strong>Social Media Button:</strong> '.$page->landing_page_item_social_media_button.' <strong>-></strong> '.$request->landing_page_item_social_media_button.'<br>';
            }
            if($page->landing_page_item_search_bar != $request->landing_page_item_search_bar){
                $temp_changes = $temp_changes.'<strong>Search Bar:</strong> '.$page->landing_page_item_search_bar.' <strong>-></strong> '.$request->landing_page_item_search_bar.'<br>';
            }
            if($page->landing_page_item_technology_latest_in_aanr != $request->landing_page_item_technology_latest_in_aanr){
                $temp_changes = $temp_changes.'<strong>Latest in AANR:</strong> '.$page->landing_page_item_technology_latest_in_aanr.' <strong>-></strong> '.$request->landing_page_item_technology_latest_in_aanr.'<br>';
            }
            if($page->landing_page_item_consortia != $request->landing_page_item_consortia){
                $temp_changes = $temp_changes.'<strong>Consortia:</strong> '.$page->landing_page_item_consortia.' <strong>-></strong> '.$request->landing_page_item_consortia.'<br>';
            }
            if($page->landing_page_item_explore_aanr != $request->landing_page_item_explore_aanr){
                $temp_changes = $temp_changes.'<strong>Explore AANR:</strong> '.$page->landing_page_item_explore_aanr.' <strong>-></strong> '.$request->landing_page_item_explore_aanr.'<br>';
            }
            if($page->landing_page_item_need_help != $request->landing_page_item_need_help){
                $temp_changes = $temp_changes.'<strong>Need Help:</strong> '.$page->landing_page_item_need_help.' <strong>-></strong> '.$request->landing_page_item_need_help.'<br>';
            }
            if($page->landing_page_item_elib_publication != $request->landing_page_item_elib_publication){
                $temp_changes = $temp_changes.'<strong>eLib Publication:</strong> '.$page->landing_page_item_elib_publication.' <strong>-></strong> '.$request->landing_page_item_elib_publication.'<br>';
            }

            $page->landing_page_item_carousel = $request->input('landing_page_item_carousel');
            $page->landing_page_item_social_media_button = $request->input('landing_page_item_social_media_button');
            $page->landing_page_item_search_bar = $request->input('landing_page_item_search_bar');
            $page->landing_page_item_technology_latest_in_aanr = $request->input('landing_page_item_technology_latest_in_aanr');
            $page->landing_page_item_consortia = $request->input('landing_page_item_consortia');
            $page->landing_page_item_explore_aanr = $request->input('landing_page_item_explore_aanr');
            $page->landing_page_item_need_help = $request->input('landing_page_item_need_help');
            $page->landing_page_item_elib_publication = $request->input('landing_page_item_elib_publication');
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Landing Page Views';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect()->back()->with('success', 'Landing page views updated');
        }
    }

    public function editIndustryProfileSection(Request $request){
        $this->validate($request, [
            'agri_icon' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
            'agri_bg' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
            'aqua_icon' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
            'aqua_bg' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
            'natural_icon' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
            'natural_bg' => ['mimes:jpeg,bmp,png,gif', 'max:10240'],
        ]);
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->industry_profile_visibility != $request->industry_profile_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->industry_profile_visibility.' <strong>-></strong> '.$request->industry_profile_visibility.'<br>';
            }
            if($page->industry_profile_header != $request->industry_profile_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->industry_profile_header.' <strong>-></strong> '.$request->industry_profile_header.'<br>';
            }
            if($page->industry_profile_subheader != $request->industry_profile_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->industry_profile_subheader.' <strong>-></strong> '.$request->industry_profile_subheader.'<br>';
            }

            if($request->industry_profile_visibility == 'on'){
                $page->industry_profile_visibility = 1;
            } else {
                $page->industry_profile_visibility = 0;
            }
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
                $temp_changes = $temp_changes.'<strong>Agri Icon:</strong> '.$page->industry_profile_agri_icon.' <strong>-></strong> '.$imageName.'<br>';
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
                $temp_changes = $temp_changes.'<strong>Agri BG:</strong> '.$page->industry_profile_agri_bg.' <strong>-></strong> '.$imageName.'<br>';
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
                $temp_changes = $temp_changes.'<strong>Aqua Icon:</strong> '.$page->industry_profile_aqua_icon.' <strong>-></strong> '.$imageName.'<br>';
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
                $temp_changes = $temp_changes.'<strong>Aqua BG:</strong> '.$page->industry_profile_aqua_bg.' <strong>-></strong> '.$imageName.'<br>';
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
                $temp_changes = $temp_changes.'<strong>Natural Icon:</strong> '.$page->industry_profile_natural_icon.' <strong>-></strong> '.$imageName.'<br>';
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
                $temp_changes = $temp_changes.'<strong>Natural BG:</strong> '.$page->industry_profile_natural_bg.' <strong>-></strong> '.$imageName.'<br>';
                $page->industry_profile_natural_bg = $imageName;
            }
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Industry Profile Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page Industry Profile Section Updated');
        }
    }

    public function editLatestAANRSection(Request $request){
        $this->validate($request, [
            'image' => ['mimes:jpeg,bmp,png,gif', 'max:10240']
        ]);
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->latest_aanr_visibility != $request->latest_aanr_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->latest_aanr_visibility.' <strong>-></strong> '.$request->latest_aanr_visibility.'<br>';
            }
            if($page->latest_aanr_header != $request->latest_aanr_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->latest_aanr_header.' <strong>-></strong> '.$request->latest_aanr_header.'<br>';
            }
            if($page->latest_aanr_subheader != $request->latest_aanr_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->latest_aanr_subheader.' <strong>-></strong> '.$request->latest_aanr_subheader.'<br>';
            }

            if($request->latest_aanr_visibility == 'on'){
                $page->latest_aanr_visibility = 1;
            } else {
                $page->latest_aanr_visibility = 0;
            }
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
                    $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->latest_aanr_bg.' <strong>-></strong> '.$imageName.'<br>';
                    $page->latest_aanr_bg = $imageName;
                }
                $page->latest_aanr_bg_type = 0;
            }

            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Latest AANR Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page Latest AANR Section Updated');
        }
    }

    public function editUserTypeRecommendationSection(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->user_type_recommendation_visibility != $request->user_type_recommendation_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->user_type_recommendation_visibility.' <strong>-></strong> '.$request->user_type_recommendation_visibility.'<br>';
            }
            if($page->user_type_recommendation_header != $request->user_type_recommendation_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->user_type_recommendation_header.' <strong>-></strong> '.$request->user_type_recommendation_header.'<br>';
            }
            if($page->user_type_recommendation_subheader != $request->user_type_recommendation_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->user_type_recommendation_subheader.' <strong>-></strong> '.$request->user_type_recommendation_subheader.'<br>';
            }

            if($request->user_type_recommendation_visibility == 'on'){
                $page->user_type_recommendation_visibility = 1;
            } else {
                $page->user_type_recommendation_visibility = 0;
            }        
            $page->user_type_recommendation_header = $request->input('user_type_recommendation_header');
            $page->user_type_recommendation_subheader = $request->input('user_type_recommendation_subheader');
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited User Type Recommendation Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page User Type Recommendation Section Updated');
        }
    }

    public function editFeaturedPublicationsSection(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->featured_publications_visibility != $request->featured_publications_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->featured_publications_visibility.' <strong>-></strong> '.$request->featured_publications_visibility.'<br>';
            }
            if($page->featured_publications_header != $request->featured_publications_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->featured_publications_header.' <strong>-></strong> '.$request->featured_publications_header.'<br>';
            }
            if($page->featured_publications_subheader != $request->featured_publications_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->featured_publications_subheader.' <strong>-></strong> '.$request->featured_publications_subheader.'<br>';
            }
            if($page->featured_artifact_id_1 != $request->featured_1){
                $temp_changes = $temp_changes.'<strong>Featured Publication 1:</strong> '.$page->featured_artifact_id_1.' <strong>-></strong> '.$request->featured_1.'<br>';
            }
            if($page->featured_artifact_id_2 != $request->featured_2){
                $temp_changes = $temp_changes.'<strong>Featured Publication 2:</strong> '.$page->featured_artifact_id_2.' <strong>-></strong> '.$request->featured_2.'<br>';
            }


            if($request->featured_publications_visibility == 'on'){
                $page->featured_publications_visibility = 1;
            } else {
                $page->featured_publications_visibility = 0;
            }     
            $page->featured_publications_header = $request->input('featured_publications_header');
            $page->featured_publications_subheader = $request->input('featured_publications_subheader');
            $page->featured_artifact_id_1 = $request->featured_1;
            $page->featured_artifact_id_2 = $request->featured_2;
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Featured Publications Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page Featured Publications Section Updated');
        }
    }

    public function editFeaturedVideosSection(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->featured_videos_visibility != $request->featured_videos_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->featured_videos_visibility.' <strong>-></strong> '.$request->featured_videos_visibility.'<br>';
            }
            if($page->featured_videos_header != $request->featured_videos_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->featured_videos_header.' <strong>-></strong> '.$request->featured_videos_header.'<br>';
            }
            if($page->featured_videos_subheader != $request->featured_videos_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->featured_videos_subheader.' <strong>-></strong> '.$request->featured_videos_subheader.'<br>';
            }
            if($page->featured_video_link_1 != $request->first_link){
                $temp_changes = $temp_changes.'<strong>Featured Video 1:</strong> '.$page->featured_video_link_1.' <strong>-></strong> '.$request->first_link.'<br>';
            }
            if($page->featured_video_link_2 != $request->second_link){
                $temp_changes = $temp_changes.'<strong>Featured Video 2:</strong> '.$page->featured_video_link_2.' <strong>-></strong> '.$request->second_link.'<br>';
            }
            if($page->featured_video_link_3 != $request->third_link){
                $temp_changes = $temp_changes.'<strong>Featured Video 3:</strong> '.$page->featured_video_link_3.' <strong>-></strong> '.$request->third_link.'<br>';
            }

            if($request->featured_videos_visibility == 'on'){
                $page->featured_videos_visibility = 1;
            } else {
                $page->featured_videos_visibility = 0;
            }     
            $page->featured_videos_header = $request->input('featured_videos_header');
            $page->featured_videos_subheader = $request->input('featured_videos_subheader');
            $page->featured_video_link_1 = $request->input('first_link');
            $page->featured_video_link_2 = $request->input('second_link');
            $page->featured_video_link_3 = $request->input('third_link');
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Featured Videos Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page Featured Videos Section Updated');
            
        }
    }

    public function editRecommendedForYouSection(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);

            if($page->recommended_for_you_visibility != $request->recommended_for_you_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->recommended_for_you_visibility.' <strong>-></strong> '.$request->recommended_for_you_visibility.'<br>';
            }
            if($page->recommended_for_you_header != $request->recommended_for_you_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->recommended_for_you_header.' <strong>-></strong> '.$request->recommended_for_you_header.'<br>';
            }
            if($page->recommended_for_you_subheader != $request->recommended_for_you_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->recommended_for_you_subheader.' <strong>-></strong> '.$request->recommended_for_you_subheader.'<br>';
            }

            if($request->recommended_for_you_visibility == 'on'){
                $page->recommended_for_you_visibility = 1;
            } else {
                $page->recommended_for_you_visibility = 0;
            }     
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
                    $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->recommended_for_you_bg.' <strong>-></strong> '.$imageName.'<br>';
                    $page->recommended_for_you_bg = $imageName;
                }
                $page->recommended_for_you_bg_type = 0;
            }
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Recommended for You Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Landing Page Recommended For You Section Updated');
        }
    }

    public function editConsortiaMembersSection(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);
            
            if($page->consortia_members_visibility != $request->consortia_members_visibility){
                $temp_changes = $temp_changes.'<strong>Section Visibility:</strong> '.$page->consortia_members_visibility.' <strong>-></strong> '.$request->consortia_members_visibility.'<br>';
            }
            if($page->consortia_members_header != $request->consortia_members_header){
                $temp_changes = $temp_changes.'<strong>Header:</strong> '.$page->consortia_members_header.' <strong>-></strong> '.$request->consortia_members_header.'<br>';
            }
            if($page->consortia_members_subheader != $request->consortia_members_subheader){
                $temp_changes = $temp_changes.'<strong>Subheader:</strong> '.$page->consortia_members_subheader.' <strong>-></strong> '.$request->consortia_members_subheader.'<br>';
            }

            if($request->consortia_members_visibility == 'on'){
                $page->consortia_members_visibility = 1;
            } else {
                $page->consortia_members_visibility = 0;
            }     
            $page->consortia_members_header = $request->input('consortia_members_header');
            $page->consortia_members_subheader = $request->input('consortia_members_subheader');
            $page->save();
            return redirect('/?edit=1')->with('success', 'Landing Page Consortia Members Section Updated');

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Consortia Members Section';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();
        }
    }

    public function editIndustryProfile(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
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
            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = 'Edited Industry Profile';
            $log->action = 'Edited Industry Profile';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();
        }
    }

    public function editAgrisyunaryoSearchBanner(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
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
                $temp_changes = $temp_changes.'<strong>Image:</strong> '.$page->agrisyunaryo_search_banner.' <strong>-></strong> '.$imageName.'<br>';
                $page->agrisyunaryo_search_banner = $imageName;
            }
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Agrisyunaryo Search Banner';
            $log->IP_address = $request->ip();
            $log->resource = 'Agrisyunaryo Page';
            $log->save();

            return redirect('agrisyunaryo/?edit=1')->with('success', 'Agrisyunaryo Search Banner Updated');
        }
    }

    public function editFooterinfo(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $footer = FooterInfo::find(1);
            if($footer->about != $request->about){
                $temp_changes = $temp_changes.'<strong>About:</strong> '.$footer->about.' <strong>-></strong> '.$request->about.'<br>';
            }
            if($footer->phone_number != $request->phone_number){
                $temp_changes = $temp_changes.'<strong>Phone Number:</strong> '.$footer->phone_number.' <strong>-></strong> '.$request->phone_number.'<br>';
            }
            if($footer->address != $request->address){
                $temp_changes = $temp_changes.'<strong>Address:</strong> '.$footer->address.' <strong>-></strong> '.$request->address.'<br>';
            }
            if($footer->email != $request->email){
                $temp_changes = $temp_changes.'<strong>Email:</strong> '.$footer->email.' <strong>-></strong> '.$request->email.'<br>';
            }
            if($footer->fb_link != $request->fb_link){
                $temp_changes = $temp_changes.'<strong>FB Link:</strong> '.$footer->fb_link.' <strong>-></strong> '.$request->fb_link.'<br>';
            }
            if($footer->twitter_link != $request->twitter_link){
                $temp_changes = $temp_changes.'<strong>Twitter Link:</strong> '.$footer->twitter_link.' <strong>-></strong> '.$request->twitter_link.'<br>';
            }
            if($footer->instagram_link != $request->instagram_link){
                $temp_changes = $temp_changes.'<strong>Instagram Link:</strong> '.$footer->instagram_link.' <strong>-></strong> '.$request->instagram_link.'<br>';
            }
            if($footer->youtube_link != $request->youtube_link){
                $temp_changes = $temp_changes.'<strong>YouTube Link:</strong> '.$footer->youtube_link.' <strong>-></strong> '.$request->youtube_link.'<br>';
            }

            $footer->about = $request->about;
            $footer->phone_number = $request->phone_number;
            $footer->address = $request->address;
            $footer->email = $request->email;
            $footer->fb_link = $request->fb_link;
            $footer->twitter_link = $request->twitter_link;
            $footer->instagram_link = $request->instagram_link;
            $footer->youtube_link = $request->youtube_link;
            $footer->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = $temp_changes;
            $log->action = 'Edited Footer Info';
            $log->IP_address = $request->ip();
            $log->resource = 'Landing Page';
            $log->save();

            return redirect('/?edit=1')->with('success', 'Footer Info Updated');
        }
    }

    public function sendEmailToRegister(Request $request){
        return redirect('/register?email='.$request->email)->with('success', 'Please fill up the rest of the form to register.');
    }

    public function editUsefulLinks(Request $request){
        $user = auth()->user();
        $temp_changes = '';
        $log = new Log;
        if($user->role != 5 && $user->role != 1){
            return redirect()->back()->with('error','Your account is not authorized to use this function.'); 
        } else {
            $page = LandingPageElement::find(1);
            $page->useful_links = $request->useful_links;
            $page->save();

            $log->user_id = $user->id;
            $log->user_email = $user->email;
            $log->changes = 'Edited Useful Links';
            $log->action = 'Edited Useful Links';
            $log->IP_address = $request->ip();
            $log->resource = 'Useful Links Page';
            $log->save();

            return redirect('/usefulLinks?edit=1')->with('success', 'Useful Links Updated');
        }

    }
}
