<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'problem',
        'label_button',
         
    ];
    public function problems()
    {
        return $this->hasMany(Problem::class);
    }
}
