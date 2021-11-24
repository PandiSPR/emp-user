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
        <h2 class="text-center"> Simcard </h2>
        @if($errors->any())
        @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
        @endforeach
        @endif
        <form action="{{ route('insertSimcard') }}" method="POST">
        @csrf

            <div class="form-group">
                <div class="col-6">
                    <label for="number">Number:</label>
                    <input type='text' class="form-control" name='number'
                        placeholder="Enter Your Number">
                </div>
            </div>
            <input type='submit' class="btn btn-success text-center" value="Submit">
    </div>
    </form>
</body>

</html>
