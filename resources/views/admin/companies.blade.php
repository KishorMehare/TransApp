<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agencies
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('agency.create') }}" class="px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">Create</a>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 max-w-2xl divide-y">
                    @forelse ($truckcompany as $class)
                  <div class="py-10">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">Agency</p>
                           <span class="text-slate-600 text-sm">{{ $class->companyname }} </span>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">Address</p>
                           <p class="text-sm">{{ $class->address }}</p>
                        </div>
                     </div>
                     @can('delete', $class)
                     <div class="mt-1 text-right">
                        <form method="post" action="{{ route('agency.destroy', $class) }}">
                           @csrf
                           @method('DELETE')
                           <x-danger-button class="px-3 py-1">Cancel</x-danger-button>
                        </form>
                     </div>
                     @endcan
                  </div>
                  @empty
                  <div>
                     <p>You don't have any company</p>
                     <a class="inline-block mt-6 underline text-sm" href="{{ route('agency.create') }}">
                        Create
                     </a>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>