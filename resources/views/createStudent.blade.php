<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Form Validation With Error Messages - LaravelTuts.com</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 mt-5">
            <h3>Form Validation With Error Messages</h3>

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif

            <form method="post" action="{{ route('student.store') }}" class="mt-4">

                {{ csrf_field() }}

                <div class="form-group mb-3">
                    <label>Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label>E-Mail:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                    <label>Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <button class="btn btn-success btn-submit btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
