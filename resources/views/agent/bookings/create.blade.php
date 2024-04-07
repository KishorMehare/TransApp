<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <!-- Form fields here -->
                        <input type="text" name="customer_name" placeholder="Customer Name">
                        <input type="text" name="customer_phone" placeholder="Customer Phone">
                        <div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Booking
                            </button>
                        </div>
                    </form> --}}

                    <form method="POST" action="{{ route('bookings.store') }}">
                        @csrf
                        <!-- Customer details -->
                        <div class="mb-4">
                            <label for="customer_email" class="block text-gray-700 text-sm font-bold mb-2">Customer Email:</label>
                            <input type="text" name="customer_email" id="customer_email" class="form-input">
                        </div>
                        <div class="mb-4">
                            <label for="customer_name" class="block text-gray-700 text-sm font-bold mb-2">Customer Name:</label>
                            <input type="text" name="customer_name" id="customer_name" class="form-input">
                        </div>
                        
                        <div class="mb-4">
                            <label for="customer_phone" class="block text-gray-700 text-sm font-bold mb-2">Customer Phone:</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-input">
                        </div>
                        <div class="mb-4">
                            <label for="customer_address" class="block text-gray-700 text-sm font-bold mb-2">Customer Address:</label>
                            <input type="text" name="customer_address" id="customer_address" class="form-input">
                        </div>

                        <div class="mb-4">
                            <label for="vehicle_id" class="block text-gray-700 text-sm font-bold mb-2">Vehicle:</label>
                            <select name="vehicle_id" id="vehicle_id" class="form-select">
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}">{{ $vehicle->vehiclename }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="driver_id" class="block text-gray-700 text-sm font-bold mb-2">Driver:</label>
                            <select name="driver_id" id="driver_id" class="form-select">
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Start Time:</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-input">
                        </div>
                        <div class="mb-4">
                            <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">End Time:</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-input">
                        </div>
                        <!-- File upload -->
                        <div class="mb-4">
                            <label for="booking_file" class="block text-gray-700 text-sm font-bold mb-2">Booking File:</label>
                            <input type="file" name="booking_file" id="booking_file" class="form-input">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Create Booking
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
