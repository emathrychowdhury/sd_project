@extends('website.layouts.default')
@section('content')
    <div class="container">
        <h2>Create Session</h2>
        <form action="{{ URL::to('store-session') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Session Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Add Session">
            </div>
            <div class="form-group">
                <label for="">Is active?</label>
                <input type="checkbox" class="mt-1" id="is_active" value="1" name="is_active">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
@stop
