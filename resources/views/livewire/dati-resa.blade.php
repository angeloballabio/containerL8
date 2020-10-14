<div class="shadow p-2 mb-2 bg-white rounded">
    <div class="inline-flex w-full mb-1">
        {{-- <div class="shadow p-2 mb-2 bg-white rounded">
            <div class="row">
                <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aggiungi">Aggiungi resa</button>
                {{-- </div> --}}
                @if($resa_id)
                {{-- <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="modifica()">Modifica resa</button>
                {{-- </div> --}}
                @endif
                @if($resa_id)
                {{-- <div class="col-4"> --}}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="cancella">Cancella resa</button>
                {{-- </div> --}}
                @endif
            {{-- </div> --}}
        {{-- </div> --}}
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="inline-flex w-full mb-1">
            {{-- <div class="row"> --}}
                <div class="w-1/3">
                    @error('iso') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="iso" class="w-1/3" style="text-align: right;">ISO:</label>
                    <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="iso">
                </div>
                <div class="w-2/3">
                    @error('descrizione') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="descrizione" class="w-1/3" style="text-align: right;">Descrizione :</label>
                    <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="descrizione">

                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>

