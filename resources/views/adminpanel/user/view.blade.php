@php
 $userCreatePermission = checkPermission('user_create');
 $userDeletePermission = checkPermission('user_delete');
 $userEditPermission = checkPermission('user_edit');
@endphp

<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Admin Panel | View User</title>
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
              <h1>User</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../index">Home</a></li>
                <li class="breadcrumb-item active">View User</li>
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
                  <h3 class="card-title">View User</h3>
                  {{-- <button class="btn btn-danger delete-all float-right" style="margin-left: 5px;">Delete All User</button> --}}
                  @if($userCreatePermission)
                  <a href="user-add" class="btn btn-primary float-right">Add New User</a>
                  @endif
                </div>
                {{-- <div class="card-body">
                    <form action="" method="GET" class="d-flex flex-row">
                      @csrf
                        <div class="col-sm-11">
                            <input type="text" name="search" placeholder="Search by name and email" class="form-control">
                        </div>
                        <div class="col-sm-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div> --}}

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>SrNo.</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Email</th>
                          <th>Photo</th>
                          <th>Role</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      @foreach ($data as $key => $datas)
                      <tbody>
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$datas->first_name}}</td>
                          <td>{{$datas->last_name}}</td>
                          <td>{{$datas->email}}</td>
                          <td><img src="{{'../storage/user/'.$datas['photo']}}" height="55" width="55"></td>
                          <td>{{$datas->role_name}}</td>
                          <td>
                            @if($userEditPermission)
                            <a href="user-edit/{{$datas->id}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil-alt"></i></a>
                            @endif
                            &nbsp
                            @if($userDeletePermission)
                            <a href="user-delete/{{$datas->id}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                            @endif
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  {{-- <div class="float-right">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="{{ $data->previousPageUrl() }}">Previous</a></li>
                      <li class="page-item">{{$data->links()}}</li>
                      <li class="page-item"><a class="page-link" href="{{ $data->nextPageUrl() }}">Next</a></li>
                    </ul>
                  </div> --}}
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