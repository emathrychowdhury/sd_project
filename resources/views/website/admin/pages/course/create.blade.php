@extends('website.layouts.default')
@section('content')
    <div class="container">
        <h2>Create Course</h2>
        <form action="{{ URL::to('store-course') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Course Title</label>
                <input type="text" class="form-control" name="title" id="">
            </div>
            <div class="form-group">
                <label for="">Course Code</label>
                <input type="text" class="form-control" name="code" id="">
            </div>
            <div class="form-group">
                <label for="">Course Type</label>
                <select name="type" class="form-control" id="">
                    <option value="">SELECT TYPE</option>
                    <option value="theory">Theory</option>
                    <option value="lab">Lab</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-info">ADD</button>
                <!-- <a href="{{ URL::to('courses') }}" class="btn btn-info text-decoration-none">ALL COURSES</a> -->
            </div>
        </form>
    </div>
@stop
