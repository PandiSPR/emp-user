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
  <div class="form-group">
  <h2 class="text-center"> Employee Details</h2>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  <form action="{{ route('/update',[$user->id]) }}" method="post">
    @csrf
      <div class="col">  
  
    <input type="hidden" name="id"  class="form-control"  required="" value="{{$user->id}}">
    </div>
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="name" name="name" class="form-control" value="{{$user->name}}" minlength="3" required="">
    </div>
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="email" name="email" class="form-control" value="{{$user->email}}" required="">
    </div>
    <div class="mb-3 mt-3">
      <label for="gender">Gender</label>
        <div class="col">
        <label for="male">Male</label>
        <input type="radio" {{($user->sex=="Male")? "checked" :""}} name="sex" id="male" value="Male" required="" >
        <label for="female">Female</label>
        <input type="radio" name="sex" {{($user->sex=="Female")? "checked" :""}} id="female" value="Female" required="" >
        </div>  
    </div>
    <div class="mb-3 mt-3">
      <label for="gender">Role</label>
        <div class="col">
          <label for="admin">Admin</label>
        <input type="radio" {{($user->role=="Admin")? "checked" :""}} name="role" id="admin" value="Admin" required="" >
        <label for="user">User</label>
        <input type="radio" name="role" {{($user->role=="User")? "checked" :""}} id="user" value="User" required="" >
        </div>  
    </div>
    <div class="mb-3 mt-3">
    <label for="status">Status</label>
    <div class="col">
    <label for="active">Active</label>
    <input type="radio" name="status" {{($user->status=="1")? "checked" :""}}  id="status" value="1" >
    <label for="inactive">Inactive</label>
    <input type="radio" name="status" {{($user->status=="0")? "checked" :""}} id="status" value="0" >
    </div>     
    </div>
  </form>
</div>

</body>
</html>