<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'description',
        'email',
        'name',
        'dropzone_file',
        'phone',
        'line',
        'user_id',
        'position',
        'equipment_id',
        'problem_id',
        'contact_facebook',
        'number_equipment',
        'status',
       
    ];
}
