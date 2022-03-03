<!DOCTYPE html>
  <title>Admin Panel | Add Leave</title>
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
            <h1 class="m-0">Leave</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index">Home</a></li>
              <li class="breadcrumb-item active">Add Leave</li>
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
                <h3 class="card-title">Add Leave</h3>
              </div>

              <form method="POST" action="leave-add" id="quickForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Employee Name</label>
                    <input type="employee_name" name="employee_name" id="exampleInputEmail1" class="form-control" placeholder="Enter Employee Name" value="{{ old('employee_name') }}">
          
                            @error('employee_name')
                      <small style="color:red; font-weight:600;">{{ $message }}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="from_date">From Date</label>
                      <input type="date" name="from_date" id="date1" value="{{old('from_date') }}" class="form-control">
                      @error('from_date')
                      <small style="color:red; font-weight:600;">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>


                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="to_date">To Date</label>
                      <input type="date" name="to_date" value="{{old('to_date') }}" id="date2" class="form-control">
                      @error('to_date')
                      <small style="color:red; font-weight:600;">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>

                  
                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Number Of Day</label>
                    <input type="number" name="number_of_day" id="exampleInputEmail1" class="form-control" placeholder="Enter Number Of Day" value="{{ old('number_of_day') }}">
      
                            @error('number_of_day')
                      <small style="color:red; font-weight:600;">{{ $message }}</small>
                      @enderror
                  </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Reason</label>
                      <textarea class="form-control" rows="3" name="reason" placeholder="Enter Reason...">{{old('reason') }}</textarea>
                      @error('reason')
                      <small style="color:red; font-weight:600;">{{ $message }}</small>
                      @enderror
                    </div>
                  </div>

                  <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Reporting Manager</label>
                    <select name="reporting_manager" class="form-control">
                      <option>Select Reporting Manager</option>
                      {{-- @foreach ($roledata as $roledatas)
                      <option value="{{$roledatas['id']}}">{{$roledatas['role_name']}}</option>
                      @endforeach --}}
                    </select>
                  </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                    <label for="professional_experience">Document</label>
                    <div class="dropzone" id="file-dropzone1"></div>
                    </div>
                 </div>

                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <a href="../../leave-view" class="btn btn-info">View</a>
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