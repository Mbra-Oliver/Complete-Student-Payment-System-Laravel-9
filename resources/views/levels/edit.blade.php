<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update level') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-3 bg-white shadow-md">

                <form method="POST" action="{{ route('levels.update', $level) }}">
                    @csrf
                    @method('put')
        
                    
                        @error('libelle')
                            <span class="p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                        @enderror
                        @error('amount')
                            <span class="p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
                        @enderror
                    
                    <div>
                        <x-jet-label for="" value="{{ __('Update Libelle') }}" />
                        <input id="libelle" name="libelle" class="block mt-1 w-full rounded-md borger-gray-300 border-2 p-4" value={{ $level->libelle }} />
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Update Amount') }}" />
                        <input id="amount" name="amount" class="block mt-1 w-full rounded-md borger-gray-300 border-2 p-4" value={{ $level->amount }} />
                    </div>
                    <div class="flex items-center justify-end mt-4">
        
                        <button class="ml-4 p-2 bg-green-300 rounded-md text-white">
                          Update Level
                        </button>
                    </div>
                </form>
            </-card>
        
        </div>
    </div>
</x-app-layout>
