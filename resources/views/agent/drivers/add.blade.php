<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Driver
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900">
                    <form action="{{ route('drivers.store') }}" method="post" class="max-w-lg">
                        @csrf
                        <div class="space-y-6">
                        
                        <div>
                            <label class="text-sm">Select Company</label>
                            <select name="company_id" class="block mt-2 w-full border-gray-300 focus:ring-0 focus:border-gray-500">
                                <option value="">-- Select --</option>
                                @foreach ($truckcompany as $company)
                                <option value="{{ $company->id }}">{{ $company->companyname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="license" :value="__('License')" />
                            <x-text-input id="license" name="license" type="text" class="mt-1 block w-full"  required autofocus autocomplete="license" />
                            <x-input-error class="mt-2" :messages="$errors->get('license')" />
                        </div>
                        <div>
                            <x-input-label for="contact" :value="__('Contact')" />
                            <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full"  required autofocus autocomplete="contact" />
                            <x-input-error class="mt-2" :messages="$errors->get('contact')" />
                        </div>
                        
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full"  required autofocus autocomplete="address" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
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