
@extends('master')
@section('content')

    <div class="form-group row add">
        <div class="well headerwell">
            <div class="row">
                <div class="col-md-12">
                    <h1>Manage Users</h1>
                </div>
            </div>
        </div>
    </div>
    <form  method="post">
        {{ csrf_field() }}
    <div class="form-group">
   <div class="row">
       @foreach($userData as $datakey => $datavalue)
           <div class="col-lg-12" style="margin-top: 10px!important;">
               <label for="{{ $datakey }}"> {{ $datakey }} </label>
               @if($datakey === "roles" || $datakey === "level")
                   <input name="{{ $datakey }}" type="{{ $datavalue }}" class="form-control" id="first_name" value="{{ $datavalue }}" readonly>
                    @else
                   <input name="{{ $datakey }}" type="{{ $datavalue }}" class="form-control" id="first_name" value="{{ $datavalue }}">
                   @endif
           </div>
       @endforeach

   </div>
        <div class="row">
            <div class="col-md-12" style="margin-top: 30px;">
        <div class="form-group">
            <button type="submit" id="profilebutton" class="btn btn-success">Update</button>
        </div>
            </div>
        </div>
    </form>
   </div>
@stop

@section('includes')
    {{--<script type="text/javascript" src="/js/profileAJAX.js"></script>--}}
@stop