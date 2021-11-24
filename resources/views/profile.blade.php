<!DOCTYPE html>
<html>

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
    <div class="container">
        <br>
        <h2 class="text-center"> Profile</h2>
          
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form action="{{ route('insertprofile',[$user->id]) }}" method="POST">
        @csrf
            <div class="form-group">
                <div class="col-6">
                    <label for="address">Address:</label>
                    <input type='text' class="form-control" name='address'
                        placeholder="Enter Your Address">
                </div>
            </div>
            <input type='submit' class="btn btn-success text-center" value="Submit">
    </div>
    </form>



    <div class="container mt-3 mb-5">
  <h2>Users Details</h2>
    
    <div class="table-responsive">
  <table class="table">


  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>{{$user->profile->address}}</td>
      <td>
      <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
      </td> 
      
    </tr> 
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
            {{ Auth::User()->id }}
        </div>
        @endif
    
  </tbody>
</table>
</div>
</div>
</body>

</html>
