<div>
  <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
      <h4>School Info</h4>
  
  </div>

  <div class="mt-5">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
          <div class="flex justify-between">
              <h4>Active & unactive School Year</h4>
              <a href="{{ route('years.create') }}" class="bg-blue-200 rounded-md shadow p-2 text-white">New year</a>
          </div>
      
          <div class="flex flex-col">
            
            @if (session('message'))
            
            <span class="block p-2 bg-green-300 text-white rounded-sm shadow">{{ session('message') }}</span>
       
            @endif
              <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="overflow-hidden">
                    <table class="min-w-full text-center">
                      <thead class="border-b bg-gray-50">
                        <tr>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            #
                          </th>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Year
                          </th>
                          <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                            Status
                          </th>
                        </tr>
                      </thead class="border-b">
                      <tbody>
                        @forelse ($schoolyears as $year)

                        <tr class="bg-white border-b">
                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $year->id }}</td>
                          <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            {{ $year->libelle }}
                          </td>
                          <td>
                            
                            @if ($year->active == 1)
                                <span class="text-xs text-white p-1 bg-green-300 rounded-md cursor-pointer" wire:click='$emit("toggle_year", {{ $year->id }})'>Active - Turn Inactive</span>
                            @else
                                <span class="text-xs text-white p-1 bg-red-300 rounded-md cursor-pointer" wire:click='$emit("toggle_year", {{ $year->id }})'>Inactive -Turn Active</span>
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('years.edit', $year) }}" class="text-xs text-white p-1 bg-blue-400 rounded-md cursor-pointer">Edit </a>
                          </td>
                        </tr>                            
                        @empty
                            
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      </div>
  </div>
</div>
