@extends('Admin.Layouts.layouts')
@section('content')

<div class="row mb-4">
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
                                <li><a href="#">Edit Student</a></li>
                                
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-lg-12">
    <div class="card ">
        <div class="card-header "><strong>Edit  Student</strong></div>
        <div class="card-body card-block">
            <form action="{{ url('update-student/'.$students->id) }}" method="POST"  >
                @csrf
            <div class="row form-group">
                <div class="col-6">
                    <div>
                        <label  class=" form-control-label">Student Name</label><input type="text" id="name"  placeholder="Enter name" name="name" class="form-control" value="{{ $students->name }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group"><label for="Email" class=" form-control-label">Email</label><input type="email" name="email" id="Email" placeholder="Enter your Email" class="form-control" value="{{ $students->email }}"></div>
                </div>
                <div class="col-6">
                    <div class="form-group"><label for="mobile_number" class=" form-control-label">Mobile Number</label><input type="number" id="mobile_number" name="mobile_number" placeholder="Enter mobile number" class="form-control" value="{{ $students->mobile_number }}"></div>
                </div>
                <div class="col-6 mb-3">
                    <label >Status</label> <select name="status" class="form-select form-control" aria-label="Default select example" value="{{ $students->status }}">
                        
                        <option value="paid">Paid</option>
                        <option value="pending">Pending</option>
                        
                    </select>
                </div> 
                <div class="col-6">
                    <div class="form-group"><label for="address" class=" form-control-label">Address</label><input type="text" id="address" name="address" placeholder="Enter father name" class="form-control" value="{{ $students->address }}"></div>
                </div>
                {{--  <div class="col-6">
                    <div class="form-group"><label for="city" class=" form-control-label">City</label><input type="text" id="city" placeholder="Enter your city" class="form-control"></div>
                </div>  --}}
                {{--  <div class="col-6">
                   <label >Paid By</label> <select class="form-select form-control" aria-label="Default select example">
                      
                        <option value="Jazz_cash">Jazz Cash</option>
                        <option value="Stripe">Stripe</option>
                       
                      </select>
                </div>   --}}
               
                 {{--  <div class="col-6 ">
                    <div class="form-group"><label for="fee_month" class=" form-control-label">Fees Month</label><input type="date" id="fee_month" class="form-control"></div>
                </div>  --}}
                <div class="col-12 ">
                    <div  >
                        <button class="col-1 btn btn-primary " type="submit">Update</button>
                    </div>
                </div>
                
            </div>
        </form>
        </div>
    </div>
</div>
@endsection