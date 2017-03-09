
@extends('master')
@section('content')

    <div class="form-group row add">
        <div class="well headerwell">
            <div class="row">
                <div class="col-md-12">
                    <h1>Manage Projects</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col col-md-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th>Project name</th>
                </tr>
    @foreach($projects as $project)
        <tr>
        <td value="{{ $project->name }}">{{ $project->name }}</td>
                <td>
                    <form  method="post" action="{{ action('ProjectsController@destroy', ['id' => $project->id]) }}">
                        {{ csrf_field() }}
                        <button type="submit" id="projectsButton" class="btn btn-success">Delete</button>
                    </form>
                </td>
        </tr>
                @endforeach
    </table>
        </div>
        </div>
    </div>
    <form  method="post" action="{{ action('ProjectsController@create') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="row">
                <div class="col col-md-12">
                    <input type="text" name="name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px;">
                    <div class="form-group">
                        <button type="submit" id="projectsButton" class="btn btn-success">Create new project</button>
                    </div>
                </div>
            </div>
    </form>
    </div>
@stop

@section('includes')
@stop