<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex">
            <div class="flex justify-center mx-auto p-6">
                <div class="bg-white rounded-lg border border-gray-200 w-96 text-gray-900 shadow-md">
                    <div class="flex">
                        <button wire:click="create()" class="btn-indigo text-xs mx-2">
                            <i class="fa fa-users" aria-hidden="true"></i>Agregar
                        </button>
                        <p class="block px-6 py-2 border-b border-gray-200 w-full rounded-t-lg bg-indigo-600 text-white text-center"></p>
                    </div>
                    @if($isOpen)
                        @include('livewire.period_create')
                    @endif
                    @foreach ($periods as $item)
                        <a wire:click="changeStatus{{$item}}" class="block px-6 py-2 border-b border-gray-200 w-full hover:bg-gray-100">
                            <div class="flex justify-between">
                                <div><i class="fa fa-cube" aria-hidden="true"></i> {{$item->name}}</div>
                                <div class="text-white">
                                    <span class="{{$item->status=="Activo"?"btn-green":"btn-pink"}}">{{$item->status}}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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
                Livewire.emitTo('period-livewire','delete',id);
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
