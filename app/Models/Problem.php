<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    use HasFactory;
    protected $fillable = [
        'topic',
        'problem',
       
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
