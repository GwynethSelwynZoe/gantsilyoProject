<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <h4>Login</h4>
                <hr>
                <form action="{{ route('login-user') }}" method="POST">
                    @csrf
                    @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(Session::has('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    <div class="form-group">
                        <label for="un">Username</label>
                        <input type="text" class="form-control" placeholder="Enter Username"
                        name="un" value="{{old('un')}}">
                        <span class="text-danger"> @error('un') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <label for="pw">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password"
                        name="pw" value="">
                        <span class="text-danger"> @error('pw') {{$message}} @enderror </span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-primary" type="submit">
                            Login
                        </button>
                    </div>
                    <br>
                    <a href="registration">New User? Click here to Register</a>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
