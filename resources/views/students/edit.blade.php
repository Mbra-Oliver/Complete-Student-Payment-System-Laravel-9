<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update student Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white shadow-md">
                <form method="POST" action="{{ route('students.update', $student) }}">
                    @csrf
                    @method('put')
            
                   
                    <div>
                        <x-jet-label for="" value="{{ __('Matricule') }}" />
                        <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" name='matricule' value="{{ $student->matricule }}" />
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Lastname') }}" />
                        <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" name='lastname' value="{{ $student->lastname }}" />
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Firstname') }}" />
                        <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" name='firstname' value="{{ $student->firstname }}" />
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Birth') }}" />
                        <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="date" name='birth' value="{{ $student->birth }}" />
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Sexe') }}" />
                       
                        <select name='sexe' class="block mt-1 w-full rounded-md border-gray-300">
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                    <div>
                        @error('matricule')
                        <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                    @enderror
                        @error('firstname')
                        <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                    @enderror
                        @error('birth')
                        <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                    @enderror
                        @error('sexe')
                        <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                    @enderror
                        @error('lastname')
                        <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="flex items-center justify-end mt-4">
            
                        <button class="ml-4 p-2 bg-gray-600 rounded-md text-white">
                          Update Student
                        </button>
                    </div>
                </form>
                
            </div>
        
        </div>
    </div>
</x-app-layout>
