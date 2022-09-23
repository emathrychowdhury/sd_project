<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">
        <div class="row flex justify-content-center m-auto">
            <div class="col-md-6 mt-5">
                <div class="signup-form">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error_msg'))
                        <div class="alert alert-danger">
                            {{ Session::get('error_msg') }}
                        </div>
                    @endif
                    <form action="{{ URL::to('/login-store') }}" method="post" class="mt-5">
                        {{ csrf_field() }}
                        <h2>Login</h2>

                        <div class="form-group">
                            <div class="row">

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="useremail" placeholder="User Email" required="required">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
