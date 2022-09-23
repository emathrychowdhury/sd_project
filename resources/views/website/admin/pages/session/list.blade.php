@extends('website.layouts.default')
@section('content')

    <div class="container">
        <h2>Sessions</h2>
        @if (Session::has('msg'))
            <div class="alert alert-success" role="alert">
                <strong>{{ Session::get('msg') }}</strong>
            </div>
        @endif
        <a href="{{ URL::to('create-session') }}" class="btn btn-info text-decoration-none float-right my-2">Create Session</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Session</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($sessions)
                    @foreach ($sessions as $s)
                        <tr>
                            <td>{{ $s->name }}</td>
                            <td>{{ $s->is_active == '1' ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ URL::to('edit-session/' . $s->id) }}" class="btn btn-warning text-decoration-none btn-sm">Edit</a>
                                <a href="{{ URL::to('delete-session/' . $s->id) }}" class="btn btn-danger text-decoration-none btn-sm" data-toggle="modal"
                                    data-target="#exampleModal{{ $s->id }}">Delete</a>
                                <div class="modal fade" id="exampleModal{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Are you sure you want to delete <b>{{ $s->name }}</b>?</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="{{ URL::to('delete-session/' . $s->id) }}" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

@stop
