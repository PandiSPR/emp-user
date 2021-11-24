<!DOCTYPE html>
<html lang="en">
<head>
  <title>Employee Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2 class="text-center">Add Employee Details</h2>
  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <form action="{{ route('/addemployee') }}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" required="">
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
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="">
    </div>
    <div class="mb-3 mt-3">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required="" minlength="8">
    </div>
    <div class="col mb-3 mt-3">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Enter your password_confirmation" class="form-control" required="" minlength="8">
    </div>
    <div class="mb-3 mt-3">
        <label for="gender">Gender</label>
        <div class="col">
        <label for="male">Male</label>
        <input type="radio" name="sex" id="male" value="Male" required="" >
        <label for="female">Female</label>
        <input type="radio" name="sex" id="female" value="Female" required="" required="">
        </div>    
    </div>

    
    <button type="submit" class="btn btn-primary">Save</button>
  </form>
</div>

</body>
</html>
