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
                <li class="breadcrumb-item active">Room Update Form</li>
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
                          <h3 class="card-title">Room Asset Update Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('room-asset-update', $room_asset->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                                <label for="id_room">Room Name</label>
                                <input type="hidden" name="id_room" id="id_room" value="{{ old('room_id', $room_asset->id) }}" readonly>
                                <input type="text" name="room_name" id="room_name" value="{{ old('room_name', $fetch_data->room_name) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="id_asset">Asset Name</label>
                                <input type="hidden" name="id_asset" id="id_asset" value="{{ old('assets_id', $room_asset->assets_id) }}" readonly>
                                <input type="text" name="asset_name" id="asset_name" value="{{ old('asset_name', $fetch_data->asset_name) }}" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="assets_qty">Quantiy</label>
                                <input type="number" name="assets_qty" id="assets_qty" class="form-control" value="{{ old('assets_qty',$room_asset->assets_qty) }}" required>
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            {{-- <a href="{{ route('room-asset-create') }}" class="btn btn-danger">Clear Data</a> --}}
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
