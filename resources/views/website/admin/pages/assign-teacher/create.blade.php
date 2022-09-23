@extends('website.layouts.default')
@section('content')

    <div class="container">
        <h2>Assign Course To Teacher</h2>
        <form action="{{ URL::to('store-assign-teacher') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Session</label>
                <select name="session_id" class="form-control" id="">
                    <option hidden>Select Session</option>
                    @foreach ($sessions as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Course</label>
                <select name="course_id" class="form-control" id="">
                    <option hidden>Select Course</option>
                    @foreach ($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Section</label>
                <select name="section" class="form-control" id="">
                    <option hidden>Select Section</option>
                    <option value="A1">A1</option>
                    <option value="A2">A2</option>
                    <option value="B1">B1</option>
                    <option value="B2">B2</option>
                    <option value="C1">C1</option>
                    <option value="C2">C2</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Teacher</label>
                <select name="user_id" class="form-control" id="">
                    <option hidden>Select Teacher</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-info">ADD</button>
                <!-- <a href="{{ URL::to('teachers') }}" class="btn btn-info text-decoration-none">All Teacher</a> -->
            </div>
        </form>
    </div>
@stop
