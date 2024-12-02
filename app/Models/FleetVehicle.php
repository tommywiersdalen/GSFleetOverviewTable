<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FleetVehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'km_driven',
        'total_drive_time_in_minutes',
        'tonnage_kg',
        'status',
        'last_driven_date',
    ];
}
