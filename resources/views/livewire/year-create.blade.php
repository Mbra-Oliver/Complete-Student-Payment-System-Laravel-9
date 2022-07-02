    <div class="p-3 bg-white shadow-md">

        <form method="POST" wire:submit.prevent='store'>
            @csrf
            @method('post')

           
            <div>
                <x-jet-label for="" value="{{ __('School Year') }}" />
                <input id="" class="block mt-1 w-full rounded-md borger-gray-300" placeholder="Add a school, year here" type="text" wire:model='year' />
            </div>
            <div>
                @error('year')
                <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
            @enderror
            </div>
            <div class="flex items-center justify-end mt-4">

                <button class="ml-4 p-2 bg-gray-600 rounded-md text-white">
                  Add Year
                </button>
            </div>
        </form>
    </-card>
