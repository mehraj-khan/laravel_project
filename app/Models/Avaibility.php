<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaibility extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'days',
        'start_time',
        'end_time',
        'location',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

}
