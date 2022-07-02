<div class="p-3 bg-white shadow-md">

    <form method="POST" wire:submit.prevent='store'>
        @csrf
        @method('post')

       
        <div>
            <x-jet-label for="" value="{{ __('Matricule') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" wire:model.lazy='matricule' />
        </div>

        <div>
            <x-jet-label for="" value="{{ __('Student Full Name') }}" />
            <input id="" class="block mt-1 w-full rounded-md borger-gray-300"  type="text" wire:model='fullname' readonly />
        </div>
        @if($studentFound)
        <div>
            <x-jet-label for="" value="{{ __('Choose Level') }}" />
            
            <select wire:model='level_id' class="block mt-1 w-full rounded-md border-gray-300">
                <option value=""></option>
                @foreach ($levels as $level)
                <option value="{{ $level->id }}">{{ $level->libelle }}</option>
                @endforeach
            </select>
        </div>
        
            @if($level_id)
            
            <div>
                <x-jet-label for="" value="{{ __('Choose Classroom') }}" />
                
                <select wire:model='class_id' class="block mt-1 w-full rounded-md border-gray-300">
                    <option value=""></option>
                    @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->libelle }}</option>
                    @endforeach
                </select>
            </div>

            @endif

            @if ($error)

            <span class="block p-2 bg-red-500 text-white rounded-sm shadow">{{ $error_text }}</span>
                @else
                <div class="flex items-center justify-end mt-4">

                    @if ($student_id)
                    <button class="ml-4 p-2 bg-gray-600 rounded-md text-white" {{ $class_id != null ? '': 'disabled' }}>
                        Confirm registration
                      </button>    
                    @else
                    <button class="ml-4 p-2 bg-gray-600 cursor-unavailable rounded-md text-white" disabled>
                        Loading...
                      </button>
                    @endif
                </div>
            @endif
            
       
        @endif

        <div>
            @error('class_id')
            <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
        @enderror
        </div>

    </form>
</div>