<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('adminpanel.layouts.header')
    @include('adminpanel.layouts.sidebar')  
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
              <li class="breadcrumb-item active">Edit Profile</li>
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
                <h3 class="card-title">Edit Profile</h3>
              </div>

              <form method="POST" action="{{ url('update-myprofile/'.$user->id) }}" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                                         
                        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $user->first_name }}" placeholder="Enter First Name">
                        @error('first_name')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                      </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                                         
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $user->last_name }}" placeholder="Enter First Name">
                        @error('last_name')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                                     
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="Enter Email Address">
                        @error('email')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror   
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                                        
                        <input type="number" name="phone" id="phone" value="{{ $user->phone }}" class="form-control" placeholder="Enter phone Number">
                        @error('phone')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror 
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" name="branch_name" id="branch_name" value="{{ $user->branch_name }}" class="form-control" placeholder="Enter Branch Name">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="emergency_contact">Emergency Contact</label>
                        <input type="number" name="emergency_contact" id="emergency_contact" value="{{ $user->emergency_contact }}" class="form-control" placeholder="Enter Emergency Contact">
                      </div>
                    </div>

                  

                    <div class="col-sm-4">
                      <div class="form-group" >
                        <h6 style="margin-bottom: 15px"><b>Gender</b></h6>
                                        
                        <div class="custom-control custom-radio" style="display: inline">
                          <input class="custom-control-input" type="radio" id="male" value="male" name="gender" 
                          @if ($user->gender == 'male')
                          checked
                          @endif checked>
                          <label for="male" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio ml-1" style="display: inline">
                          <input class="custom-control-input" type="radio" id="female" name="gender" value="female"
                          @if ($user->gender == 'female')
                          checked
                          @endif>
                          <label for="female" class="custom-control-label">Female</label>
                        </div>
                        @error('gender')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror 
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="monthly_pay_grade">Monthly Pay Grade </label>
                                      
                        <input type="text" name="monthly_pay_grade" value="{{ $user->monthly_pay_grade }}" id="monthly_pay_grade" class="form-control" placeholder="Enter Monthly Pay Grade">
                        @error('monthly_pay_grade')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group" >
                        <h6 style="margin-bottom: 15px"><b>Marital Status</b></h6>
                        <div class="custom-control custom-radio" style="display: inline">
                          <input class="custom-control-input" type="radio" id="married" value="married" name="marital_status"
                          @if ($user->marital_status == 'married')
                          checked
                          @endif checked>
 
                          <label for="married" class="custom-control-label">Married</label>
                        </div>
                        <div class="custom-control custom-radio ml-1" style="display: inline">
                          <input class="custom-control-input" type="radio" id="unmarried" name="marital_status" value="unmarried"
                          @if ($user->marital_status == 'unmarried')
                          checked
                          @endif>
                          <label for="unmarried" class="custom-control-label">Unmarried</label>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control">
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_joining" id>Date Of Joining</label>
                        <input type="date" name="date_of_joining" value="{{ $user->date_of_joining }}" id="date_of_joining" class="form-control">
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_leaving">Date Of Leaving</label>
                        <input type="date" name="date_of_leaving" value="{{ $user->date_of_leaving }}" id="date_of_leaving" class="form-control">
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="photo">Photo</label>
                        <div id="dvPreview">
                        </div>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" value="{{ $user->photo }}" name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                          </div>
                        </div>
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
                          <textarea class="form-control" rows="3" name="address" placeholder="Enter Address...">{{ $user->address }}</textarea>
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
                      <h4 style="color: red;">No Any File Exist</h4>
                      @endif  
                    </div>

                    <div class="col-sm-6">
                      <label for="exampleInputEmail1">*Old Professional Qualification Documents</label>
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
                          <h4 style="color: red;">No Any File Exist</h4>
                          @endif  
                        </div>
                    </div>

                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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