<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment_room extends Model
{
    use HasFactory;
    protected $fillable = [
        'label',
        'equipment_id',
        'room_id',
        'admin_room',
        'number_equipment',
       
    ];
}
