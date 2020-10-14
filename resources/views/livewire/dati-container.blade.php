<div class="shadow p-2 mb-2 bg-white rounded">
    <div class="inline-flex w-full mb-1">
        {{-- <div class="shadow p-2 mb-2 bg-white rounded">
            <div class="row">
                <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aggiungi">Aggiungi container</button>
                {{-- </div> --}}
                @if($container_id)
                {{-- <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="modifica()">Modifica container</button>
               {{--  </div> --}}
                @endif
                @if($container_id)
                {{-- <div class="col-4"> --}}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="cancella">Cancella container</button>
                {{-- </div> --}}
                @endif
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="inline-flex w-full mb-1">
            {{-- <div class="row"> --}}
                <div class="w-full">
                    @error('tipo') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="nome" class="w-1/3" style="text-align: right;">Tipo :</label>
                    <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="tipo">

                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
