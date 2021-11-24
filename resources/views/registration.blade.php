<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration For Employee Details</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.validate.min.js')}}"></script>
</head>
<body>
<div class="container mt-3 mb-5">
  <h2 class="text-center">Employee Management System Registration Form</h2>

  <div class="row">
    <div class="col p-3"></div>
    <div class="col p-3">
        <div class="form-group">
        <form action="{{Route('/login')}}" method="POST">
            @csrf
                <div class="col mb-3 mt-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="enter your name" class="form-control" required="" minlength="3">
                </div>
                <div class="form-group">
                    <div class="col-6">
                        <label for="role">Role:</label>
                        <label for="admin">Admin</label>
                        <input type="radio" name="role" value="Admin">
                        <label for="user">User</label>
                        <input type="radio" name="role" value="User">
                    </div>
                </div>
                <div class="col mb-3 mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="enter your name" class="form-control" required="" >
                </div>
                <div class="col mb-3 mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="enter your password" class="form-control" required="" minlength="8">
                </div>
                <div class="col mb-3 mt-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="enter your password_confirmation" class="form-control" required="" minlength="8">
                </div>
                <div class="col mb-3 mt-3">
                    <label for="gender">Gender</label>
                    <div class="col">
                    <label for="male">Male</label>
                    <input type="radio" name="sex" id="male" value="Male" required="" >
                    <label for="female">Female</label>
                    <input type="radio" name="sex" id="female" value="Female" required="" required="">
                    </div>    
                </div>
                <div class="col mb-3 mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                         @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                    </div>
                 @endif
            </form>
        </div>
            
</div>
    <div class="col p-3"></div>
  </div>
    </div>
</body>
</html>