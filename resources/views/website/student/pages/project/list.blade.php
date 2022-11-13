@extends('website.layouts.default')
@section('content')
<div class="container">
    <h2>Project List</h2>
    @if (Session::has('msg'))
    <div class="alert alert-success" role="alert">
        <strong>{{ Session::get('msg') }}</strong>
    </div>
    @endif
    @if (Session::has('fail'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ Session::get('fail') }}</strong>
    </div>
    @endif
    <a href="{{ URL::to('create-project') }}" class="btn btn-info text-decoration-none float-right my-2">Create
        Project</a>

    <table class="table table-secondary table-striped">
        <thead>
            <th>ID</th>
            <th>Course Name</th>
            <th>Project Title</th>
            <th>Project Description</th>
            <th>Project Member</th>
            <th>Status</th>
            <th>Action</th>
            
        </thead>
        <tbody>
            @if ($projects)
            @foreach ($projects as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->courses->title }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->description }}</td>
                <td>{{ $p->users }}</td>
                <td>
                    {{ $p->is_approved == 1 ? 'Approved' : 'Pending' }}
                </td>
                <td>
                    <a href="{{ URL::to('edit-project/'. $p->id) }}"
                        class="btn btn-warning text-decoration-none btn-sm">Edit</a>
                    <a href="" class="btn btn-danger text-decoration-none btn-sm" data-toggle="modal"
                        data-target="#exampleModal{{ $p->id }}">Delete</a>
                    <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">Are you sure you want to delete <b>This Project</b>?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href="{{ URL::to('delete-project/' . $p->id) }}"
                                        class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">No data found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@stop
