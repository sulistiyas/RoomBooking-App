@include('layouts.master.header')

@include('layouts.master.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Room Booking List Data</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                <li class="breadcrumb-item active">Schedule</li>
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
                        <a href="{{ route('booking-create') }}" class="btn btn-primary btn-rounded">
                            <i class="fa fa-plus"></i>
                            Add Data
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Room</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>PIC</th>
                            <th>PIC Phone Number</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($booking as $item)
                                <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->room_name }}</td>
                                  <td>{{ $item->booking_date }}</td>
                                  <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->phone_number }}</td>
                                  <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg{{ $item->id_book }}">
                                      Click Here
                                    </button>
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
@foreach ($booking as $item)
<div class="modal fade" id="modal-lg{{ $item->id_book }}">
{{-- @endforeach --}}
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> <strong> Room Schedule Details </strong></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>Booking ID</th>
              <td>:</td>
              <td>{{ $item->id_book }}</td>
            </tr>
            <tr>
              <th>Room Name</th>
              <td>:</td>
              <td>{{ $item->room_name }}</td>
            </tr>
            <tr>
              <th>Booking Date</th>
              <td>:</td>
              <td>{{ $item->booking_date }}</td>
            </tr>
            <tr>
              <th>Booking Time</th>
              <td>:</td>
              <td>{{ $item->start_time }} - {{ $item->end_time }}</td>
            </tr>
            <tr>
              <th>Contact Person</th>
              <td>:</td>
              <td>{{ $item->name }}</td>
            </tr>
            <tr>
              <th>Phone Number</th>
              <td>:</td>
              <td>{{ $item->phone_number }}</td>
            </tr>
            <tr>
              <th>Note</th>
              <td>:</td>
              <td><textarea cols="30" rows="10" class="form-control" disabled>{{ $item->notes_detail }}</textarea></td>
            </tr>
          </table>
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
