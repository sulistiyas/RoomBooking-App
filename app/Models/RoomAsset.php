<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomAsset extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at'
    ];

    protected $fillable = [
        'room_id',
        'assets_id',
        'assets_qty'
    ];

    // One to Many

    public function asset()
    {
        return $this->hasMany('APP\Models\Assets', 'assets_id');
    }

    public function room()
    {
        return $this->hasMany('APP\Models\Room', 'room_id');
    }
}
