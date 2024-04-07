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
                    <form action="{{ route('agency.store') }}" method="post" class="max-w-lg">
                        @csrf
                        <div class="space-y-6">
                        <div>
                            <x-input-label for="companyname" :value="__('companyname')" />
                            <x-text-input id="companyname" name="companyname" type="text" class="mt-1 block w-full"  required autofocus autocomplete="companyname" />
                            <x-input-error class="mt-2" :messages="$errors->get('companyname')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('address')" />
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