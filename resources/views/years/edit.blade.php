<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New year') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white shadow-md">

                <form method="POST" action="{{ route('years.update', $year) }}">
                    @csrf
                    @method('put')
        
                    
                        @error('libelle')
                            <span class="p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                        @enderror
                    
                    <div>
                        <x-jet-label for="" value="{{ __('Update school Year') }}" />
                        <input id="libelle" name="libelle" class="block mt-1 w-full rounded-md borger-gray-300 border-2 p-4" value={{ $year->libelle }} />
                    </div>
                    <div class="flex items-center justify-end mt-4">
        
                        <button class="ml-4 p-2 bg-green-300 rounded-md text-white">
                          Update Year
                        </button>
                    </div>
                </form>
            </-card>
        
        </div>
    </div>
</x-app-layout>
