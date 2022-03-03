@php
    $permissionCreatePermission = checkPermission('permission_create');
    $permissionListPermission = checkPermission('permission_list');
    $permissionEditPermission = checkPermission('permission_edit');
@endphp

<!DOCTYPE html>
  <title>Admin Panel | View Permission</title>
  @include('adminpanel.layouts.header-script')
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    @include('adminpanel.layouts.header')

    @include('adminpanel.layouts.sidebar')

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-1">
            <div class="col-sm-6">
              <h1>Permission</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index">Home</a></li>
                <li class="breadcrumb-item active">View Permission</li>
              </ol>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">View Permission</h3>
                  <a href="permission-addview" class="btn btn-primary float-right">Add New Permission</a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SrNo.</th>
                          <th>Permission Name</th>
                          <th>Assign Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                            @foreach ($data as $key => $datas)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$datas->permission_name}}</td>
                            <td>
                                @foreach ($datas->role_permission as $role)
                                <span class="badge badge-success">
                                {{$role->role->role_name}}
                                </span>
                                @endforeach
                            </td>
                            <td style="width: 80px;">
                              @if($permissionEditPermission)
                            <a href="permission-edit/{{$datas->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i></a>
                            @endif
                          </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <div class="float-right">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
                      <li class="page-item">{{$data->links()}}</li>
                      <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
                    </ul>
                  </div>
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