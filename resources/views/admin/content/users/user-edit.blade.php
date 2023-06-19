@include('layouts.master.header')

@include('layouts.master.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Users Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user-view') }}">Users</a></li>
                <li class="breadcrumb-item active">User Edit Form</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Edit Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user-update', $users->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="fullname">Full Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Fullname" value="{{ old('name', $users->name) }}">
                            </div>
                            <div class="form-group">
                              <label for="company">Company</label>
                              <input type="text" class="form-control" id="company" name="company" placeholder="Enter Company Name" value="{{ old('company',$detilUsers->company) }}">
                            </div>
                            <div class="form-group">
                              <label for="phoneNumber">Phone Number</label>
                              <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter Phone Number" value="{{ old('phone_number',$detilUsers->phone_number) }}">
                            </div>
                            <div class="form-group">
                              <label for="division">Division</label>
                              <input type="text" class="form-control" id="division" name="division" placeholder="Enter Division"value="{{ old('division',$detilUsers->division) }}">
                            </div>
                            <div class="form-group">
                              <label for="level">Level</label>
                              <select name="level" id="level" class="form-control">
                                <option value="" disabled> - Select - </option>
                                <option value="user">User</option>
                                <option value="staff">Staff</option>
                                <option value="admin">Admin</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{ old('email',$users->email) }}">
                            </div>
                            <div class="form-group">
                              <label for="user_password">Password</label><br>
                              <code>!! Leave it blank if you don't want to change the password</code>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                          </div>
                          <!-- /.card-body -->

                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

@include('layouts.master.footer')
