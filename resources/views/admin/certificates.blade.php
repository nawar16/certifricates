@extends('admin.index')
  
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
     


    

          <div class="container">

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#AddCertificate">
  Add Certificate
</button>
@if(Session::has('error'))
<p class="alert alert-danger">{{ Session('error') }}</p>
@endif
@if(Session::has('success'))
<p class="alert alert-info">{{ Session('success') }}</p>
@endif
<table class="table data-table">

    <thead>

        <tr>

            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
          
            <th>Type</th>
            <th width="100px">Action</th>

        </tr>

    </thead>

    <tbody>

    </tbody>

</table>

</div>








          </div>
   
          
        </div>
      </div>


<div class="modal" id="AddCertificate" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Certificate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="{{route('certificates.store')}}">
        @csrf
      <div class="form-group">
    <label for="exampleInputEmail1">First name</label>
    <input name="fname" type="text" class="form-control" id="exampleInputName1"  placeholder="Enter First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Last name</label>
    <input name="lname" type="text" class="form-control" id="exampleInputName2"  placeholder="Enter Last Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1"  placeholder="Enter Email Address">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Degree</label>
    <input name="degree" type="text" class="form-control" id="exampleInputDegree"  placeholder="Enter Degree">
  </div>
  <div class="form-group">
    <label for="exampleInputSource">Source</label>
    <input name="source" type="text" class="form-control" id="exampleInputSource"  placeholder="Enter Source">
  </div>

  <div class="form-check form-check-radio">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="type" id="type1" value="Honorary" checked>
        Honorary
        <span class="circle">
            <span class="check"></span>
        </span>
    </label>
</div>
<div class="form-check form-check-radio">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="type" id="type2" value="Professional" >
        Professional
        <span class="circle">
            <span class="check"></span>
        </span>
    </label>
</div>


  <button type="submit" class="btn btn-success">Save</button>
</form>
      </div>
    
    </div>
  </div>
</div>



<script type="text/javascript">

$(function () {



var table = $('.data-table').DataTable({

    processing: true,

    serverSide: true,

    ajax: "{{ route('certificates.index') }}",

    columns: [

        {data: 'id', name: 'id'},

        {data: 'fname', name: 'fname'},
        {data: 'lname', name: 'lname'},

       
        {data: 'type', name: 'type'},
        {data: 'action', name: 'action', orderable: false, searchable: false},

    ]

});



});

</script>
     
@endsection