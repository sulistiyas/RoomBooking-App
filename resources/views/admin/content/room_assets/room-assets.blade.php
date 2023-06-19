@include('layouts.master.header')

@include('layouts.master.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Rooms Asset Data</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('room-view') }}">Rooms</a></li>
                <li class="breadcrumb-item active">Rooms Asset</li>
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
                            <a href="{{ route('room-asset-create') }}" class="btn btn-primary btn-rounded">
                                <i class="fa fa-plus"></i>
                                Add Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Room Name</th>
                                <th>Asset</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($room_asset as $room)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $room->room_name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-lg{{ $room->room_id }}">
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
{{-- Modals --}}
@foreach ($room_asset as $room)
<div class="modal fade" id="modal-lg{{ $room->room_id }}">
{{-- @endforeach --}}
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> <strong> {{ $room->room_name }} </strong>Room Asset List</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <thead>
                <th>No</th>
                <th>Asset Name</th>
                <th>Qty</th>
                <th>Condition</th>
                <th>#</th>
            </thead>
            <tbody>
                @php
                    $no=1;
                    $id_room = $room->room_id;
                    $fetch_data = DB::table('room_assets')
                                    ->select('*', 'room_assets.id as ids')
                                    ->join('rooms', 'room_assets.room_id', '=', 'rooms.id')
                                    ->join('assets', 'room_assets.assets_id', '=', 'assets.id')
                                    ->where('room_assets.deleted_at', '=', NULL)
                                    ->where('room_assets.room_id','=', $id_room)
                                    ->get();
                    foreach ($fetch_data as $item) {
                @endphp
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->asset_name }}</td>
                    <td>{{ $item->assets_qty }}</td>
                    <td>{{ $item->status }}</td>
                    <td>
                      <form onsubmit="return confirm('Apakah Anda Yakin ingin Menghapus data ?');" action="{{ route('room-asset-destroy', $item->ids) }}" method="POST">
                        <a href="{{ route('room-asset-edit',$item->ids) }}" class="btn btn-warning btn-block btn-sm"><i class="fa fa-pen"></i></a>
                        @csrf
                        @method('DELETE')
                        <br>
                        <button type="submit" class="btn btn-danger btn-block btn-sm">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                      
                    </td>
                </tr>
                @php
                    }
                @endphp
            </tbody>
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
