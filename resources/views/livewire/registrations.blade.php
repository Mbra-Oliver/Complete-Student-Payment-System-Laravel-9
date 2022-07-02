<div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        <h4>Students Datas</h4>
    
    </div>
  
    <div class="mt-5">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <div class="flex justify-between">
                <h4>Registered student for current year</h4>
                <a href="{{ route('registrations.create') }}" class="bg-blue-200 rounded-md shadow p-2 text-white">New Registration</a>
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
                              School Year
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              Matricule
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              FullName
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              Classroom
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                              Action
                            </th>
                          </tr>
                        </thead class="border-b">
                        <tbody>
                          @forelse ($registrations as $registration)
  
                          <tr class="bg-white border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $registration->id }}</td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              {{ $registration->year->libelle }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              {{ $registration->student->matricule }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              {{ $registration->student->lastname.' '.$registration->student->firstname }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              {{ $registration->classe->libelle }}
                            </td>
                            
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                              <a href="{{ route('registrations.edit', $registration) }}">Edit </a>
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
  