<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'doctor_id', 'user_id', 'patient_name', 'patient_email', 'appointment_date', 'status'
    // ];

    // public function doctor() {
    //     return $this->belongsTo(Doctor::class);
    // }
}
