@extends('website.layouts.default')
@section('content')
<div class="container">
        <h3>Create Project</h3>
        <form method="post" action="{{ url('store-project') }}">
        {{ csrf_field() }}
        @if(Session::has('success'))
		<div class="alert alert-success">
  		<strong>{{ Session::get('success')}}</strong> 
		</div>
		@endif
            <div class="form-group">
                <label for="">Course <Title></Title></label>
                <select name="course_id" class="form-control" id="">
                    <option hidden>Select Course</option>
                    @foreach ($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->title }}</option>
                    @endforeach
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="">Course Code</label>
                <select name="course_code" class="form-control" id="">
                    <option hidden>Select Course</option>
                    @foreach ($courses as $c)
                        <option value="{{ $c->id }}">{{ $c->code }}</option>
                    @endforeach
                </select>
            </div> -->
            <div class="form-group  my-3">
                <label class="mb-2" for="">Project Title</label>
                <input type="text" name="title" class="form-control" id="">
            </div>
            <div class="form-group my-3">
                <label class="mb-2" for="">Project Description</label>
                <textarea class="form-control" name="description" id="" rows="3"></textarea>
            </div>
            <div class="add-area text-end my-2">
                <a href="javaScript:void(0)" class="btn btn-success btn-sm addRow">Add Student</a>
            </div>
            <div>
                <label for="">Project Members</label>
            </div>
        
            <div class="clone row my-3" style="margin-right:-20px;">
                <div class="col-sm-6 m-0 mb-2 d-flex">
                    <select name="members[]" class="form-control" required>
                        <option hidden value="">Select Student</option>
                        @foreach($users as $user)
                        <option value="{{$user->studentid}}">{{$user->studentid}}</option>
                        @endforeach
                    </select>                 
                    <a href="javaScript:void(0)" class="btn btn-danger btn-sm deleteRow mx-2">X</a>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
    $('.add-area').on('click','.addRow',function(){
        var newStudent = 
            "<div class='col-sm-6 m-0 mb-2 d-flex'>"+
                "<select name='members[]' class='form-control'>"+
                    "<option hidden>Select Student</option>"+
                    "@foreach($users as $user)"+
                    "<option value='{{$user->studentid}}'>{{$user->studentid}}</option>"+
                    "@endforeach"+
                "</select>"+
                "<a href='javaScript:void(0)' class='btn btn-danger btn-sm deleteRow mx-2'>X</a>"+
            "</div>"
        $('.clone').append(newStudent);
    });
    $('.clone').on('click','.deleteRow', function(){
        $(this).parent().remove();
    });
</script>
@stop