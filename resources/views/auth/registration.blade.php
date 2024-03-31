<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Registration</h4>
                <hr>
                <form action="{{ route('register-user') }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" value="">
                        <span class="text-danger">@error('fname') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for=lname">Last Name</label>
                        <input type="text" class="form-control" placeholder="Enter Last Name"
                        name="lname" value="">
                        <span class="text-danger"> @error('lname') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="un">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username"
                        name="un" value="">
                        <span class="text-danger"> @error('un') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="pw">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                        name="pw" value="">
                        <span class="text-danger"> @error('pw') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="contactno">Contact Number</label>
                        <input type="text" class="form-control" placeholder="Enter Contact Number"
                        name="contactno" value="">
                        <span class="text-danger"> @error('contactno') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" placeholder="Enter Address"
                        name="address" value="">
                        <span class="text-danger"> @error('address') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" placeholder="Enter Email"
                        name="email" value="">
                        <span class="text-danger"> @error('email') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="img">Photos</label>
                        <input type="file" class="form-control" name="img">
                        <span class="text-danger">@error('img') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">Register</button>
                    </div>
                    <br>
                    <a href="login">Already have an Account? Click here to Login</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>