@extends('website.layouts.default')
@section('content')
<div class="container">
        <h2>Pending Request</h2>
        <table class="table table-bordered">
            <thead>
                <th>Group Member</th>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($projects as $p)
                <tr>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->description }}</td>
                    <td>{{ $u->users->name }}</td>
                    <td>
                        <a href="{{ url('approve-request/'.$p->id) }}">Approve</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop