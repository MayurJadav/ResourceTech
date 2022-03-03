<!DOCTYPE html>
<title>Admin Panel | Add User</title>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">

<style type="text/css">
  #dvPreview
  {
      display: none;
      margin-bottom:15px;
      height: 100px;
      width: 100px;
  }
  .dz-error-message {
    display: none!important ;
  }
  .dz-error-mark {
    display: none!important ;
  }
  .alert-message {
  color: red;
}
  </style>

@include('adminpanel.layouts.header-script')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('adminpanel.layouts.header')

    @include('adminpanel.layouts.sidebar')

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../../index">Home</a></li>
                <li class="breadcrumb-item active">Update User</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Update User</h3>
                </div>

                <form method="POST" action="../user-update/{{$edituser->id}}" id="quickForm" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">First Name</label>
                          <input type="first_name" name="first_name" id="exampleInputEmail1" class="form-control" placeholder="Enter First Name" value="{{$edituser->first_name}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Last Name</label>
                          <input type="last_name" name="last_name" id="exampleInputEmail1" class="form-control" placeholder="Enter Last Name" value="{{$edituser->last_name}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Phone</label>
                          <input type="number" name="phone" id="exampleInputEmail1" class="form-control" placeholder="Enter Phone" value="{{$edituser->phone}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="email" id="exampleInputEmail1" class="form-control" placeholder="Enter Email" value="{{$edituser->email}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Branch Name</label>
                          <input type="branch_name" name="branch_name" id="exampleInputEmail1" class="form-control" placeholder="Enter Last Name" value="{{$edituser->branch_name}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Monthly Pay Grade</label>
                          <input type="monthly_pay_grade" name="monthly_pay_grade" id="exampleInputEmail1" class="form-control" placeholder="Enter Monthly Pay Grade" value="{{$edituser->monthly_pay_grade}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <h6 style="margin-bottom: 15px;"><b>Gender</b></h6>
                          <div class="custom-control custom-radio" style="display: inline">
                            <input class="custom-control-input" type="radio" id="male" value="male" name="gender" {{ $edituser->gender == 'male' ? 'checked' : '' }}>
                            <label for="male" class="custom-control-label">Male</label>
                          </div>
                          <div class="custom-control custom-radio ml-1" style="display: inline">
                            <input class="custom-control-input" type="radio" id="female" name="gender" value="female" {{ $edituser->gender == 'female' ? 'checked' : '' }}>
                            <label for="female" class="custom-control-label">Female</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Emergency Contact</label>
                          <input type="number" name="emergency_contact" id="exampleInputEmail1" class="form-control" placeholder="Enter Emergency Contact" value="{{$edituser->emergency_contact}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <h6 style="margin-bottom: 15px;"><b>Marital Status</b></h6>
                          <div class="custom-control custom-radio" style="display: inline">
                            <input class="custom-control-input" type="radio" id="married" value="married" name="marital_status" {{ $edituser->marital_status == 'married' ? 'checked' : '' }}/>
                            <label for="married" class="custom-control-label">Married</label>
                          </div>
                          <div class="custom-control custom-radio ml-1" style="display: inline">
                            <input class="custom-control-input" type="radio" id="unmarried" name="marital_status" value="unmarried" {{ $edituser->marital_status == 'unmarried' ? 'checked' : '' }}/>
                            <label for="unmarried" class="custom-control-label">UnMarried</label>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Date Of Birth</label>
                          <input type="date" name="date_of_birth" id="exampleInputEmail1" class="form-control" placeholder="Enter Date Of Birth" value="{{$edituser->date_of_birth}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="date_of_joining">Date Of Joining</label>
                          <input type="date" name="date_of_joining" id="date_of_joining" class="form-control" placeholder="Enter Date Of Birth" value="{{$edituser->date_of_joining}}"/>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="date_of_leaving">Date Of Leaving</label>
                          <input type="date" name="date_of_leaving" id="date_of_leaving" class="form-control" placeholder="Enter Date Of Birth" value="{{$edituser->date_of_leaving}}"/>
                        </div>
                      </div>
                      
                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="photo">Photo</label>
                          <div id="dvPreview">
                          </div>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" value="{{ $edituser->photo }}" name="photo" id="photo">
                              <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
  

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Role</label>
                          <select name="role" class="form-control">
                            <option>Select Role</option>
                            @foreach ($editrole as $editroles)
                            <option value="{{$editroles->id}}" {{$editroles->id == $edituser->role_id ? 'selected' : ''}}>
                              {{$editroles['role_name']}}
                            </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Status</label><br>
                          <input type="checkbox" name="status" value="1" data-toggle="toggle" data-size="small" {{ $edituser->status ? 'checked' : '' }}/>
                        </div>
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                        <label for="professional_experience">Educational Qualification Documents</label>
                        <div class="dropzone" id="file-dropzone1"></div>
                        </div>
                     </div>
  
                     <div class="col-sm-12">
                      <div class="form-group">
                      <label for="professional_experience">Professional Qualification Documents</label>
                      <div class="dropzone" id="file-dropzone2"></div>
                      </div>
                   </div>
  
                      <div class="col-sm-12">
                          <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address" placeholder="Enter Address...">{{ $edituser->address }}</textarea>
                          </div>
                      </div>
  
                      

                      <div class="col-sm-6">
                        <label for="exampleInputEmail1">*Old Educational Qualification Documents</label>
                        @if (!empty($edudoc))
                      <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <th>Name</th>
                            <th>Delete</th>  
                          </thead> 
  
                          <tbody>
                            @foreach ($edudoc as $doc)
                            <tr>
                            <td>{{ $doc->documents }}</td>
                            <td><a href="{{ url('update-documents/'.$doc->id)}}" style="display: inline" class="btn btn-danger btn-xs mr-10"><i style="display: inline" class="fa fa-trash"></i></a></td>
                          </tr>
                            @endforeach                     
                          </tbody>  
                        </table>
                        </div>
                        @else
                        <br>
                        <h3 style="color: red;">No Any File Exist</h3>
                        @endif  
                      </div>
  
                      <div class="col-sm-6">
                        <label for="exampleInputEmail1">*Old Professional Qualification</label>
                          @if (!empty($prodoc))
                          <div class="table-responsive">
                            <table class="table table-bordered">
                              <thead>
                                <th>Name</th>
                                <th>Delete</th>  
                              </thead> 
      
                              <tbody>
                                @foreach ($prodoc as $doc)
                                <tr>
                                <td>{{ $doc->documents }}</td>
                                <td><a href="{{ url('update-documents/'.$doc->id)}}" style="display: inline" class="btn btn-danger btn-xs mr-10"><i style="display: inline" class="fa fa-trash"></i></a></td>
                              </tr>
                                @endforeach                     
                              </tbody>  
                            </table>
                            </div>
                            @else
                            <br>
                            <h3 style="color: red;">No Any File Exist</h3>
                            @endif  
                          </div>
  
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a href="../user-view" class="btn btn-info">View</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @include('adminpanel.layouts.footer')
  </div>
  @include('adminpanel.layouts.footer-script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
  </script>
  <script>
    Dropzone.options.fileDropzone1 = {
      url: '{{ route('edufile.store') }}',
      acceptedFiles: ".doc,.pdf,.csp",
      addRemoveLinks: true,
      maxFilesize: 8,
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      removedfile: function(file)
      {
        var name = file.upload.filename;
        $.ajax({
          type: 'POST',
          url: '{{ route('edufile.remove') }}',
          data: { "_token": "{{ csrf_token() }}", name: name},
          success: function (data){
              console.log("File has been successfully removed!!");
          },
          error: function(e) {
              console.log(e);
          }});
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function (file, response) {
        console.log(file);
      },
    }
  </script>
  <script>
    Dropzone.options.fileDropzone2 = {
      url: '{{ route('profile.store') }}',
      acceptedFiles: ".doc,.pdf,.csp",
      addRemoveLinks: true,
      maxFilesize: 8,
      headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      removedfile: function(file)
      {
        var name = file.upload.filename;
        $.ajax({
          type: 'POST',
          url: '{{ route('profile.remove') }}',
          data: { "_token": "{{ csrf_token() }}", name: name},
          success: function (data){
              console.log("File has been successfully removed!!");
          },
          error: function(e) {
              console.log(e);
          }});
          var fileRef;
          return (fileRef = file.previewElement) != null ?
          fileRef.parentNode.removeChild(file.previewElement) : void 0;
      },
      success: function (file, response) {
        console.log(file);
      },
    }
  </script>
  
  <script language="javascript" type="text/javascript">
   $(function () {
          $("#photo").change(function () {
              $("#dvPreview").html("");
              var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
              if (regex.test($(this).val().toLowerCase())) {
                  if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
                      $("#dvPreview").show();
                      $("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
                  }
                  else {
                      if (typeof (FileReader) != "undefined") {
                          $("#dvPreview").show();
                          $("#dvPreview").append("<img />");
                          var reader = new FileReader();
                          reader.onload = function (e) {
                              $("#dvPreview img").attr("src", e.target.result).height(100).width(100).margin(5);
                          }
                          reader.readAsDataURL($(this)[0].files[0]);
                      } else {
                          alert("This browser does not support FileReader.");
                      }
                  }
              } else {
                  alert("Please upload a valid image file.");
              }
          });
  
          
      });
      </script>
    <script>
          $("#date_of_leaving").change(function () {
              var startDate = document.getElementById("date_of_joining").value;
              var endDate = document.getElementById("date_of_leaving").value;
  
              if ((Date.parse(startDate) >= Date.parse(endDate))) {
                  alert("End date should be greater than Start date");
                  document.getElementById("date_of_leaving").value = "";
              }
          });
          $("#date_of_joining").change(function () {
              var startDate = document.getElementById("date_of_joining").value;
              var endDate = document.getElementById("date_of_leaving").value;
  
              if ((Date.parse(startDate) >= Date.parse(endDate))) {
                  alert("End date should be lower than Start date");
                  document.getElementById("date_of_joining").value = "";
              }
          });
  </script>
  
  </body>
</html>