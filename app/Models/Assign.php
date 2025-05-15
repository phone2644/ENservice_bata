<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assign extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'repair_id',
        'dropzone_file',
        'report_details',     
    ];
}
