@extends('website.layouts.default')
@section('content')
<div class="container">
    <h2>Projects</h2>
    @if(Session::has('success'))
    <div class="alert alert-success">
        <strong>{{ Session::get('success')}}</strong>
    </div>
    @endif
    @if(Session::has('fail'))
    <div class="alert alert-danger">
        <strong>{{ Session::get('fail')}}</strong>
    </div>
    @endif
    <table class="table table-striped">
        <thead>
            <th>Group Member</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($projects as $p)
            <tr>
                <td>{{ $p->users }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->description }}</td>
                <td>
                    @if($p->is_approved == 0)
                    <a class="btn btn-success" href="{{ url('approve-project/'.$p->id) }}">Approve</a>
                    <a class="btn btn-danger" href="{{ url('reject-project/'.$p->id) }}">Reject</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop