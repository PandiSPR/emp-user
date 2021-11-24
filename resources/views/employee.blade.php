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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>Employee Management System</title>

    
<style>
body {font-family: "Lato", sans-serif;}

.sidebar {
  height: 100%;
  width: 215px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #16d0d9;
  overflow-x: hidden;
  padding-top: 16px;
}

.sidebar a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 16px;
  color: #000000;
  display: block;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  padding: 0px 9px;
}

@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 16px;}
}
</style>
  </head>
  <body>
      
<div class="sidebar">
  <a href="{{ route('sign_in_post') }}"><b> Dashboard </b></a>
  <a href="{{ url('one-to-one/profile') }}"><b> One-to-One-Profile</b></a>
  <a href="{{ route('simcard') }}"><b> One-to-Many-Simcard</b></a>
  <a href="{{ route('degree') }}"><b> Many-to-Many-Degree</b></a>
  <a href="{{ route('role') }}"><b> Roles</b></a>
</div>

<div class="main">
 
<div class="container mt-3 mb-5">
  <h2>Employee Details</h2>
    <div class="text-right mb-5">
   
    <button type="submit" class="btn btn-success" onclick="location.href='{{ route('/add') }}'"> Add Employee Details </button>&nbsp;
 
    <button type="submit" class="btn btn-primary" onclick="location.href='{{ route('logout') }}'"> Logout </button>&nbsp;
 
         
    </div>  

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <div class="table-responsive">
  <table class="table">

  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Role</th>
      <th scope="col">Status</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->sex}}</td>
      <td>{{$user->role}}</td>
      <td>
      <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
      </td> 
      <td>

      <a class="btn btn-primary" href="{{ url('user/view', [$user->id]) }}">View</a>
       &nbsp
      <a class="btn btn-warning" href="{{ url('user/edit', [$user->id]) }}">Edit</a>
       &nbsp
      <a class="btn btn-danger" href="{{ url('user/delete', [$user->id]) }}">Delete</a>
        &nbsp
   
      <button type="submit" class="btn btn-info" onclick="location.href='{{ url('one-to-one/profile', [$user->id]) }}'"> One-To-One </button>&nbsp;
      
      <button type="submit" class="btn btn-info" onclick="location.href='{{ route('one-to-many') }}'"> One-To-Many </button>&nbsp;

      <button type="submit" class="btn btn-info" onclick="location.href='{{ route('manytomany') }}'"> Many-To-Many </button>&nbsp;

      </td>
    </tr>
    @endforeach 

    
    
  </tbody>
</table>
</div>
</div>

 </div>
    

</body>

<script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         console.log(status);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/userChangeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>

</html>
