<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TruckCompany;
use App\Models\Driver;
use App\Models\User;

class DriverController extends Controller
{
    public function index(){
        $drivers = Driver::all();
        return view('agent.drivers.index')->with('drivers', $drivers);
    }

    public function create()
    {
        $truckcompany = TruckCompany::all();
        return view('agent.drivers.add')->with('truckcompany', $truckcompany);;
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
            'name' => 'required',
            'company_id' => 'required',
            'license' => 'required',
            'contact'=>'required',
            'address'=>'nullable',
            'status'=>'nullable',
            
        ]);

        Driver::create($validated);
        return redirect('/drivers')->with('success', 'Driver added successfully');
    }

    public function edit(string $id){

        $driver = Driver::find($id);
        $truckcompany = TruckCompany::all();
       
        return view('agent.drivers.edit', compact('driver','truckcompany'));
    }

    public function update(Request $request)
    {
        $id=$request->input('id');
        $item = Driver::find($id);
        $item->name = $request->input('name');
        $item->company_id = $request->input('company_id');
        $item->license = $request->input('license');
        $item->contact = $request->input('contact');
        $item->address = $request->input('address');
        // $item->status = $request->input('status');

        $item->save();
        return redirect('/drivers')->with('success', 'Driver updated successfully');
    }

    public function delete(){
        return view('agent.drivers.delete');
    }
}
