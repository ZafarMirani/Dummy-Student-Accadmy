<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Document</title>
 
</head>
<body style="background-color:#f4f5f7">

    @extends('Admin.Layouts.layouts')
@section('content')

<div class="breadcrumbs">
    <div class="breadcrumbs-inner" >
        <div class="row m-0" >
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Students</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Admin</a></li>
                            <li><a href="#">Students</a></li>
                            <li><a href="{{ url('add-student') }}"><button class="btn btn-primary menu-icon fa fa-plus">Create</button></a></li>
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Students List</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            @if(Session::has("Added"))
                            <p class=" alert alert-warning" >{{ Session::get("Added") }}</p>
                              
                            @endif
                            @if(Session::has("Deleted"))
                            <p class=" alert alert-warning" >{{ Session::get("Deleted") }}</p>
                              
                            @endif
                            @if(Session::has("Updated"))
                            <p class=" alert alert-warning" >{{ Session::get("Updated") }}</p>
                              
                            @endif
                            @if(Session::has("Email"))
                            <p class=" alert alert-warning" >{{ Session::get("Email") }}</p>
                              
                            @endif
                            @if(Session::has("SMS"))
                            <p class=" alert alert-warning" >{{ Session::get("SMS") }}</p>
                              
                            @endif
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($students))
                                @foreach ($students as $key=>$student )
                
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td> <a class="text-dark" href="#" data-toggle="modal" data-target="#exampleModal">{{ $student->email }}</a></td>
                                     <td> <a  class="text-dark" href="#" data-toggle="modal" data-target="#exampleModal2">{{ $student->mobile_number }}</a></td>
                                    <td>{{ $student->status }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>
                                       <a href="/edit-student/{{ $student->id }}"> <button class="btn btn-primary btn-sm"><i class="fa fa-eye text-white mr-1"></i></a>
                                        <a href="/delete/{{ $student->id }}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @endif


     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Mail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                  </div>
                     <div class="modal-body">
                <form action="{{ route('send-email') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control"  name="email_body" id="email-body" ></textarea>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send mail</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Twilo SMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('sendSMS') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control"  name="message" id="message-body" ></textarea>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send message</button>
            </div>
        </form>
       
      </div>
      {{--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>  --}}
    </div>
  </div>
</div>
      
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
  } );
</script>


@endsection
    
</body>
</html>