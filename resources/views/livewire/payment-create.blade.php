<div class="p-3 bg-white shadow-md">

    <span class=" text-red-500 text-md">You will not able to cancel this operation after confirm</span>
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
            <x-jet-label for="" value="{{ __('How much the student want to paid ?') }}" />
            <input type="text" class="block mt-1 w-full rounded-md border-gray-300" wire:model.lazy='paidmount'>
        </div>

        <div>
            <x-jet-label for="" value="{{ __('Rest to pay') }}" />
            <input type="text" class="block mt-1 w-full rounded-md border-gray-300" disabled readonly wire:model='resttopaid'>
        </div>
        
        @if ($error)
        <span class="block p-2 bg-red-500 text-white rounded-sm shadow">{{ $error_text }}</span>
        @else

                <div class="flex items-center justify-end mt-4">

                    <button class="ml-4 p-2 bg-gray-600 rounded-md text-white" {{ $error  ?  'disabled': '' }}>
                        Confirm paiement
                      </button>    
            
       
        @endif
        @endif
        <div>
            @error('class_id')
            <span class=" block mt-2 p-2 bg-red-300 text-white rounded-sm shadow">{{ $message }}</span>
        @enderror
        </div>

    </form>
</div>