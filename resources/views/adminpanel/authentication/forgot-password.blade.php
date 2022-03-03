<!DOCTYPE html>
  <title>Admin Panel | Forgot Password</title>
@include('adminpanel.layouts.header-script')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h3"><b>Forgot Password</b></a>
    </div>
    <div class="card-body">
      <form action="forgot-password" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">  
        </div>
        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        
        <div class="row">
        <div class="col-8">
          <a href="login">Back to login</a>
          </div>
          
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@include('adminpanel.layouts.footer-script')
</body>
</html>