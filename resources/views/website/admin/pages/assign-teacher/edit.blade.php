@extends('website.layouts.default')
@section('content')

    <div class="container">
        <h2>Edit Assigned Course To Teacher</h2>
        @if(Session::has('msg'))
        <div class="alert alert-success" role="alert">
            <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
        <form action="{{URL::to('update-assign-teacher/'.$assign_teachers->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Session</label>
                <select name="session_id" class="form-control" id="">
                    <option hidden>Select Session</option>
                    @foreach ($sessions as $s)
                        <option value="{{ $s->id }}" {{$assign_teachers->session_id == $s->id ? 'selected' : ''}}>{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Course</label>
                <select name="course_id" class="form-control" id="">
                    <option hidden>Select Course</option>
                    @foreach ($courses as $c)
                        <option value="{{ $c->id }}" {{$assign_teachers->course_id == $c->id ? 'selected' : ''}}>{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Section</label>
                <select name="section" class="form-control">
                    <option hidden>Select Section</option>
                    <option value="A1" {{$assign_teachers->section=='A1'?'selected':''}} >A1</option>
                    <option value="A2" {{$assign_teachers->section=='A2'?'selected':''}}>A2</option>
                    <option value="B1" {{$assign_teachers->section=='B1'?'selected':''}}>B1</option>
                    <option value="B2" {{$assign_teachers->section=='B2'?'selected':''}}>B2</option>
                    <option value="C1" {{$assign_teachers->section=='C1'?'selected':''}}>C1</option>
                    <option value="C2" {{$assign_teachers->section=='C2'?'selected':''}}>C2</option>
                    <option value="A" {{$assign_teachers->section=='A'?'selected':''}}>A</option>
                    <option value="B" {{$assign_teachers->section=='B'?'selected':''}}>B</option>
                    <option value="C" {{$assign_teachers->section=='C'?'selected':''}}>C</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Teacher</label>
                <select name="user_id" class="form-control" >
                    <option hidden>Select Teacher</option>
                    @foreach ($users as $u)
                        <option value="{{ $u->id }}"{{$assign_teachers->user_id == $u->id ? 'selected' : ''}}>{{ $u->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-info">Update</button>
                
            </div>
        </form>
    </div>
@stop
