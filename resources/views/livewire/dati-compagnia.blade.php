<div class="shadow p-2 mb-2 bg-white rounded">
    <div class="inline-flex w-full mb-1">
        {{-- <div class="shadow p-2 mb-2 bg-white rounded">
            <div class="row"> --}}
                {{-- <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aggiungi">Aggiungi compagnia</button>
                {{-- </div> --}}
                @if($compagnia_id)
                {{-- <div class="col-4"> --}}
                    <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="modifica()">Modifica compagnia</button>
                {{-- </div> --}}
                @endif
                @if($compagnia_id)
                {{-- <div class="col-4"> --}}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="cancella">Cancella compagnia</button>
                {{-- </div> --}}
                @endif
            {{-- </div>
        </div> --}}
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="inline-flex w-full mb-1">
            {{-- <div class="row"> --}}
                <div class="w-full">
                    @error('nome') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="nome" class="w-1/4" style="text-align: right;">Nome :</label>
                    <input type="text" class="w-3/4 border p-1" style="height: 20px" wire:model="nome">

                </div>
        </div>
        <div class="inline-flex w-full mb-1">
                <div class="w-full">
                    @error('indirizzo_web') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="indirizzo-web" class="w-1/4" style="text-align: right;">Indirizzo web :</label>
                    <input type="text" class="w-3/4 border p-1" style="height: 20px" wire:model="indirizzo_web">

                </div>
        </div>
        <div class="inline-flex w-full mb-1">
                <div class="w-full">
                    @error('contatto') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    <label for="contatto" class="w-1/4" style="text-align: right;">contatto :</label>
                    <input type="text" class="w-3/4 border p-1" style="height: 20px" wire:model="contatto">

                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
