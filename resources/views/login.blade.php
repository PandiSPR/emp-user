<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
   
    <title>Employee Management System</title>
  </head>
  <body>
   
<div style="background-image: url('bg-1.jpg');">

<div class="container mt-3 mb-5">
  <h2 class="text-center">Employee Management System Login Form</h2>

  <div class="row">
    <div class="col p-3"></div>
    <div class="col p-3">

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
      
  <form action="{{ route('sign_in_post') }}" method="post">
    @csrf
    
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control @error('password') is-invalid @enderror" id="email" placeholder="Enter email" name="email" required="">
    </div>
    @error('email')
    <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="mb-3 mt-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Enter Password" name="password">
    </div>
    @error('password')
    <span class="invalid-feedback d-block" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="col"><br>
          <button type="submit" class="btn btn-info">Login</button>

          <button type='submit' class=" btn btn-success text-right ml-5"
          onclick="location.href='{{ route('registration') }}'">Registration</button>
    </div>

  </form>
</div>
    <div class="col p-3"></div>
  </div>
</div>
</div>
</body>
</html>
