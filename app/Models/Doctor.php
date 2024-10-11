<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'speciality',
        'location', // Add location here
        // 'availability_days', // Add availability_days here
        'description',
        'password',
        'Image'
    ];
    // protected $fillable = ['name', 'speciality', 'location'];

    public function Avaibility()
    {
        return $this->hasMany(Avaibility::class);
    }
   
}
