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

        <form action="{{ route('insertprofile') }}" method="POST">
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
</body>

</html>
