<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Vehicles;
use App\Models\Driver;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Rules\BookingDuration;

class BookingController extends Controller
{
    //
    public function index()
    {
        $bookings = Booking::latest()->paginate(10);
        return view('agent.bookings.index', compact('bookings'));
    }

    public function create()
    {
        $vehicles = Vehicles::all();
        // dd($vehicles);
        $drivers = Driver::all();
        return view('agent.bookings.create', compact('vehicles', 'drivers'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'start_time' => ['required', 'date', new BookingDuration($request->input('vehicle_id'))],
            // 'start_time' => ['required', 'date', new BookingDuration],
            'end_time' => ['required', 'date', 'after:start_time'],
            'vehicle_id' => ['required', 'exists:vehicles,id'],// Assuming 'vehicles' table has 'id' column
            'customer_name' => ['required', 'string'],
            'customer_email' => ['required', 'email'],
            'driver_id' => ['required', 'exists:drivers,id'], // Assuming 'drivers' table has 'id' column
            // Add other necessary validation rules
        ]);

// dd($request);
        // Retrieve or create the user based on provided details
        $user = User::updateOrCreate(
            ['email' => $request->input('customer_email')], // Assuming email as unique identifier
            [
                'name' => $request->input('customer_name'),
                'password' => Hash::make('Password123$'),
            ]
        );

         // Check if the user was just created
         $isNewUser = $user->wasRecentlyCreated;

         // If it's a new user, or if the user doesn't have a password set (for existing user)
         if ($isNewUser || !$user->password) {
             $user->password = Hash::make('Password123$'); // Set default password for new user
         }

        // Create or update customer details
        $customer = $user->customer ?: new Customers();
        $customer->user_id = $user->id;
        $customer->phone = $request->input('customer_phone');
        $customer->name = $request->input('customer_name');
        $customer->address = $request->input('customer_address');
        // Add other customer details you want to update or create
        $customer->save();


        // dd($request);
        
        // Create a new user with default password
//         $user = new User();
//         $user->name = $validatedData['customer_name'];
//         $user->email = $validatedData['customer_email'];
//         $user->password = Hash::make('Password123$'); // Set default password
//         $user->save();
// dd($user->id);
        
//         // Create a new customer
//         $customer = new Customers();
//         $customer->name = $validatedData['customer_name'];
//         $customer->phone = $request->input('customer_phone');
//         $customer->user_id = $user->id; // Assign the newly created user's ID
//         // Add more fields from the request if needed
//         $customer->save();
//         dd($request->all());
        // Check vehicle availability
        // $vehicleId = $request->input('vehicle_id');
        // $startTime = $request->input('start_time');
        // $endTime = $request->input('end_time');
        // $request->add(['user_id' => $user->id]); // Assign the newly created user's ID
        $request->merge(['user_id' => "$user->id" ]);
// dd($request->all());
        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
}
