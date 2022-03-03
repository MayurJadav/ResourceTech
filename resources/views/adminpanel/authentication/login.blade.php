<!DOCTYPE html>
  <title>Admin Panel | Login</title>
@include('adminpanel.layouts.header-script')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h2"><b>Login</b></a>
    </div>
    <div class="card-body">
      <form action="login" id="persondetail" method="post">
          @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">  
        </div>
        <span class="text-danger">@error('email') {{ $message }} @enderror</span>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
        </div>
        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        
        <div class="row">
          <div class="col-8">
          <a href="forgot-password">Forgot Password</a>
          </div>
          
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
    
  </div>
  <!-- <div style="text-align: center; margin-top: 10px;">
        <a href="registration">Don't have an account | Sign Up</a>
    </div> -->
</div>
@include('adminpanel.layouts.footer-script')
</body>
</html>