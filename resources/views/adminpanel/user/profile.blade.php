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




  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>



  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <span class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="../../AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </span>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
            </ul>
        </nav>
    </div>
</aside>




  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Update Profile</li>
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
                <h3 class="card-title">Update Profile</h3>
              </div>

              <form method="POST" action="{{ url('profile-update/'.$user->id) }}" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="first_name">First Name</label>
                                         
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Enter First Name" value="{{ $user->first_name }}"/>
                       <input type="text" name="" id="userid" value="{{ $user->id }}" hidden>
                        @error('first_name')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                      </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="last_name">Last Name</label>
                                         
                        <input type="text" name="last_name" id="last_name" class="form-control" value="{{$user->last_name }}" placeholder="Enter First Name">
                        @error('last_name')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                                     
                        <input type="text" name="email" id="email" value="{{$user->email }}" class="form-control" placeholder="Enter Email Address">
                        @error('email')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror   
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="password">Password</label>
                                     
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}" />
                        @error('password')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror    
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="phone">Phone</label>
                                        
                        <input type="number" name="phone" id="phone" value="{{$user->phone }}" class="form-control" placeholder="Enter phone Number">
                        @error('phone')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror 
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" name="branch_name" id="branch_name" value="{{old('branch_name') }}" class="form-control" placeholder="Enter Branch Name">
                        @error('branch_name')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>


                  

                    <div class="col-sm-4">
                      <div class="form-group" >
                        <h6 style="margin-bottom: 15px"><b>Gender</b></h6>
                                        
                        <div class="custom-control custom-radio" style="display: inline">
                          <input class="custom-control-input" type="radio" id="male" value="male" name="gender" @if(old('gender') == 'male') checked @endif checked>
                          <label for="male" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio ml-1" style="display: inline">
                          <input class="custom-control-input" type="radio" id="female" name="gender" value="female" @if(old('gender') == 'female') checked @endif>
                          <label for="female" class="custom-control-label">Female</label>
                        </div>
          
                      </div>
                       @error('gender')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror 
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                          <label for="emergency_contact">Emergency Contact</label>
                          <input type="number" name="emergency_contact" id="emergency_contact" value="{{old('emergency_contact') }}" class="form-control" placeholder="Enter Emergency Contact">
                          @error('emergency_contact')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                        </div>
                      </div>
  

                    <div class="col-sm-4">
                      <div class="form-group" >
                        <h6 style="margin-bottom: 15px"><b>Marital Status</b></h6>
                        <div class="custom-control custom-radio" style="display: inline">
                          <input class="custom-control-input" type="radio" id="married" value="married" name="marital_status" @if(old('marital_status') == 'married') checked @endif checked>
                          <label for="married" class="custom-control-label">Married</label>
                        </div>
                        <div class="custom-control custom-radio ml-1" style="display: inline">
                          <input class="custom-control-input" type="radio" id="unmarrid" name="marital_status" value="unmarrid" @if(old('marital_status') == 'unmarrid') checked @endif>
                          <label for="unmarrid" class="custom-control-label">Unmarrid</label>
                        </div>
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_birth">Date Of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value="{{old('date_of_birth') }}" class="form-control">
                        @error('date_of_birth')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_joining">Date Of Joining</label>
                        <input type="date" name="date_of_joining" value="{{old('date_of_joining') }}" id="date_of_joining" class="form-control">
                        @error('date_of_joining')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror
                      </div>
                    </div>


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="date_of_leaving">Date Of Leaving</label>
                        <input type="date" name="date_of_leaving" value="{{old('date_of_leaving') }}" id="date_of_leaving" class="form-control">
                        
                      </div>
                    </div>


                    


                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="photo">Photo</label>
                        <div id="dvPreview"></div>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="photo"/>
                            <label class="custom-file-label" for="photo">Choose file</label>
                          </div>
                          
                        </div>
                       
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="monthly_pay_grade">Monthly Pay Grade </label>
                                      
                        <input type="text" name="monthly_pay_grade" value="{{old('monthly_pay_grade') }}" id="monthly_pay_grade" class="form-control" placeholder="Enter Monthly Pay Grade">
                         @error('monthly_pay_grade')
                        <small style="color:red; font-weight:600;">{{ $message }}</small>
                        @enderror  
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
                          <textarea class="form-control" rows="3" name="address" placeholder="Enter Address...">{{old('address') }}</textarea>
                        </div>
                        @error('address')
                        <small style="color:red; font-weight:600;">{{ $message }}*</small>
                        @enderror
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
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
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
  Dropzone.options.fileDropzone1 = {
    url: "{{ route('edufile.store') }}",
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
  var userid = $('#userid').val();
  Dropzone.options.fileDropzone2 = {
    url: '{{ route('profile.store') }}',
    acceptedFiles: ".doc,.xls,..docs,.ods,.pdf,.csv,.xlsx,.docx,.odt,.rtf,.txt",
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
<script>
      $("#date_of_leaving").change(function () {
        var startDate = document.getElementById("date_of_joining").value;
        var endDate = document.getElementById("date_of_leaving").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("Leaving date should be greater than Joining date");
            document.getElementById("date_of_leaving").value = "";
        }
    });
    $("#date_of_joining").change(function () {
        var startDate = document.getElementById("date_of_joining").value;
        var endDate = document.getElementById("date_of_leaving").value;

        if ((Date.parse(startDate) >= Date.parse(endDate))) {
            alert("Joining date should be lower than Leaving date");
            document.getElementById("date_of_joining").value = "";
        }
    });

</script>

</body>
</html>