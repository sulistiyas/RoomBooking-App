@include('layouts.master.header')

@include('layouts.master.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Room Booking</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard_admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('room-schedule') }}">Schedule</a></li>
                    <li class="breadcrumb-item active">Create Schedule</li>
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
                          <h3 class="card-title">Create New Schedule</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('booking-store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="card-body">
                            <div class="form-group">
                              <label for="id_room">Room Name</label>
                              <select name="id_room" id="id_room" class="form-control">
                                <option value="-" disabled>- Select Room -</option>
                                @foreach ($room as $item)
                                    <option value="{{ $item->id }}">{{ $item->room_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="booking_date">Date</label>
                              <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                            </div>
                            <div class="form-group">
                              <select id="start_time" onchange="ChangeSecondList(this.options[this.selectedIndex].value)" name="start_time" class="form-control">
                                <option value="">- Select Start Time -</option>
                                <option value="09:00:00">09:00:00</option>
                                <option value="10:00:00">10:00:00</option>
                                <option value="11:00:00">11:00:00</option>
                                <option value="12:00:00">12:00:00</option>
                                <option value="13:00:00">13:00:00</option>
                                <option value="14:00:00">14:00:00</option>
                                <option value="15:00:00">15:00:00</option>
                                <option value="16:00:00">16:00:00</option>
                                <option value="17:00:00">17:00:00</option>
                              </select>
                            </div>
                            @php
                                
                            @endphp
                            <div id="static-list-div" class="form-group">
                              <select class="form-control">
                                <option>&#8679; Select an start time</option>
                                <option>&#8679; from the above dropdown.</option>
                              </select>
                            </div>
                            <div id="dynamic-list-div" class="form-group">
                              <select id="end_time" name="end_time" class="form-control">
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              <option value=""></option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="note_booking">Notes</label>
                              <textarea name="note_booking" id="note_booking" cols="30" rows="10" class="form-control">

                              </textarea>
                            </div>
                             <div class="form-group">
                                <label for="id_user">PIC Name</label>
                                <select name="id_user" id="id_user" class="form-control">
                                    <option value="-" disabled>- Select Name -</option>
                                    @foreach ($user as $users)
                                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                                    @endforeach
                                </select>
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
