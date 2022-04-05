@extends('layouts.app')
@section('title', 'Industry Profile')
@section('breadcrumb')
    <?php
        $headlines = App\Headline::all();
        $count = 0;
        $landing_page = App\LandingPageElement::find(1);
        $user = auth()->user();
    ?>
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            @foreach($headlines as $headline)
                <div class="carousel-item {{$count == 0 ? 'active' : ''}} text-center p-4">
                    <a href="{{$headline->link}}" target="_blank" style="text-decoration: none; color:white; font-size:15px">{{$headline->title}}</a>
                </div>
                <?php $count++ ?>
            @endforeach
        </div>
    </div>
@endsection
@section('content')
@include('layouts.messages')

@if($user != null && $user->role == 5)
    <div class="edit-bar">
        <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
            <div class="col-auto text-white font-weight-bold">
                You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
            </div>
            @if(request()->edit == 1)
                <a href="{{route('industryProfileView', ['industry' => request()->industry])}}" class="btn btn-success">View Live</a>
            @else
                <a href="{{route('industryProfileView', ['edit' => '1', 'industry' => request()->industry])}}" class="btn btn-light">Edit</a>
            @endif
        </nav>
    </div> 
@endif

<div class="container section-margin pt-3 pb-5">
    <a href="/" style="font-size:20px"><i class="fas fa-arrow-left"></i> Bumalik sa Search</a><br><br>
    @if(request()->industry == 1)
        <h1 style="color: #2980b9;">Agriculture</h1>
        <div class="{{request()->edit == '1' ? 'overlay-container' : ''}}" style="min-height:250px">
            <span class="pt-3" style="font-size:1rem">{!! $landing_page->agriculture_profile !!}</span>
            @if(request()->edit == 1)
                <div class="hover-overlay" style="width:100%">    
                    <button type="button" class="btn btn-xs btn-primary" data-target="#editProfile" data-toggle="modal"><i class="far fa-edit"></i></button>      
                </div>
            @endif
        </div>
    @elseif(request()->industry == 2)
        <h1 style="color: #2980b9;">Aquatic Resources</h1>
        <div class="{{request()->edit == '1' ? 'overlay-container' : ''}}" style="min-height:250px">
            <span class="pt-3" style="font-size:1rem">{!! $landing_page->aquatic_profile !!}</span>
            @if(request()->edit == 1)
                <div class="hover-overlay" style="width:100%">    
                    <button type="button" class="btn btn-xs btn-primary" data-target="#editProfile" data-toggle="modal"><i class="far fa-edit"></i></button>      
                </div>
            @endif
        </div>
    @else
        <h1 style="color: #2980b9;">Environment and Natural Resources</h1>
        <div class="{{request()->edit == '1' ? 'overlay-container' : ''}}" style="min-height:250px">
            <span class="pt-3" style="font-size:1rem">{!! $landing_page->natural_profile !!}</span>
            @if(request()->edit == 1)
                <div class="hover-overlay" style="width:100%">    
                    <button type="button" class="btn btn-xs btn-primary" data-target="#editProfile" data-toggle="modal"><i class="far fa-edit"></i></button>      
                </div>
            @endif
        </div>
    @endif
<!--
        <span>
        Isa ang agrikultura sa pinakamalaking industriya at pinagkukunan ng kabuhayan sa bansa. Nabibilang dito ang mga sektor ng paghahalaman (crops) at paghahayupan (livestock). 
        <br><br>
        Kaugnay dito, binuo ng PCAARRD ang Industry Strategic S&T Programs o ISPs upang makapagbigay ng mga solusyong naka-base sa agham at teknolohiya para sa mga pangangailangan ng AANR. Nakabase ito sa iba’t ibang mga kalakal o commodity sa bansa. Ilang halimbawa ng ISPs sa ilalim ng paghahalaman ay mga programa at proyekto para sa abaka, kakaw, kape, at mangga. Para naman sa paghahayupan, mayroong mga ISP para sa gatas o dairy, itik, kambing, baboy, atbp. 
    </span>
    <br><br>
    <h4 style="font-weight:900">
        Kilalanin ang industriya ng agrikultura
    </h4>
    <span>
        Dito sa aanr.ph, gusto nating malaman kung ano ba ang pinakabagong usapin sa AANR. Kasalukyan, ito ang mga kaalaman sa Agrikultura na maari ninyong makita dito.
    </span>
    <br><br>    
    <h5 style="font-weight:900">
        Distribusyon ng Nilalaman kada Sektor
    </h5>
    <span>
        Ipinapakita ng graph na ito ang bilang at distribusyon ng mga uri ng nilalaman para sa bawat sektor. Sa kasalukuyan, ang mga uri ng nilalaman o knowledge assets ay pinakamarami sa ilalim ng balita at teknolohiya, kung saan paghahalaman ang sektor na may pinakamaraming nilalaman.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph1.png" alt="">
    </div>
    <br><br>    
    <h5 style="font-weight:900">
        Mga Tagapag-ambag ng Kaalaman
    </h5>
    <span>
        Ipinapakita sa graph na ito kung aling mga institusyon at/o indibidwal ang nakapaglimbag ng pinakamaraming knowledge assets base sa nakalap na datos. Sa kasalukuyan, ang mga institusyon na mga pinakamaraming ambag na knowledge assets sa portal ay ang PCAARRD at UPLB.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph2.png" alt="">
    </div>
    <br><br>    
    <h5 style="font-weight:900">
        Mga Kontribusyon sa Pagdaan ng Panahon kada Sektor
    </h5>
    <span>
        Ipinapakita ng graph na ito ang kontirbusyon sa knowledge assets ng mga sektor sa pagdaan ng mga taon. Sa kasalukuyan, naitala ang pinakamaraming kontribusyong nailathala sa 2016, mula sa sektor ng tubig tabang. Mapapansin rin natin na kakaunti ang mga knowledge assets sa ilalim ng yamang tubig.
    </span>
    <br><br>
    <div class="w-100 text-center">
        <img src="/storage/page_images/graph3.png" alt="">
    </div>
    !
