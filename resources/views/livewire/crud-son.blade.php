<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="flex items-center justify-between">
            <!--Input de busqueda   -->
            <div class="flex items-center p-2 rounded-md flex-1">
                <label class=" w-full relative text-gray-400 focus-within:text-gray-600 block">
                    <svg class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 25 25"  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <x-jet-input type="text" wire:model="search" class="w-full block pl-14" placeholder="Buscar associado..."/>
                </label>
            </div>
            <!--Boton nuevo   -->
            <div class="lg:ml-40 ml-10 space-x-8">
                <button wire:click="create()" class="bg-rose-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" >
                    <i class="fa fa-users" aria-hidden="true">Nuevo</i>
                </button>
                @if($isOpen)
                    @include('livewire.associate_create')
                @endif
            </div>
        </div>
        <!--Tabla lista de items   -->
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-emerald-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3 cursor-pointer">ID</td>
                  <td scope="col" class="px-6 py-3 cursor-pointer">Nombre Completo</td>
                  <td scope="col" class="px-6 py-3">DNI</td>
                  <td scope="col" class="px-6 py-3">N.Academico</td>
                  <td scope="col" class="px-6 py-3 cursor-pointer">ID_As.</td>
                  <td scope="col" class="px-6 py-3">Opciones</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach ($sons as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-300 text-white">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{$item->fullname}}</td>
                  <td class="px-6 py-4">{{$item->dni}}</td>
                  <td class="px-6 py-4">{{$item->level}}</td>
                  <td class="px-6 py-4">{{$item->associate_id}}</td>
                  <td class="px-6 py-4">
                    {{-- @livewire('cliente-edit',['cliente'=>$item],key($item->id)) --}}
                    <x-jet-button wire:click="edit({{$item}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-edit"></i>
                    </x-jet-button>
                    <x-jet-danger-button wire:click="$emit('deleteItem',{{$item->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-trash"></i>
                    </x-jet-danger-button>
                  </td>
                </tr>
                @endforeach
                <!-- More people... -->
              </tbody>
            </table>
        </div>
        {{-- @if(!$sons->count())
            No existe ningun registro conincidente
        @endif
        @if($sons->hasPages())
            <div class="px-6 py-3">
            {{$sons->links()}}
            </div>
        @endif --}}

        </div>
      </div>

      <!--Scripts - Sweetalert   -->
      @push('js')
        <script>
          Livewire.on('deleteItem',id=>{
            Swal.fire({
              title: 'Estas seguro?',
              text: "¡No podrás revertir esto!",
              icon: 'advertencia',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: '¡Sí, bórralo!'
              }).then((result) => {
                if (result.isConfirmed) {
                    //alert("del");
                    Livewire.emitTo('crud-son','delete',id);
                    Swal.fire(
                        '¡Eliminado!',
                        'Su archivo ha sido eliminado.',
                        'éxito'
                    )

                }
              })
          });
        </script>
      @endpush
</div>
