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
                <li class="breadcrumb-item active">Users</li>
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
                      <div class="card">
                        <div class="card-header">
                            <a href="{{ route('user-create') }}" class="btn btn-primary btn-rounded">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-Mail</th>
                                <th>Phone</th>
                                <th>Company</th>
                                <th>Division</th>
                                <th>Level</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user_data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user_data->name }}</td>
                                        <td>{{ $user_data->email }}</td>
                                        <td>{{ $user_data->phone_number }}</td>
                                        <td>{{ $user_data->company }}</td>
                                        <td>{{ $user_data->division }}</td>
                                        <td>{{ $user_data->level }}</td>
                                        <td>
                                            <form onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus data ?');" action="{{ route('user-delete',$user_data->user_id) }}" method="POST">
                                                <a href="{{ route('user-edit',$user_data->user_id) }}" class="btn btn-warning btn-block btn-sm"><i class="fa fa-pen"></i></a>
                                                @csrf
                                                @method('DELETE')
                                                <br>
                                                <button type="submit" class="btn btn-danger btn-block btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                            <tr>
                              <th>Rendering engine</th>
                              <th>Browser</th>
                              <th>Platform(s)</th>
                              <th>Engine version</th>
                              <th>CSS grade</th>
                            </tr>
                            </tfoot> --}}
                          </table>
                        </div>
                        <!-- /.card-body -->
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
