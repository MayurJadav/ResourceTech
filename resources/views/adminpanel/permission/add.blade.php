<!DOCTYPE html>
  <title>Admin Panel | Add Permission</title>
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
            <h1 class="m-0">Permission</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item active">Add Permission</li>
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
                <h3 class="card-title">Add Permission</h3>
              </div>

              <form method="POST" action="permission-add" id="quickForm">
                @csrf
                <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Permission</label>
                    <select name="permission_id" class="form-control">
                      <option>Select Permission</option>
                      @foreach ($permissiondata as $permissiondatas)
                      <option value="{{$permissiondatas['id']}}">{{$permissiondatas['permission_name']}}</option>
                      @endforeach
                    </select>
                    @error('permission_id')
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
                    <select name="role_id" class="form-control">
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
                  <a href="permission-view" class="btn btn-info">View</a>
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