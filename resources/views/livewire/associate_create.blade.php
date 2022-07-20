<div>
    <x-jet-dialog-modal wire:model="isOpen">
      <x-slot name="title">
        <h3>Registro nuevo associado</h3>
      </x-slot>
      <x-slot name="content">
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
              <x-jet-label value="Seleccione Usuario" class="font-bold"/>
              {!! Form::select('user_id',$users,null,["wire:model.defer"=>"associate.user_id",'placeholder'=>'Seleccione Opción','class'=>'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full']) !!}
              <x-jet-input-error for="associate.user_id"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
              <x-jet-label value="Seleccione Periodo" class="font-bold"/>
              {!! Form::select('period_id',$periods,null,["wire:model.defer"=>"associate.period_id",'placeholder'=>'Seleccione Opción','class'=>'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full']) !!}
              <x-jet-input-error for="associate.period_id"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Nombre associado" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.name" class="w-full"/>
                <x-jet-input-error for="associate.name"/>
            </div>
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Apellido associado" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.lastname" class="w-full"/>
                <x-jet-input-error for="associate.lastname"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="DNI" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.dni" class="w-full"/>
                <x-jet-input-error for="associate.dni"/>
            </div>
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Telefono" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.phone" class="w-full"/>
                <x-jet-input-error for="associate.phone"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Fecha de nacimiento" class="font-bold"/>
                <x-jet-input type="date" wire:model.defer="associate.birthdate" class="w-full"/>
                <x-jet-input-error for="associate.birthdate"/>
            </div>
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Email" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.email" class="w-full"/>
                <x-jet-input-error for="associate.email"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Direccion" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="associate.address" class="w-full"/>
                <x-jet-input-error for="associate.address"/>
            </div>
        </div>

      </x-slot>
      <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('isOpen',false)" class="mx-2">Cancelar</x-jet-secondary-button>
        {{-- <x-jet-button wire:click="store" wire:loading.remove wire:target="store">Registrar</x-jet-button> --}}
        <x-jet-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store" class="disabled:opacity-25">
          Registrar
        </x-jet-button>
        {{-- <span wire:loading wire:target="store">Cargando...</span> --}}
      </x-slot>

    </x-jet-dialog-modal>
    @push('js')

    @endpush
</div>
