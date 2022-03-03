<!DOCTYPE html>
  <title>Admin Panel | Reset Password</title>
  @include('adminpanel.layouts.header-script')
  <body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h3"><b>Reset Password</b></a>
    </div>
    <div class="card-body">
      <form action="{{route('update-password')}}" method="post">
          @csrf
          <input type="hidden" name="token" value="{{$token}}"/>
          <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{$email ?? old('email')}}"/>
        </div>
        <span class="text-danger">@error('email') {{ $message }} @enderror</span>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password"/>  
        </div>
        <span class="text-danger">@error('password') {{ $message }} @enderror</span>

        <div class="input-group mb-3">
          <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password"/>  
        </div>
        <span class="text-danger">@error('confirmpassword') {{ $message }} @enderror</span>
        
        <div class="row">
          <div class="col-8">
          </div>
          
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@include('adminpanel.layouts.footer-script')
</body>
</html>