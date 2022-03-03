<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
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
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          @if(checkPermission('user_list'))
          <div class="col-12 col-sm-6 col-md-3">
            <a href="../../user/user-view" style="color: black;">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number">{{ $usercount }}</span>
              </div>
            </div>
            </a>
          </div>
          @endif

          @if(checkPermission('permission_list')) 
          <div class="col-12 col-sm-6 col-md-3">
          <a href="../permission/permission-view" style="color: black;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Permission</span>
                <span class="info-box-number">{{ $permissioncount }}</span>
              </div>
            </div>
          </a>
          </div>
          @endif
          <div class="col-12 col-sm-6 col-md-3">
          <a href="../leave-view" style="color: black;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-lock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Leave</span>
                <span class="info-box-number">0</span>
              </div>
            </div>
          </a>
          </div>

          <div class="clearfix hidden-md-up"></div>

          {{-- <div class="col-12 col-sm-6 col-md-3">
          <a href="../category/category-view" style="color: black;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fab fa-cuttlefish"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Category</span>
                <span class="info-box-number">0</span>
              </div>
            </div>
          </a>
          </div> --}}
          {{-- <div class="col-12 col-sm-6 col-md-3">
          <a href="../product/product-view" style="color: black;">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fab fa-product-hunt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Product</span>
                <span class="info-box-number">0</span>
              </div>
            </div>
          </a>
          </div> --}}
        </div>
      </div>
    </section>
  </div>

  @include('adminpanel.layouts.footer')
</div>
@include('adminpanel.layouts.footer-script')
</body>
</html>