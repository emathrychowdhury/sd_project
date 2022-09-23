@extends('website.layouts.default')
@section('content')
    <div class="container">
        <h2>Edit Course</h2>
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
        <form action="{{ URL::to('update-course/'.$courses->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Course Title</label>
                <input type="text" class="form-control" name="title" value="{{$courses->title}}">
            </div>
            <div class="form-group">
                <label for="">Course Code</label>
                <input type="text" class="form-control" name="code" value="{{$courses->code }}">
            </div>
            <div class="form-group">
                <label for="">Course Type</label>
                <select name="type" class="form-control" value="{{$courses->type}}">
                    <option value="">SELECT TYPE</option>
                    <option value="theory" {{$courses->type=='theory'?'selected':''}} >Theory</option>
                    <option value="lab" {{$courses->type=='lab'?'selected':''}}>Lab</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-info">Update</button>
                <!-- <a href="{{ URL::to('courses') }}" class="btn btn-info text-decoration-none">ALL COURSES</a> -->
            </div>
        </form>
    </div>
@stop
