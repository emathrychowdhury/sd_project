@extends('website.layouts.default')
@section('content')
    <div class="container">
        <h2>Teachers</h2>
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
        <a href="{{ URL::to('create-assign-teacher') }}" class="btn btn-info text-decoration-none float-right my-2">Assign Teacher</a>

        <table class="table table-secondary table-striped">
            <thead>
                <th>ID</th>
                <th>Session</th>
                <th>Course</th>
                <th>Section</th>
                <th>Teacher</th>
                <th>Action</th>
            </thead>
            <tbody>
                @if ($assignTeachers)
                    @foreach ($assignTeachers as $a)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $a->sessions->name }}</td>
                            <td>{{ $a->courses->title }}</td>
                            <td>{{ $a->section }}</td>
                            <td>{{ $a->users->name }}</td>
                            <td>
                                <a href="{{ URL::to('edit-assign-teacher/'. $a->id) }}" class="btn btn-warning text-decoration-none btn-sm">Edit</a>
                                <a href="" class="btn btn-danger text-decoration-none btn-sm" data-toggle="modal"
                                    data-target="#exampleModal{{ $a->id }}">Delete</a>
                                <div class="modal fade" id="exampleModal{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete <b>{{ $a->users->name }}</b>?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ URL::to('delete-assign-teacher/' . $a->id) }}" class="btn btn-danger">Delete</a>
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