-->
    <br><br>
</div>

<div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            {{ Form::open(['action' => ['LandingPageElementsController@editIndustryProfile'], 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Edit Industry Profile</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    @if(request()->industry == 1)
                        {{Form::label('profile_1', 'Agriculture', ['class' => 'col-form-label'])}}
                        {{Form::textarea('profile_1', $landing_page->agriculture_profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                    @elseif(request()->industry == 2)
                        {{Form::label('profile_2', 'Aquatic', ['class' => 'col-form-label'])}}
                        {{Form::textarea('profile_2', $landing_page->aquatic_profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                    @else
                        {{Form::label('profile_3', 'Natural Resources', ['class' => 'col-form-label'])}}
                        {{Form::textarea('profile_3', $landing_page->natural_profile, ['class' => 'form-control', 'placeholder' => 'Add a profile', 'rows' => '4'])}}
                    @endif
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                {{Form::submit('Save Changes', ['class' => 'btn btn-success'])}}
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>

<style>
    .hover-overlay {
        transition: .5s ease;
        height:100%;
        opacity: 0;
        position: absolute;
        z-index:1000;
        text-align: right;
    }

    .overlay-container{
        position: relative;
        background-color:rgba(0,0,0,0);
    }


    .overlay-container:hover .bottom-overlay{
        opacity: 0.5;
    }

    .overlay-container:hover{
        background-color:rgba(0,0,0,.15);
        transition: .5s ease;
    }

    .overlay-container:hover .hover-overlay, .overlay-container:hover .hover-overlay-text{
        opacity: 1;
    }
    
</style>

@endsection
@section('scripts')
<!--
    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#profile_1'))
                .catch(error => {
                    console.error(error);
            });
            ClassicEditor
                .create(document.querySelector('#profile_2'))
                .catch(error => {
                    console.error(error);
            });
            ClassicEditor
                .create(document.querySelector('#profile_3'))
                .catch(error => {
                    console.error(error);
            });
        });
    </script>
-->
<script>
    //Define an adapter to upload the files
    class MyUploadAdapter {
       constructor(loader) {
          // The file loader instance to use during the upload. It sounds scary but do not
          // worry — the loader will be passed into the adapter later on in this guide.
          this.loader = loader;

          // URL where to send files.
          this.url = '{{ route('ckeditor.upload') }}';

          //
       }
       // Starts the upload process.
       upload() {
          return this.loader.file.then(
             (file) =>
                new Promise((resolve, reject) => {
                   this._initRequest();
                   this._initListeners(resolve, reject, file);
                   this._sendRequest(file);
                })
          );
       }
       // Aborts the upload process.
       abort() {
          if (this.xhr) {
             this.xhr.abort();
          }
       }
       // Initializes the XMLHttpRequest object using the URL passed to the constructor.
       _initRequest() {
          const xhr = (this.xhr = new XMLHttpRequest());
          // Note that your request may look different. It is up to you and your editor
          // integration to choose the right communication channel. This example uses
          // a POST request with JSON as a data structure but your configuration
          // could be different.
          // xhr.open('POST', this.url, true);
          xhr.open("POST", this.url, true);
          xhr.setRequestHeader("x-csrf-token", "{{ csrf_token() }}");
          xhr.responseType = "json";
       }
       // Initializes XMLHttpRequest listeners.
       _initListeners(resolve, reject, file) {
          const xhr = this.xhr;
          const loader = this.loader;
          const genericErrorText = `Couldn't upload file: ${file.name}.`;
          xhr.addEventListener("error", () => reject(genericErrorText));
          xhr.addEventListener("abort", () => reject());
          xhr.addEventListener("load", () => {
             const response = xhr.response;
             // This example assumes the XHR server's "response" object will come with
             // an "error" which has its own "message" that can be passed to reject()
             // in the upload promise.
             //
             // Your integration may handle upload errors in a different way so make sure
             // it is done properly. The reject() function must be called when the upload fails.
             if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
             }
             // If the upload is successful, resolve the upload promise with an object containing
             // at least the "default" URL, pointing to the image on the server.
             // This URL will be used to display the image in the content. Learn more in the
             // UploadAdapter#upload documentation.
             resolve({
                default: response.url,
             });
          });
          // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
          // properties which are used e.g. to display the upload progress bar in the editor
          // user interface.
          if (xhr.upload) {
             xhr.upload.addEventListener("progress", (evt) => {
                if (evt.lengthComputable) {
                   loader.uploadTotal = evt.total;
                   loader.uploaded = evt.loaded;
                }
             });
          }
       }
       // Prepares the data and sends the request.
       _sendRequest(file) {
          // Prepare the form data.
          const data = new FormData();
          data.append("upload", file);
          // Important note: This is the right place to implement security mechanisms
          // like authentication and CSRF protection. For instance, you can use
          // XMLHttpRequest.setRequestHeader() to set the request headers containing
          // the CSRF token generated earlier by your application.
          // Send the request.
          this.xhr.send(data);
       }
       // ...
    }

    function SimpleUploadAdapterPlugin(editor) {
       editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
          // Configure the URL to the upload script in your back-end here!
          return new MyUploadAdapter(loader);
       };
    }

    //Initialize the ckeditor
    ClassicEditor.create(document.querySelector("#profile_1"), {
       extraPlugins: [SimpleUploadAdapterPlugin],
    }).catch((error) => {
       console.error(error);
    });

</script>

@endsection