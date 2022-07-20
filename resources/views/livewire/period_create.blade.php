<div>
    <x-jet-dialog-modal wire:model="isOpen">
      <x-slot name="title">
        <h3>Registro nuevo periodo</h3>
      </x-slot>
      <x-slot name="content">
        <div class="flex justify-between mx-2 mb-6">
            <div class="flex justify-between mx-2 mb-6">
                <div class="mb-2 md:mr-2 md:mb-0 w-full">
                  <x-jet-label value="Associados" class="font-bold"/>
                  {!! Form::select('associate_id',$associates,null,["wire:model.defer"=>"period.associate_id",'placeholder'=>'Seleccione Opción','class'=>'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full']) !!}
                  <x-jet-input-error for="associate.associate_id"/>
                </div>
            </div>
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Nombre Periodo" class="font-bold"/>
                <x-jet-input type="text" wire:model.defer="period.name" class="w-full"/>
                <x-jet-input-error for="period.name"/>
            </div>
        </div>
        <div class="flex justify-between mx-2 mb-6">
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Fecha Inicio" class="font-bold"/>
                <x-jet-input type="date" wire:model.defer="period.start_date" class="w-full"/>
                <x-jet-input-error for="period.start_date"/>
            </div>
            <div class="mb-2 md:mr-2 md:mb-0 w-full">
                <x-jet-label value="Fecha Fin" class="font-bold"/>
                <x-jet-input type="date" wire:model.defer="period.end_date" class="w-full"/>
                <x-jet-input-error for="period.end_date"/>
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
