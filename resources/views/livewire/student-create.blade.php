<div class="p-3 bg-white shadow-md">

    <form method="POST" wire:submit.prevent='store'>
        @csrf
        @method('post')

       
        <div>
            <x-jet-label for="" value="{{ __('Matricule') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" wire:model='matricule' />
        </div>
        <div>
            <x-jet-label for="" value="{{ __('Lastname') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" wire:model='lastname' />
        </div>
        <div>
            <x-jet-label for="" value="{{ __('Firstname') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" wire:model='firstname' />
        </div>
        <div>
            <x-jet-label for="" value="{{ __('Birth') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="date" wire:model='birth' />
        </div>
        <div>
            <x-jet-label for="" value="{{ __('Sexe') }}" />
           
            <select wire:model='sexe' class="block mt-1 w-full rounded-md border-gray-300">
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
              Add Student
            </button>
        </div>
    </form>
</div>
