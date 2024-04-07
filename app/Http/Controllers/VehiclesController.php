<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TruckCompany;
use App\Models\Vehicles;
use App\Models\GPSData;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicles::all();
        // dd($vehicles);
        return view('agent.vehicleslist')->with('vehicles', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $truckcompany = TruckCompany::all();
        // dd($truckcompany);
        return view('agent.vehicles')->with('truckcompany', $truckcompany);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
           'createdBy' => auth()->user()->id
        ]);
        $validated = $request->validate([
            'vehiclename' => 'required',
            'vehiclereg' => 'required',
            'companyId' => 'required',
            'gpsId' => 'required',
            'vehiclechasis'=>'nullable',
            'createdBy'=>'nullable',
            'lastlocation'=>'nullable',
            
        ]);

        Vehicles::create($validated);
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $vehicle = Vehicles::find($id);
        $truckcompany = TruckCompany::all();
       
        return view('agent.edit', compact('vehicle','truckcompany'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $item = Vehicles::find($id);
        $item->vehiclename = $request->input('vehiclename');
        $item->vehiclereg = $request->input('vehiclereg');
        $item->vehiclechasis = $request->input('vehiclechasis');
        $item->gpsId = $request->input('gpsId');

        $item->save();
        return redirect('/vehicles/index')->with('success', 'Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getVehiclePositions()
    {
        $gpsData = GPSData::where('vehicle_id',1)->get(); // Fetch GPS data from the database
        //dd($gpsData);
        return view('agent.map')->with('gpsData',$gpsData); // Return GPS data as JSON
    }
}
