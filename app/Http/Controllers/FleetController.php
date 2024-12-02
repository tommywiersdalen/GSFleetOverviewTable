<?php

namespace App\Http\Controllers;

use App\Models\FleetVehicle;
use Illuminate\Http\Request;

class FleetController extends Controller
{
    public function index()
    {
        $fleet_Vehicles = FleetVehicle::all();
        return inertia(
            'Fleet/Index',
            [
                'fleet_vehicles' => $fleet_Vehicles
            ]
        );
    }
}
