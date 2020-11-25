<div>
    <h1 class="text-center text-xl font-semibold">Importa fattura manuale </h1>
    <div>
        <div class="inline-flex w-full">
            <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                <thead>
                    <tr>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione Uk</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione It</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Codice articolo</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Colli</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Pezzi</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Um. Mis.</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Val. unitario</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Lordo Kg.</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Netto Kg.</th>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Valore</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articoli as $articolo)
                    <tr>
                        @if ($selezionato == $articolo->id)
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->uk_descrizione }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->it_descrizione }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->codice_prodotto }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->colli }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->pezzi }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->unita_misura }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_unitario }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_lordo }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_netto }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_totale }}</td>
                        @else
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->uk_descrizione }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->it_descrizione }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->codice_prodotto }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->colli }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->pezzi }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->unita_misura }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_unitario }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_lordo }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_netto }}</td>
                        <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_totale }}</td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="inline-flex w-full mt-4 bg-gray-300 rounded">
            <div class="w-1/3 ml-3 mr-3">
                <label for="descrizioneuk" class="w-full">Descrizione articolo uk
                <input type="text" class="w-full border @error('descrizioneuk') non valida @enderror " style="height: 20px"  wire:model="descrizione_uk" value="{{ old('descrizioneuk') }}"></label>
                @error('descrizione_uk') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/3 ml-3 mr-3">
                <label for="descrizioneit" class="w-full">Descrizione articolo it :
                <input type="text" class="w-full border" style="height: 20px" wire:model="descrizione_it"></label>
                @error('descrizione_it') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/3 ml-3 mr-3">
                <label for="codicearticolo" class="w-full">Codice articolo :
                <input type="text" class="w-full border" style="height: 20px" wire:model="codice_prodotto"></label>
                @error('codice_prodotto') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
        </div>
        <div class="inline-flex w-full {{-- pb-2 mb-2 --}} bg-gray-300 rounded">
            <div class="w-1/7 ml-3 mr-3">
                <label for="colli" class="w-full">Colli :
                <input type="text" class="w-full border @error('colli') non valida @enderror " style="height: 20px"  wire:model="colli" value="{{ old('colli') }}"></label>
                @error('colli') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="pezzi" class="w-full">Pezzi :
                <input type="text" class="w-full border" style="height: 20px" wire:model="pezzi"></label>
                @error('pezzi') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="unitamisura" class="w-full">Unita misura :
                <input type="text" class="w-full border" style="height: 20px" wire:model="unita_misura"></label>
                @error('unita_misura') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="valoreunitario" class="w-full">Valore unitario :
                <input type="text" class="w-full border" style="height: 20px" wire:model="prezzo_unitario"></label>
                @error('valore_unitario') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="pesolordo" class="w-full">Lordo Kg. :
                <input type="text" class="w-full border" style="height: 20px" wire:model="peso_lordo"></label>
                @error('peso_lordo') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="pesonetto" class="w-full">Netto Kg. :
                <input type="text" class="w-full border" style="height: 20px" wire:model="peso_netto"></label>
                @error('peso_netto') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/7 ml-3 mr-3">
                <label for="prezzototale" class="w-full">Valore :
                <input type="text" class="w-full border" style="height: 20px" wire:model="prezzo_totale"></label>
                @error('prezzo_totale') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
        </div>
        <div class="inline-flex w-full pb-2 mb-2 pt-4 bg-gray-300 rounded">
            <div class="w-1/7 ml-3 mr-3">
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;">Importa fattura</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;">Modifica</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;">Cancella</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;">Salva distinta</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='ritorna'>Termina</button>
                {{-- <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="carica_fattura">Importa fattura</button> --}}
            </div>
        </div>
    </div>
</div>
