<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Truck Agency
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900">
                    <form action="{{ route('vehicles.store') }}" method="post" class="max-w-lg">
                        @csrf
                        <div class="space-y-6">
                        <div>
                            <x-input-label for="vehiclename" :value="__('vehiclename')" />
                            <x-text-input id="vehiclename" name="vehiclename" type="text" class="mt-1 block w-full"  required autofocus autocomplete="vehiclename" />
                            <x-input-error class="mt-2" :messages="$errors->get('vehiclename')" />
                        </div>
                        <div>
                                <label class="text-sm">Select Company</label>
                                <select name="companyId" class="block mt-2 w-full border-gray-300 focus:ring-0 focus:border-gray-500">
                                    @foreach ($truckcompany as $company)
                                    <option value="{{ $company->id }}">{{ $company->companyname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        <div>
                            <x-input-label for="vehiclereg" :value="__('vehiclereg')" />
                            <x-text-input id="vehiclereg" name="vehiclereg" type="text" class="mt-1 block w-full"  required autofocus autocomplete="vehiclereg" />
                            <x-input-error class="mt-2" :messages="$errors->get('vehiclereg')" />
                        </div>
                        <div>
                            <x-input-label for="vehiclechasis" :value="__('vehiclechasis')" />
                            <x-text-input id="vehiclechasis" name="vehiclechasis" type="text" class="mt-1 block w-full"  required autofocus autocomplete="vehiclechasis" />
                            <x-input-error class="mt-2" :messages="$errors->get('vehiclechasis')" />
                        </div>
                        
                        <div>
                            <x-input-label for="gpsId" :value="__('GPSId')" />
                            <x-text-input id="gpsId" name="gpsId" type="text" class="mt-1 block w-full"  required autofocus autocomplete="gpsId" />
                            <x-input-error class="mt-2" :messages="$errors->get('gpsId')" />
                        </div>
                        
                            
                            <div>
                                <x-primary-button>Create</x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>