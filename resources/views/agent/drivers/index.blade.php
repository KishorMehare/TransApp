<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Drivers List
        </h2>
    </x-slot>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
            <a href="{{ route('drivers.create') }}" class="px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150" style="margin-left: 1000px;">Create</a>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 10px;">
                <div class="p-10 text-gray-900 max-w-2xl divide-y">
                  <div class="flex flex-col">
                     <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                 <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                    <tr>
                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Company Name
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Name
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             License
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Contact
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Address
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Status
                                          </th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                             Date
                                          </th>
                                          
                                          <th scope="col" class="relative px-6 py-3">
                                             <span class="sr-only">Edit</span>
                                          </th>
                                 
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($drivers as $driver)
                                          <!-- Odd row -->
                                          <tr class="{{ $driver->id %2==0?'bg-gray-50':'bg-white'}}">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                             {{ $driver->name }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                             {{ $driver->name }}
                                             </td>
                                             
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             {{ $driver->license }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             {{ $driver->contact }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             {{ $driver->address }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             {{ $driver->status }}
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                             {{ $driver->created_at }}
                                             </td>
                                             {{-- <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('drivers.edit', ['id' => $driver->id]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                             </td> --}}
                                          </tr>

                                       @endforeach
                                       
                                    </tbody>
                                 </table>
                              </div>
                        </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>