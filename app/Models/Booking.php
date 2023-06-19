<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'room_booking';
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'id_detail_booking', 'status', 'start_time', 'end_time', 'booking_date'
    ];

    // one to one
    public function detail_booking()
    {
        return $this->hasOne('App\Models\DetailBooking', 'id_detail_booking');
    }
}
