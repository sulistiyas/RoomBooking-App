<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetilUser extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'detail_user';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_user',
        'division',
        'company',
        'phone_number',
        'status'
    ];

    // one to one
    public function user()
    {
        return $this->belongsTo('App/Models/User', 'id_user', 'id');
    }
}
