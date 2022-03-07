<!DOCTYPE html>
<?php 
    $footer_info = App\FooterInfo::find(1);
?>

<footer class="pb-4 pt-5" style="border-top:1px solid rgba(0,0,0,0.2)">
    <div class="container {{request()->edit == '1' && $user != null ? 'overlay-container' : ''}}">
        <div class="row">
            <div class="col-sm-4">
                <h5 class="footer-title">About KM4AANR</h5>
                <ul class="list-unstyled text-small">
                    <li>{!!$footer_info->about!!}</li>
                    <li style="margin-top:15px">
                        <img alt="Footer TTPD logo" src="/storage/page_images/for_footer.png" style="object-fit: cover;width:105px">
                    </li>
                    <li>
                       <small class="text-muted">
                            © 2019-2021 - KM4AANR.PH
                        </small>
                    </li>
                </ul>
            </div>
            <div class="col-sm-4 offset-sm-1">
                <h5 class="footer-title">Connect with us</h5>
                <ul class="list-unstyled text-small">
                    <li><i class="fas fa-phone" style="font-size:25px"></i> {{$footer_info->phone_number}}</li>
                    <li><i class="fas fa-envelope" style="font-size:25px;margin-top:3px"></i> {{$footer_info->email}}</li>
                    <li><i class="fas fa-map-marker-alt" style="font-size:25px;margin-top:3px"></i> {{$footer_info->address}}</li>
                    <li style="margin-top:15px">
                        <a target="_blank" aria-label="Footer FB" href="{{$footer_info->fb_link}}" style="font-size:30px;margin-right:5px;color:#3b5998"><i class="fab fa-facebook"></i></a> 
                        <a target="_blank" aria-label="Footer twitter" href="{{$footer_info->twitter_link}}" style="font-size:30px;margin-right:5px;color:#00acee"><i class="fab fa-twitter"></i></a> 
                        <a target="_blank" aria-label="Footer youtube" href="{{$footer_info->youtube_link}}" style="font-size:30px;margin-right:5px;color:#c4302b"><i class="fab fa-youtube"></i></a>
                        <a target="_blank" aria-label="Footer instagram" href="{{$footer_info->instagram_link}}" style="font-size:30px;margin-right:5px;color:#c4302b"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 ">
                <h5 class="footer-title">Links</h5>
                <ul class="list-unstyled text-small">
                    @foreach(App\FooterLink::all()->sortBy('position') as $footer_link)
                        <li>
                            <a target="_blank" href="{{$footer_link->link}}">{{$footer_link->name}}</a>
                        </li>
                    @endforeach
                </ul>
                
            </div>
        </div>

        @if(request()->edit == 1)
            <div class="hover-overlay" style="width:100%">    
                <button type="button" class="btn btn-xs btn-primary" data-target="#editFooterInfoModal" data-toggle="modal"><i class="far fa-edit"></i></button>      
            </div>
        @endif
    </div>
    <style>
        li > a{
            text-decoration:none;
            color:inherit;
        }
        .footer-title{
            color:rgb(0, 78, 183);
            font-size:20px;
            margin-bottom:10px;
            font-weight:600;
        }
    </style>
</footer>