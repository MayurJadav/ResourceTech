<!DOCTYPE html>
  <title>Admin Panel | Add User</title>
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
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
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
                <h3 class="card-title">Add User</h3>
              </div>

              <form method="POST" action="user-add" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="first_name" name="first_name" id="exampleInputEmail1" class="form-control" placeholder="Enter First Name" value="{{ old('first_name') }}">
                    @error('first_name')
                                <span class="help-block text-danger">
                                    <small>{{ $message }}
                                    </small>
                                </span>
                            @enderror
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="last_name" name="last_name" id="exampleInputEmail1" class="form-control" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                    @error('last_name')
                                <span class="help-block text-danger">
                                    <small>{{ $message }}
                                    </small>
                                </span>
                            @enderror
                  </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Phone</label>
                      <input type="phone" name="phone" id="exampleInputEmail1" class="form-control" placeholder="Enter Phone" value="{{ old('phone') }}">
                      @error('phone')
                                  <span class="help-block text-danger">
                                      <small>{{ $message }}
                                      </small>
                                  </span>
                              @enderror
                    </div>
                    </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" id="exampleInputEmail1" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                    @error('email')
                                <span class="help-block text-danger">
                                    <small>{{ $message }}
                                    </small>
                                </span>
                            @enderror
                  </div>
                  </div>
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Role</label>
                    <select name="role_id" class="form-control" value="{{ old('role_id') }}">
                      <option>Select Role</option>
                      @foreach ($roledata as $roledatas)
                      <option value="{{$roledatas['id']}}">{{$roledatas['role_name']}}</option>
                      @endforeach
                    </select>
                    @error('role_id')
                                <span class="help-block text-danger">
                                    <small>{{ $message }}
                                    </small>
                                </span>
                            @enderror
                  </div>
                  </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="../../user/user-view" class="btn btn-info">View</a>
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
</body>
</html>