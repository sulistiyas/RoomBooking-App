<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DetailBooking;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $booking = DB::table('room_booking')
            ->select('*', 'room_booking.id as id_book')
            ->join('room_booking_detail', 'room_booking.id', '=', 'room_booking_detail.id_booking')
            ->join('rooms', 'room_booking_detail.id_room', '=', 'rooms.id')
            ->join('users', 'room_booking_detail.id_user', '=', 'users.id')
            ->join('detail_user', 'users.id', '=', 'detail_user.id')
            ->where('room_booking.deleted_at', '=', NULL)
            ->orderBy('room_booking.id', 'asc')->get();
        return view('admin.content.booking.booking-list', ['booking' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $room = DB::table('rooms')->where('deleted_at', '=', NULL)->get();
        $user = DB::table('users')->where('deleted_at', '=', NULL)->get();
        // $booking_data = DB::table('room_booking')->where('deleted_at','=',NULL)->orderBy()
        return view('admin.content.booking.booking-create', compact('room', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_time'    => 'required',
            'end_time'      => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'    => false,
                'message'   => 'Validation Error',
                'errors'    => $validator->errors()
            ], 401);
        } else {

            $book_data = DB::table('room_booking')->get();
            foreach ($book_data as $item) {
                $book_date_check = $item->booking_date;
                $book_start_check = $item->start_time;
                $book_end_check = $item->end_time;
                $data_check = DB::table('room_booking')
                    ->where('booking_date', '=', $book_date_check)
                    ->where('start_time', '=', $book_start_check)
                    ->where('end_time', '=', $book_end_check)->first();
                if (!$data_check) {
                    try {
                        Booking::create([
                            'status'        => '3',  // 3 = 'Rejected', 2 = 'Waiting Approval', 1 = 'Approved'
                            'start_time'    => $request->start_time,
                            'end_time'      => $request->end_time,
                            'booking_date'  => $request->booking_date,
                            'created_at'    => date('Y-m-d h:i:s'),
                            'updated_at'    => date('Y-m-d h:i:s'),
                        ]);

                        $book_id = DB::table('room_booking')->select('id')->orderBy('id', 'asc')->get();
                        foreach ($book_id as $item) {
                            $ids = $item->id;
                        }

                        DetailBooking::create([
                            'id_booking'        => $ids,
                            'id_room'           => $request->id_room,
                            'id_user'           => $request->id_user,
                            'notes_detail'      => $request->note_booking,
                            'created_at'        => date('Y-m-d h:i:s'),
                            'updated_at'        => date('Y-m-d h:i:s'),
                        ]);

                        return redirect()->route('room-schedule')->with('success', 'Data Created Successfully!');
                    } catch (\Throwable $th) {
                        return response()->json([
                            'status'    => false,
                            'message'   => 'Error',
                            'errors'    => $th
                        ], 401);
                    }
                } else {
                    // return redirect()->route('booking-create')->with('fail', 'Schedule Already Exist!! Please Check The Calendar');
                    return response()->json([
                        'status'    => false,
                        'message'   => 'Error',
                        'errors'    => $data_check->errors()
                    ], 401);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
