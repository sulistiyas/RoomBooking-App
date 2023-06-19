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
            <li class="breadcrumb-item active">Rooms</li>
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
                        <a href="{{ route('room-form') }}" class="btn btn-primary btn-rounded">
                            <i class="fa fa-plus"></i>
                            Add Data
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Room Capacity</th>
                            <th>Picture</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($room as $room_data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $room_data->room_name }}</td>
                                    <td>{{ $room_data->capacity }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default{{ $room_data->id }}">
                                          Click Here
                                      </button>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus data ?');" action="{{ route('delete_room', $room_data->id) }}" method="POST">
                                            <a href="{{ route('edit_room',$room_data->id) }}" class="btn btn-warning btn-block btn-sm"><i class="fa fa-pen"></i></a>
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
{{-- Modals --}}
@foreach ($room as $room_data)
<div class="modal fade" id="modal-default{{ $room_data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Room Picture</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="carouselExampleIndicators{{ $room_data->id }}" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
              {{-- @foreach ($room as $pict)
              
              @endforeach --}}
              <div class="carousel-item active">
                <img class="d-block w-100" src="/images/room_pict/{{ $room_data->photo_path_1 }}" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="/images/room_pict/{{ $room_data->photo_path_2 }}" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="/images/room_pict/{{ $room_data->photo_path_3 }}" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="/images/room_pict/{{ $room_data->photo_path_4 }}" alt="Fourth slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $room_data->id }}" role="button" data-slide="prev">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-left"></i>
              </span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators{{ $room_data->id }}" role="button" data-slide="next">
              <span class="carousel-control-custom-icon" aria-hidden="true">
                <i class="fas fa-chevron-right"></i>
              </span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach
  <!-- /.modal -->
@include('layouts.master.footer')
