<div>
    <h1 class="text-center text-xl font-semibold">Importa fattura manuale </h1>
    <div>
        <div class='inline-flex w-full'>
            <div class="w-5/6">
                {{-- @livewire('tabella-fattura') --}}
                <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione Uk</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione It</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Codice articolo</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Colli</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Pezzi</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Un. Mis.</th>
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
                            <td class="text-right" style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_totale }}</td>
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

                <span class="ml-3">Da {{ $articoli_skip + 1 }} a {{ $articoli_take + $articoli_skip  }} di {{ $articoli_count }}</span><br>
                <button  type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 ml-3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='diminuisci_articoli'>Precedente</button> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aumenta_articoli">Prossimo</button>



            </div>
            <div class=" w-1/6">
               {{--  @livewire('tabella-gruppi') --}}
               <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                <thead>
                    <tr>
                        <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Gruppi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gruppi as $gruppo)
                        <tr>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('GSel',{{ $gruppo->id }})" >{{ $gruppo->it_descrizione }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $gruppi->appends(['articoli' => $articoli->currentPage()])->links() }} --}}
            <span class="ml-3" >Da {{ $magazzino_skip + 1}} a {{ $magazzino_take + $magazzino_skip  }} di {{ $magazzino_count }}</span><br>
            <button  type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 ml-3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='diminuisci_magazzino'>Precedente</button> <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aumenta_magazzino">Prossimo</button>

            </div>
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

        <div class="inline-flex w-full pb-2 bg-gray-300 rounded">
            <div class="w-1/4 ml-3 mr-3">
                    <label for="vocedoganale" class="w-full">Voce doganale taric :
                    <input type="text" class="w-full border" style="height: 20px" wire:model="voce_doganale"></label>
                    @error('voce_doganale') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/4 ml-3 mr-3">
                <label for="dirittidoganali" class="w-full">Diritti doganali :
                <input type="text" class="w-full border" style="height: 20px" wire:model="diritti_doganali"></label>
                @error('dirittidoganali') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/4 ml-3 mr-3">
                <label for="aliquota_iva" class="w-full">Iva % :
                <input type="text" class="w-full border" style="height: 20px" wire:model="aliquota_iva"></label>
                @error('aliquota_iva') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
            <div class="w-1/4 ml-3 mr-3">
                <label for="dirittidoganali" class="w-full">Iva :
                <input type="text" class="w-full border" style="height: 20px" wire:model="val_iva"></label>
                @error('dirittidoganali') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            </div>
        </div>
        <div class="inline-flex w-full">
            <div class="w-1/2">
                <div class="shadow pl-2 pb-2 bg-gray-300 rounded">
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
                            <input type="checkbox"  style="height: 20px" wire:model="attrezzi_cucina" {{ $attrezzi_cucina ? 'checked' : ''}} > <label for="attrezzi_cucina" class="align-top" style="height: 20px">Strumenti cuc inox</label>
                        </div>
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="plastica" {{ $plastica ? 'checked' : ''}} > <label for="plastica" class="align-top" style="height: 20px">Articoli in palstica</label>
                        </div>
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="legno" {{ $legno ? 'checked' : ''}} > <label for="legno" class="align-top" style="height: 20px">Articoli in legno</label>
                        </div>
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="bambu" {{ $bambu ? 'checked' : ''}} > <label for="bambu" class="align-top" style="height: 20px">Articoli in bambù</label>
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
                <div class="w-full shadow pl-3 pb-15 bg-gray-300 rounded">
                    <div class="grid grid-cols-3 gap-x-9">
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="richiede_ce" {{ $richiede_ce ? 'checked' : ''}} > <label for="richiede_ce" class="align-top" style="height: 20px">Richiede CE</label>
                        </div>
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="richiede_age" {{ $richiede_age ? 'checked' : ''}} > <label for="richiede_age" class="align-top" style="height: 20px">Riciede AGE</label>
                        </div>
                        <div>
                            <input type="checkbox"  style="height: 20px" wire:model="richiede_cites" {{ $richiede_cites ? 'checked' : ''}} > <label for="richiede_cites" class="align-top" style="height: 20px">Richiede CITES</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="inline-flex w-full pb-2 mb-2 pt-4 bg-gray-300 rounded">
            <div class="w-1/7 ml-3 mr-3">
                <form wire:submit.prevent='carica_fattura'>
                    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 "  type="file" wire:model='path_fattura'>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 45px;" {{-- wire:click='carica_fattura' --}}>Importa fattura</button>
                </form>
            </div>
            <div class="w-1/2 ml-3 mr-3">
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 45px;" wire:click='modifica_fattura'>Modifica</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 45px;" wire:click='cancella_fattura'>Cancella</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 45px;" wire:click='salva_distinta'>Salva distinta</button>
                <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 " style="height: 45px;" wire:click='ritorna'>Termina</button>
            </div>
        </div>
    </div>
</div>
