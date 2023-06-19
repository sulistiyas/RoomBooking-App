@include('layouts.master.header')

@include('layouts.master.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Room Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('room-view') }}">Rooms</a></li>
                <li class="breadcrumb-item"><a href="{{ route('room-asset') }}">Room Asset</a></li>
                <li class="breadcrumb-item active">Room Form</li>
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
                          <h3 class="card-title">Room Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('room-asset-store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="id_room">Room Name</label>
                                <select name="id_room" id="id_room" class="form-control">
                                    <option value="-" disabled>- Select Room -</option>
                                    @foreach ($room_data as $room)
                                        <option value="{{ $room->id }}">{{ $room->room_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_asset">Asset Name</label>
                                <select name="id_asset" id="id_asset" class="form-control">
                                    <option value="-" disabled>- Select Asset -</option>
                                    @foreach ($asset_data as $asset)
                                        <option value="{{ $asset->id }}">{{ $asset->asset_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="asset_qty">Quantiy</label>
                                <input type="number" name="asset_qty" id="asset_qty" class="form-control" required>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('room-asset-create') }}" class="btn btn-danger">Clear Data</a>
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
