<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailBooking extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'room_booking_detail';
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'id_booking', 'id_room', 'id_user', 'notes_detail'
    ];

    // One to One
    public function room_booking()
    {
        return $this->belongsTo('APP/Model/Booking', 'id_booking', 'id');
    }

    // One to Many
    public function room()
    {
        return $this->belongsTo('APP/Model/Room', 'id_room', 'id');
    }

    // One to Many
    public function user()
    {
        return $this->belongsTo('APP/Model/User', 'id_user', 'id');
    }
}
