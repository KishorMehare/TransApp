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
                    <a href="{{ route('register') }}" class="px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 focus:bg-purple-700 active:bg-purple-800 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">Create</a>
         
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                           
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Name
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Email
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                 Company Name
                              </th>
                              
                              <th scope="col" class="relative px-6 py-3">
                                 <span class="sr-only">Edit</span>
                              </th>
                     
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <!-- Odd row -->
                            <tr class="{{ $user->id %2==0?'bg-gray-50':'bg-white'}}">
                               <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                               {{ $user->name }}
                               </td>
                               
                               <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               {{ $user->email }}
                               </td>
                               <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                               {{ $user->truckcompany->companyname??"" }}
                               </td>
                               <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="{{ route('profile.companyuseredit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                               </td>
                            </tr>

                         @endforeach
                         
                      </tbody>
                        
                    </table>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>