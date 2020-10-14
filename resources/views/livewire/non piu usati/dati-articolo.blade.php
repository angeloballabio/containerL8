<div class="inline-flex w-full ">

        <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="aggiungi">Aggiungi</button>
        <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="modifica">Modifica</button>
        <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="cancella">Cancella</button>
        <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="sposta">Sposta</button>
        <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="ricarica">Ricarica</button>

</div>
<div class="inline-flex w-full mb-2">
    {{-- @if ($errors->any())
        <div class="alert alert-danger col-12" role="alert">
            Mancano alcuni dati indispensabili correggi
        </div>
    @endif --}}
    <div class="w-1/2">

            <label for="descrizioneuk" class="w-full">Descrizione articolo uk : fornitore:{{ $fornitore_id }}
            <input type="text" class="w-full border @error('descrizioneuk') non valida @enderror " style="height: 20px"  wire:model="descrizione_uk" value="{{ old('descrizioneuk') }}"></label>
            @error('descrizione_uk') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
    <div class="w-1/2">
            <label for="descrizioneit" class="w-full">Descrizione articolo it :
            <input type="text" class="w-full border" style="height: 20px" wire:model="descrizione_it"></label>
            @error('descrizione_it') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
</div>
<div class="inline-flex w-full mb-2">
    <div class="w-1/4">
            <label for="vocedoganale" class="w-full">Voce doganale taric :
            <input type="text" class="w-full border mr-2" style="height: 20px" wire:model="voce_doganale"></label>
            @error('voce_doganale') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
    <div class="w-1/4">
        <label for="dirittidoganali" class="w-full">Diritti doganali :
        <input type="text" class="w-full border mr-2 ml-2" style="height: 20px" wire:model="diritti_doganali"></label>
        @error('dirittidoganali') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
    <div class="w-1/4">
        <label for="aliquota_iva" class="w-full">Iva % :
        <input type="text" class="w-full border" style="height: 20px" wire:model="aliquota_iva"></label>
        @error('aliquota_iva') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
    <div class="w-1/4">
        <label for="dirittidoganali" class="w-full">Iva :
        <input type="text" class="w-full border" style="height: 20px" wire:model="val_iva"></label>
        @error('dirittidoganali') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
    </div>
</div>
<div class="inline-flex">
    <div class="w-1/2">
        <div class="shadow p-2 mb-2 bg-gray-300 rounded">
            <div class="grid grid-cols-4 gap-0">
                <div>
                    <input type="checkbox" id="acciaio" style="height: 20px"  {{ $acciaio ? 'checked' : '' }} wire:model="acciaio"> <label for="acciaio" class="align-top" style="height: 20px">Acciaio </label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="acciaio_inox" {{ $acciaio_inox ? 'checked' : ''}} > <label for="acciaio_inox" class="align-top" style="height: 20px">Acciaio inox</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="vetro" {{ $vetro ? 'checked' : ''}} > <label for="vetro" class="align-top" style="height: 20px">Articoli in vetro</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="posateria" {{ $posateria ? 'checked' : ''}} > <label for="posateria" class="align-top" style="height: 20px">Posateria inox</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="attrezzi_cucina" {{ $attrezzi_cucina ? 'checked' : ''}} > <label for="attrezzi_cucina" class="align-top" style="height: 20px">Strumenti inox</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="plastica" {{ $plastica ? 'checked' : ''}} > <label for="plastica" class="align-top" style="height: 20px">Articoli in palstica</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="legno" {{ $legno ? 'checked' : ''}} > <label for="legno" class="align-top" style="height: 20px">Articoli legno</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="bambu" {{ $bambu ? 'checked' : ''}} > <label for="bambu" class="align-top" style="height: 20px">Articoli bambù</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="ceramica" {{ $ceramica ? 'checked' : ''}} > <label for="ceramica" class="align-top" style="height: 20px">Articoli ceramica</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="carta" {{ $carta ? 'checked' : ''}} > <label for="carta" class="align-top" style="height: 20px">Articoli pasta carta</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="pietra" {{ $pietra ? 'checked' : ''}} > <label for="pietra" class="align-top" style="height: 20px">Articoli in pietra</label>
                </div>
            </div>
        </div>
    </div>
    <div class="w-1/2">
        <div class="shadow p-2 mb-2 bg-gray-300 rounded">
            <div class="col-6 shadow p-2 mb-2 bg-gray-300 rounded">
                <div class="grid grid-cols-3 gap-0">
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="richiede_ce" {{ $richiede_ce ? 'checked' : ''}} > <label for="richiede_ce" class="align-top" style="height: 20px">Richiede CE</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="richiede_age" {{ $richiede_age ? 'checked' : ''}} > <label for="richiede_age" class="align-top" style="height: 20px">Riciede AGE</label>
                </div>
                <div>
                    <input type="checkbox"  style="height: 20px" wire:model="richiede_cites" {{ $richiede_cites ? checked : ''}} > <label for="richiede_cites" class="align-top" style="height: 20px">Richiede CITES</label>
                </div>
                <div class="">
                    <label for="" style="height: 20px">Codice articolo :</label>
                </div>
                <div class="">
                    <input type="text"  style="height: 20px" id="codicearticolo" wire:model='codicearticolo'>
                </div>
                <div class="">
                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='trova_articolo'>Trova articolo</button>
                </div>
                <div class="">
                    <label for="codicearticolo" style="height: 20px">Articolo menzionato nella descrizione :</label>
                    <input type="text"  style="height: 20px" id="trovatoarticolo" wire:model='trovatoarticolo'>
                </div>
                <div class="">
                    <label for="sposta_articolo" style="height: 20px">Sposta articolo in :</label>
                    <select  class=" float-right  custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="sposta_articolo" wire:click='spostaarticolo'>
                        <option value="0">Effettua la scelta</option>
                        @foreach ($spostaArticoli as $spostaArticolo)
                        <option value="{{$spostaArticolo->descrizione_it}} {{ $sposta_articolo == $spostaArticolo->descrizione_it ? 'selected' : '' }}">{{$spostaArticolo->descrizione_it}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden"  style="height: 20px" wire:model="ordine_id" value="{{ $ordine_id }}">
                </div>
        </div>
    </div>
</div>
