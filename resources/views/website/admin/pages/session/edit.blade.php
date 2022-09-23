@extends('website.layouts.default')
@section('content')
    <div class="container">
        <h2>Edit Session</h2>
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
        <form action="{{ URL::to('update-session/'.$session->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Session Name</label>
                <input type="text" name="name" value="{{$session->name}}" class="form-control" placeholder="Add Session">
            </div>
            <div class="form-group">
                <label for="">Is active?</label>
                <input type="checkbox" class="mt-1" id="is_active" name="is_active" {{ ( $session->is_active == '1' ?'checked' : '' )}} >
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
@stop
