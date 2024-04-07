<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GPSData;
use App\Models\Vehicles;
class GPSDataController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming JSON data
        $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
            'gps_id'    => 'required',
            'timestamp' => 'required'
            // Add validation rules for other fields if needed
        ]);

        // Retrieve the vehicle_id based on the provided gps_id
        $vehicle = Vehicles::where('gpsid', $request->gps_id)->first();

        if (!$vehicle) {
            return response()->json(['error' => 'Vehicle not found'], 404);
        }
        // Create a new GpsData instance and save it to the database
        $gpsData = new GPSData();
        $gpsData->latitude = $request->latitude;
        $gpsData->longitude = $request->longitude;
        $gpsData->gps_id = $request->gps_id;
        $gpsData->timestamp = $request->timestamp;
        $gpsData->vehicle_id = $vehicle->id;
        // Set other fields here if needed
        $gpsData->save();

        return response()->json(['message' => 'GPS data stored successfully'], 201);
    }
}
