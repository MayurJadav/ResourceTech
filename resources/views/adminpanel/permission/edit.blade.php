@php
error_reporting(0);
@endphp

<!DOCTYPE html>
    <title>Admin Panel | Update Permission</title>
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
                                <li class="breadcrumb-item"><a href="../../index">Home</a></li>
                                <li class="breadcrumb-item active">Update Permission</li>
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
                                    <h3 class="card-title">Update Permission</h3>
                                </div>

                                <form method="POST" action="../permission-update/{{ $permission_id }}">
                                    @csrf
                                    <div class="card-body">
                                    <h5><label>Permission</label> : {{ $editdata[0]->permission->permission_name }}</h5><br>
                                        <div class="row">
                                            <div class="col-sm-4">
                                            @foreach ($editdata as $editdatas)
                                                <div class="form-group">
                                                @if($editdatas->role->role_name)
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="roles[]" value="{{$editdatas->role_id}}" id="{{ $editdatas->role_id }}" class="custom-control-input" checked>
                                                        <label class="custom-control-label" for="{{ $editdatas->role_id }}">
                                                        {{ $editdatas->role->role_name }}
                                                        </label>
                                                    </div>
                                                @endif
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                        <a href="../permission-view" class="btn btn-info">View</a>
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