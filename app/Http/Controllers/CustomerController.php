<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customers::all();
        return view('agent.customers.index')->with('customers', $customers);
    }

    public function create()
    {
        return view('agent.customers.add');
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
            'phone'=>'required',
            'address'=>'nullable',
            'status'=>'nullable',
            
        ]);

        Customers::create($validated);
        return redirect('/customer')->with('success', 'Customer added successfully');
    }

    public function edit(string $id){

        $customers = Customers::find($id);
       
        return view('agent.customers.edit', compact('customers'));
    }

    public function update(Request $request)
    {
        $id=$request->input('id');
        $item = Customers::find($id);
        $item->name = $request->input('name');
        $item->phone = $request->input('phone');
        $item->address = $request->input('address');
        // $item->status = $request->input('status');

        $item->save();
        return redirect('/customer')->with('success', 'Customer updated successfully');
    }

    public function delete(){
        return view('agent.customers.delete');
    }
}
