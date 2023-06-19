<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'room_name',
        'capacity',
        'photo_path_1',
        'photo_path_2',
        'photo_path_3',
        'photo_path_4'
    ];

    // protected $appends = [
    //     'photo_path_1',
    //     'photo_path_2',
    //     'photo_path_3',
    //     'photo_path_4'
    // ];

    // one to many
    // public function room_assets()
    // {
    //     return $this->hasOne('App\Models\DetilRoom', 'id_room');
    // }

    // Many to One

    public function room_asset()
    {
        return $this->belongsToMany('APP/Model/RoomAsset', 'room_id', 'id');
    }

    // one to many
    public function detail_booking()
    {
        return $this->hasMany('App\Models\DetailBooking', 'id_room');
    }
}
