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
                        <form action="{{ route('store_room') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="room_name">Room Name</label>
                              <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Enter Room Name" value="{{ old('room_name', $room->room_name) }}">
                            </div>
                            <div class="form-group">
                                <label for="capacity">Room Capacity</label>
                                <input type="number" class="form-control" id="capacity" name="capacity" placeholder="Enter Room Capacity" value="{{ old('capacity', $room->capacity) }}">
                            </div>
                            <div class="form-group">
                                <label for="">Keep Empty if nothing to change</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path_1" name="photo_path_1" value="{{ old('photo_path_1', $room->photo_path_1) }}">
                                    <label class="custom-file-label" for="photo_path_1">Upload Photo 1</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path_2" name="photo_path_2" value="{{ old('photo_path_1', $room->photo_path_2) }}">
                                    <label class="custom-file-label" for="photo_path_2">Upload Photo 2</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path_3" name="photo_path_3" value="{{ old('photo_path_1', $room->photo_path_3) }}">
                                    <label class="custom-file-label" for="photo_path_3">Upload Photo 3</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="photo_path_4" name="photo_path_4" value="{{ old('photo_path_1', $room->photo_path_4) }}">
                                    <label class="custom-file-label" for="photo_path_4">Upload Photo 4</label>
                                </div>
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
