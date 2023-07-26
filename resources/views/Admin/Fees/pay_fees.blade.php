
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
    <title>Search Student</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <!-- Brand/logo (if you have one) -->
          <a class="navbar-brand" href="#">Student ID</a>
      
          <!-- Search Bar -->
          <div class="collapse navbar-collapse" id="navbarSearch">
            <form method="GET" action="{{ url('pay-fees') }}" class="d-flex ms-auto me-2 my-2 my-lg-0">
              <input class="form-control me-2" name="student_url" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
                 
      <table class="table">
       
        @if($results->count())
          @foreach($results as $result)
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Mobile Number</th>
              <th scope="col"> Fee Status</th>
              <th scope="col">Address</th>
              <th scope="col">Pay By</th>
            </tr>
          </thead>
          <tbody>
            <tr>
                  <td>{{ $result->id }}</td>
                  <td>{{ $result->name }}</td>
                  <td>{{ $result->email }}</td>
                  <td>{{ $result->mobile_number }}</td>
                  <td>{{ $result->status }}</td>
                 <td>{{ $result->address }}</td>
                 <td><a href="{{ url('checkout') }}" class="text-light"><button class="btn btn-danger ">Jazzcash</button></a>
                   <a href="{{ url('stripe') }}"> <button class="btn btn-primary">Stripe</button></a></td>
                 
                 
                </tr>
          @endforeach
          @else
          <tr>
            <td colspan="3" class="text-center">Result not found.</td>
          </tr>
       @endif
       
    
        </tbody>
      </table>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>