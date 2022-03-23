@extends('layouts.app')

@section('content')
<div class="container pb-5">
    @include('layouts.messages')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow" style="background-color:rgb(241,241,241)">
                <div class="card-body py-5 mx-5" style="padding-left:10rem; padding-right:10rem">
                    <h2 class="text-center mb-4">Sign up for KM4AANR</h2>
                    <div class="dropdown-divider-2 mb-3" style="border-top:2px solid #dedede !important"></div>  
                    
                    <form method="POST" action="{{ route('createUser') }}">
                        @csrf
                        <div class="form-group" style="margin-bottom:0.2rem">
                            <label for="name" class="col-form-label font-weight-bold required">{{ __('Full Name') }}</label>
                            <div class="row">
                                <div class="col-md-7 pr-0">
                                    <input style="color:black" id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="ml-1"><label for="first_name" class="col-form-label text-muted">{{ __('First Name') }}</label></small>
                                </div>
                                <div class="col-md-5">
                                    {{Form::text('last_name', '', ['class' => 'form-control', 'required', 'style' => 'color:black'])}}
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small class="ml-1"><label for="last_name" class="col-form-label text-muted">{{ __('Last Name') }}</label></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label font-weight-bold required">{{ __('E-Mail Address') }}</label>
                            <input style="color:black" id="email" type="email" placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ request()->email ? request()->email : ''}}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{Form::label('gender', 'Gender', ['class' => 'col-form-label font-weight-bold'])}}
                            <br>
                            {{ Form::radio('gender', 'male' , false) }} Male
                            {{ Form::radio('gender', 'female' , false, ['class' => 'ml-3']) }} Female
                        </div>
                        <div class="form-group">
                            {{Form::label('age_range', 'Age Range', ['class' => 'col-form-label'])}}
                            {{Form::select('age_range', ['1' => '15-18', 
                                                        '2' => '19-22', 
                                                        '3' => '23-30', 
                                                        '4' => '31-40', 
                                                        '5' => '41-50', 
                                                        '6' => '51-60', 
                                                        '7' => '61 Onwards', 
                                                        ], '',['class' => 'form-control', 'style' => 'color:black', 'placeholder' => '------------']) }}
                        </div>
                        <div class="form-group">
                            {{Form::label('organization', 'Organization', ['class' => 'col-form-label font-weight-bold'])}}
                            <select class="form-control" data-live-search="true" name="select_org" id="select_org">
                                <option disabled selected>Select Organization</option>
                                @foreach(App\Consortia::all() as $consortium)
                                    <option value="{{$consortium->short_name}}">{{$consortium->short_name}}</option>
                                @endforeach
                                <option value='other'>Other</option>
                            </select>
                            <div class="form-group consortia-input" >
                                {{Form::label('others_org', 'If Other, please specify', ['class' => 'col-form-label'])}}
                                {{Form::text('others_org','', ['class' => 'form-control', 'style' => 'color:black'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::label('contact_number', 'Contact Number', ['class' => 'col-form-label font-weight-bold'])}}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">+63</span>
                                </div>
                                {{ Form::text('contact_number', '',['class' => 'form-control', 'style' => 'color:black']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label font-weight-bold required">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label font-weight-bold required">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        
                        <script>
                            $(document).ready(function() {
                                $("#select_org").change(function(){
                                    $(this).find("option:selected").each(function(){
                                        if($(this).attr("value")=="other"){
                                            $(".ask-consortia-admin").hide();
                                            $(".consortia-input").show();
                                        }
                                        else{
                                            $(".ask-consortia-admin").show();
                                            $(".consortia-input").hide();
                                        }
                                    });
                                }).change();
                            });
                        </script>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .required:after {
      content:" *";
      color: red;
    }
  </style>