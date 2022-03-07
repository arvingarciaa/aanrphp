<?php 
    $landing_page = App\LandingPageElement::find(1);
    $footer_info = App\FooterInfo::find(1);
    $publications_list = App\ArtifactAANR::where('content_id', '=', '15')->pluck('title', 'id')->all();
?>

<div class="modal fade" id="editIndustryProfileSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editIndustryProfileSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Industry Profile Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('industry_profile_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->industry_profile_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="industry_profile_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('industry_profile_header', 'Industry Profile Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('industry_profile_header', $landing_page->industry_profile_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('industry_profile_subheader', 'Industry Profile Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('industry_profile_subheader', $landing_page->industry_profile_subheader, ['class' => 'form-control'])); ?>

                </div>
                <div class="dropdown-divider mt-3"></div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Agriculture Icon', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_agri_icon!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_agri_icon); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('agri_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Agriculture Background', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_agri_bg!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_agri_bg); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the background.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('agri_bg', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
                <div class="dropdown-divider mt-3"></div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Aquatic Icon', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_aqua_icon!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_aqua_icon); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('aqua_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Aquatic Background', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_agri_bg!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_aqua_bg); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the background.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('aqua_bg', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
                <div class="dropdown-divider mt-3"></div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Natural Resources Icon', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_natural_icon!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_natural_icon); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25);background:rgb(0,0,0)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the icon.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('natural_icon', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('image', 'Natural Resources Background', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->industry_profile_natural_bg!=null): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->industry_profile_natural_bg); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:200px;border:1px solid rgba(100,100,100,0.25)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:200px; width:200px; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 250x250px logo for the background.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('natural_bg', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editLatestAANRSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editLatestAANRSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Latest AANR Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('latest_aanr_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->latest_aanr_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="latest_aanr_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('latest_aanr_header', 'Latest AANR Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('latest_aanr_header', $landing_page->latest_aanr_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('latest_aanr_subheader', 'Latest AANR Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('latest_aanr_subheader', $landing_page->latest_aanr_subheader, ['class' => 'form-control'])); ?>

                </div>
                <?php echo e(Form::label('banner', 'Change banner', ['class' => 'col-form-label'])); ?>

                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="1" <?php echo e($landing_page->latest_aanr_bg_type == 1 ? 'checked': ''); ?>> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio_latest_aanr" value="0" <?php echo e($landing_page->latest_aanr_bg_type != 1 ? 'checked': ''); ?>> Image</label>
                </div>
                <div class="form-group block-color-form_latest_aanr" style="<?php echo e($landing_page->latest_aanr_bg_type == 0 ? 'display:none': ''); ?>">
                    <?php echo e(Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::text('banner_color', $landing_page->latest_aanr_bg == 1 ? $landing_page->latest_aanr_bg : null, ['class' => 'form-control', 'placeholder' => 'Add a hex'])); ?>

                </div>
                <div class="form-group gradient-color-form_latest_aanr" style="<?php echo e($landing_page->latest_aanr_bg_type != 0 ? 'display:none': ''); ?>">
                    <?php echo e(Form::label('image', 'Latest AANR Section Background', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->latest_aanr_bg!=null && $landing_page->latest_aanr_bg_type == 0): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->latest_aanr_bg); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editUserTypeRecommendationSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editUserTypeRecommendationSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit User Type Recommendation Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('user_type_recommendation_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->user_type_recommendation_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="user_type_recommendation_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('user_type_recommendation_header', 'User Type Recommendation Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('user_type_recommendation_header', $landing_page->user_type_recommendation_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('user_type_recommendation_subheader', 'User Type Recommendation Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('user_type_recommendation_subheader', $landing_page->user_type_recommendation_subheader, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editFeaturedPublicationsSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editFeaturedPublicationsSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Featured Publications Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('featured_publications_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->featured_publications_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="featured_publications_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('featured_publications_header', 'Featured Publications Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('featured_publications_header', $landing_page->featured_publications_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('featured_publications_subheader', 'Featured Publications Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('featured_publications_subheader', $landing_page->featured_publications_subheader, ['class' => 'form-control'])); ?>

                </div>
                <div class="dropdown-divider mb-3"></div>
                <div class="form-group mt-2">
                    <h4 class="font-weight-bold">Featured Publications</h4>
                    <div class="form-group">
                        <?php echo e(Form::label('featured_1', 'First Featured Publication', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('featured_1', $publications_list, $landing_page->featured_artifact_id_1,['class' => 'form-control publications-select', 'placeholder' => 'Select Publication', 'style' => 'width:100% !important'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('featured_2', 'Second Featured Publication', ['class' => 'col-form-label required'])); ?>

                        <?php echo e(Form::select('featured_2', $publications_list, $landing_page->featured_artifact_id_2,['class' => 'form-control publications-select', 'placeholder' => 'Select Publication', 'style' => 'width:100% !important'])); ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editFeaturedVideosSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editFeaturedVideosSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Featured Videos Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('featured_videos_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->featured_videos_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="featured_videos_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('featured_videos_header', 'Featured Videos Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('featured_videos_header', $landing_page->featured_videos_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('featured_videos_subheader', 'Featured Videos Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('featured_videos_subheader', $landing_page->featured_videos_subheader, ['class' => 'form-control'])); ?>

                </div>  
                <div class="dropdown-divider mb-3"></div>
                <div class="form-group mt-2">
                    <h4 class="font-weight-bold">Featured Links</h4>
                    <div class="form-group">
                        <?php echo e(Form::label('first_link', 'Featured Video #1', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('first_link', $landing_page->featured_video_link_1, ['class' => 'form-control required', 'placeholder' => 'Copy link from YouTube'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('second_link', 'Featured Video #2', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('second_link', $landing_page->featured_video_link_2, ['class' => 'form-control', 'placeholder' => 'Copy link from YouTube'])); ?>

                    </div>
                    <div class="form-group">
                        <?php echo e(Form::label('thirt_link', 'Featured Video #3', ['class' => 'col-form-label'])); ?>

                        <?php echo e(Form::text('thirt_link', $landing_page->featured_video_link_3, ['class' => 'form-control', 'placeholder' => 'Copy link from YouTube'])); ?>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editRecommendedForYouSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editRecommendedForYouSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Recommended For You Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('recommended_for_you_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->recommended_for_you_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="recommended_for_you_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('recommended_for_you_header', 'Recommended For You Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('recommended_for_you_header', $landing_page->recommended_for_you_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('recommended_for_you_subheader', 'Recommended For You Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('recommended_for_you_subheader', $landing_page->recommended_for_you_subheader, ['class' => 'form-control'])); ?>

                </div>
                <?php echo e(Form::label('banner', 'Change banner', ['class' => 'col-form-label'])); ?>

                <div class="input-group">
                    <label class="mr-2 radio-inline"><input type="radio" name="banner_color_radio" value="1" <?php echo e($landing_page->recommended_for_you_bg_type == 1 ? 'checked': ''); ?>> Block color</label>
                    <label class="mx-2 radio-inline"><input type="radio" name="banner_color_radio" value="0" <?php echo e($landing_page->recommended_for_you_bg_type != 1 ? 'checked': ''); ?>> Image</label>
                </div>
                <div class="form-group block-color-form" style="<?php echo e($landing_page->recommended_for_you_bg_type == 0 ? 'display:none': ''); ?>">
                    <?php echo e(Form::label('banner_color', 'Change block color', ['class' => 'col-form-label'])); ?>

                    <?php echo e(Form::text('banner_color', $landing_page->recommended_for_you_bg_type == 1 ? $landing_page->recommended_for_you_bg : null, ['class' => 'form-control', 'placeholder' => 'Add a hex'])); ?>

                </div>
                <div class="form-group gradient-color-form" style="<?php echo e($landing_page->recommended_for_you_bg_type != 0 ? 'display:none': ''); ?>">
                    <?php echo e(Form::label('image', 'Recommended for You Section Background', ['class' => 'col-form-label required'])); ?>

                    <br>
                    <?php if($landing_page->recommended_for_you_bg!=null && $landing_page->recommended_for_you_bg_type == 0): ?>
                    <img src="/storage/page_images/<?php echo e($landing_page->recommended_for_you_bg); ?>" class="card-img-top" style="object-fit: cover;overflow:hidden;width:100%;border:1px solid rgba(100,100,100,0.25)" >
                    <?php else: ?>
                    <div class="card-img-top center-vertically px-3" style="height:225px; width:100%; background-color: rgb(227, 227, 227);">
                        <span class="font-weight-bold" style="font-size: 17px;line-height: 1.5em;color: #2b2b2b;">
                            Upload a 1800x550px logo for the background.
                        </span>
                    </div>
                    <?php endif; ?> 
                    <?php echo e(Form::file('image', ['class' => 'form-control mt-2 mb-3 pt-1'])); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editConsortiaMembersSectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editConsortiaMembersSection'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Consortia Members Section</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('consortia_members_visibility', 'Enable Section?', ['class' => 'col-form-label required'])); ?>

                    <input type="checkbox" <?php echo e($landing_page->consortia_members_visibility == 1 ? 'checked' : ''); ?> data-toggle="toggle" name="consortia_members_visibility">
                </div>
                <div class="form-group">
                    <?php echo e(Form::label('consortia_members_header', 'Consortia Members Header', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('consortia_members_header', $landing_page->consortia_members_header, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('consortia_members_subheader', 'Consortia Members Subheader', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('consortia_members_subheader', $landing_page->consortia_members_subheader, ['class' => 'form-control'])); ?>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<div class="modal fade" id="editFooterInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?php echo e(Form::open(['action' => ['LandingPageElementsController@editFooterInfo'], 'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Footer Info</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?php echo e(Form::label('about', 'About', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::textarea('about', $footer_info->about, ['class' => 'form-control', 'rows' => '4'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('phone_number', 'Phone Number', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('phone_number', $footer_info->phone_number, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('email', 'Email', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('email', $footer_info->email, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('address', 'Address', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('address', $footer_info->address, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('fb_link', 'Facebook Link', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('fb_link', $footer_info->fb_link, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('twitter_link', 'Twitter Link', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('twitter_link', $footer_info->twitter_link, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('instagram_link', 'Instagram Link', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('instagram_link', $footer_info->instagram_link, ['class' => 'form-control'])); ?>

                </div>
                <div class="form-group">
                    <?php echo e(Form::label('youtube_link', 'Youtube Link', ['class' => 'col-form-label required'])); ?>

                    <?php echo e(Form::text('youtube_link', $footer_info->youtube_link, ['class' => 'form-control'])); ?>

                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <?php echo e(Form::submit('Save Changes', ['class' => 'btn btn-success'])); ?>

            </div>
            <?php echo e(Form::close()); ?>

        </div>
    </div>
</div>

<style>
    .center-vertically{
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
    $(document).ready(function() {
        $('input[name$="banner_color_radio"]').click(function() {
            if($(this).val() == '1') {
                $('.gradient-color-form').hide();  
                $('.block-color-form').show();            
            }
            else {
                $('.block-color-form').hide();  
                $('.gradient-color-form').show();   
            }
        });
        $(document).ready(function() {
            $('.publications-select').select2();
        });
    });

    $(document).ready(function() {
        $('input[name$="banner_color_radio_latest_aanr"]').click(function() {
            if($(this).val() == '1') {
                $('.gradient-color-form_latest_aanr').hide();  
                $('.block-color-form_latest_aanr').show();            
            }
            else {
                $('.block-color-form_latest_aanr').hide();  
                $('.gradient-color-form_latest_aanr').show();   
            }
        });
    });
</script><?php /**PATH /var/www/aanrphp/resources/views/pages/modals/landingPage.blade.php ENDPATH**/ ?>