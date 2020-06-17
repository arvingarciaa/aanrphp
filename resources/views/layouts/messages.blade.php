@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif
@if(session('success'))
    <div class="alert alert-success" style="margin-top:5px">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session('success')}}</strong>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" style="margin-top:5px">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{session('error')}}</strong>
    </div>
@endif
