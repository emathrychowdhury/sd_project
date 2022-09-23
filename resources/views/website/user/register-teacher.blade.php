<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row flex justify-content-center m-auto">
            <div class="col-md-6 mt-5">
                <div class="signup-form">
                    @if (Session::has('err_msg'))
                        <div class="alert alert-primary">
                            {{ Session::get('err_msg') }}
                        </div>
                    @endif
                    <form action="{{ URL::to('/register-store') }}" method="post">
                        {{ csrf_field() }}
                        <h2>Register</h2>
                        
                        <div class="form-group">
                            <div class="row">
                                <div class="col"><input type="text" class="form-control" name="username" placeholder="User Name"
                                        required="required">
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="useremail" placeholder="User Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conf_password" placeholder="Confirm Password" required="required">
                        </div>

                        <input type="text" value="teacher" name="role" hidden>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                        </div>
                    </form>
                    <div class="text-center">Already have an account? <a href="{{ URL::to('/login') }}">Sign in</a></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
