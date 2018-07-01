@if(count($errors)>0)
<div class="row">
    <div style="border: 1px solid red; background-color: #f9b5af; color:red;" class="col-md-8 col-md-offset-2">
        <ul style="text-align: left; margin-left: 0%;">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif @if(Session::has('message'))
<div class="row">
    <div style="text-align:center; border: 1px solid green; background-color: #d1f9da; color:green;" class="col-md-8 col-md-offset-2 success ">
        {{Session::get('message')}}
    </div>
</div>
@endif