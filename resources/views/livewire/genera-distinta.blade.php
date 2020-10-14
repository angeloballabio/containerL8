<div>
    <h1 class="text-center text-xl font-semibold>Genera distinta">Genera distinta</h1>
    <div>
        @if($operazione)
        <div class="shadow p-2 mb-2 bg-gray-200 rounded">
            <div class="inline-flex w-full mb-1">
                <div class="w-1/4">
                    <label for="container" class="w-1/3">Container :</label>
                    <input type="text" class="w-2/3 p-1" style="height: 20px" value="{{ $operazione->container_nr }}" readonly>
                </div>
                <div class="w-1/4">
                    <label for="container" class="w-1/3">Pratica :</label>
                    <input type="text" class="w-2/3 p-1" style="height: 20px" value="{{ $operazione->numero_pratica }}"readonly >
                </div>
                <div class="w-1/4">
                    <label for="container" class="w-1/3">Destinatario :</label>
                    <input type="text" class="w-2/3 p-1" style="height: 20px" value="{{ $operazione->destinatario_obl }}" readonly>
                </div>
                <div class="w-1/4">
                    <label for="container" class="w-1/3">Fornitore :</label>
                    <input type="text" class="w-2/3 p-1" style="height: 20px" value="{{ $operazione->nome_fornitore }}" readonly>
                </div>
            </div>
            <div class="inline-flex w-full mb-1">
                <div class="w-1/5">
                    <label for="container" class="w-3/5 pr-7">Totale colli B/L :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $operazione->cartoni }}" readonly>
                </div>
                <div class="w-1/5">

                </div>
                <div class="w-1/5">
                    <label for="container" class="w-3/5 pr-7">Totale lordo B/L :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $operazione->lordo_obl }}" readonly>
                </div>
                <div class="w-1/5">
                    id operazione :{{ $operazione->id }}
                </div>
                <div class="w-1/5">

                </div>
            </div>
            <div class="inline-flex w-full">
                <div class="w-1/5">
                    <label for="container" class="w-3/5">Totale colli distinta :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value ="{{ $totale_colli }}" readonly>
                </div>
                <div class="w-1/5">
                    <label for="container" class="w-3/5">Totale pezzi distinta :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $totale_pezzi }}" readonly>
                </div>
                <div class="w-1/5">
                    <label for="container" class="w-3/5">Totale lordo distinta :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $totale_lordo }}" readonly>
                </div>
                <div class="w-1/5">
                    <label for="container" class="w-3/5">Totale netto distinta :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $totale_netto }}" readonly>
                </div>
                <div class="w-1/5">
                    <label for="container" class="w-3/5">Valore merce distinta :</label>
                    <input type="text" class="w-2/5 p-1" style="height: 20px" value="{{ $totale_valore }}" readonly>
                </div>
            </div>
        </div>
        @else
        <div class="shadow p-2 mb-2 bg-gray-200 rounded">
            <div class="inline-flex w-full mb-1">
                <div class="inline-flex w-full mb-1">
                    <div class="w-1/4">
                        <label for="container" class="w-1/3">Container :</label>
                        <input type="text" class="w-2/3 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/4">
                        <label for="container" class="w-1/3">Pratica :</label>
                        <input type="text" class="w-2/3 p-1" style="height: 20px" readonly >
                    </div>
                    <div class="w-1/4">
                        <label for="container" class="w-1/3">Destinatario :</label>
                        <input type="text" class="w-2/3 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/4">
                        <label for="container" class="w-1/3">Fornitore :</label>
                        <input type="text" class="w-2/3 p-1" style="height: 20px" readonly>
                    </div>
                </div>
                <div class="inline-flex w-full mb-1">
                    <div class="w-1/5">
                        <label for="container" class="w-3/5 pr-7">Totale colli B/L :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">

                    </div>
                    <div class="w-1/5">
                        <label for="container" class="w-3/5 pr-7">Totale lordo B/L :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">
                        id operazione :
                    </div>
                    <div class="w-1/5">

                    </div>
                </div>
                <div class="inline-flex w-full">
                    <div class="w-1/5">
                        <label for="container" class="w-3/5">Totale colli distinta :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">
                        <label for="container" class="w-3/5">Totale pezzi distinta :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">
                        <label for="container" class="w-3/5">Totale lordo distinta :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">
                        <label for="container" class="w-3/5">Totale netto distinta :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                    <div class="w-1/5">
                        <label for="container" class="w-3/5">Valore merce distinta :</label>
                        <input type="text" class="w-2/5 p-1" style="height: 20px" readonly>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="inline-flex w-full">
            <div class="w-2/3 border ">
                <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione Uk</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione It</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. pezzi</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. colli</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. lordo</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. netto</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;" >Tot. valore</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articoli as $articolo)
                        <tr>
                            @if ($selezionato == $articolo->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})" >{{ $articolo->descrizione_uk }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->descrizione_it }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_pezzi }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_colli }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_lordo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_netto }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_valore }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})" >{{ $articolo->descrizione_uk }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->descrizione_it }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_pezzi }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_colli }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_lordo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_netto }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_valore }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
               {{ $articoli->links() }}
               <div class="inline-flex  w-full mt-3">

                    <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="aggiungi">Aggiungi</button>
                    <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="modifica()">Modifica</button>
                    <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click="cancella">Cancella</button>
                    <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click='sposta'>Sposta</button>
                    <button type="button"  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/5" btn-lg btn-block wire:click='ricarica'>Ricarica</button>

                </div>
                <div class="inline-flex w-full mb-2">

                    <div class="w-1/2 ml-3 mr-3">

                            <label for="descrizioneuk" class="w-full">Descrizione articolo uk : fornitore:{{ $fornitore_id }}
                            <input type="text" class="w-full border @error('descrizioneuk') non valida @enderror " style="height: 20px"  wire:model="descrizione_uk" value="{{ old('descrizioneuk') }}"></label>
                            @error('descrizione_uk') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    </div>
                    <div class="w-1/2 ml-3 mr-3">
                            <label for="descrizioneit" class="w-full">Descrizione articolo it :
                            <input type="text" class="w-full border" style="height: 20px" wire:model="descrizione_it"></label>
                            @error('descrizione_it') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                    </div>
                </div>
                <div class="inline-flex w-full mb-2">
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
                                    <input type="checkbox"  style="height: 20px" wire:model="attrezzi_cucina" {{ $attrezzi_cucina ? 'checked' : ''}} > <label for="attrezzi_cucina" class="align-top" style="height: 20px">Strimenti cuc inox</label>
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
                        <div class="w-full shadow p-2 mb-2 bg-gray-300 rounded">
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
                                <div class="">
                                    <label for="" style="height: 20px">Codice articolo :</label>
                                </div>
                                <div class="">
                                    <input type="text"  style="height: 20px" id="codicearticolo" wire:model='codicearticolo'>
                                </div>
                                <div class="">
                                    <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='trova_articolo'>Trova articolo</button>
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="trovatoarticolo" class="w-2/3 mr-2" style="height: 20px">Articolo menzionato nella descrizione :</label>
                                <input type="text" class="w-1/3 ml-2" style="height: 20px" id="trovatoarticolo" wire:model='trovatoarticolo'>
                            </div>
                            <div class="w-full">
                                <label for="sposta_articolo" class="w-2/3" style="height: 20px">Sposta articolo in :</label>
                                <select  class="w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="sposta_articolo" wire:click='spostaarticolo'>
                                    <option value="0">Effettua la scelta</option>
                                    @foreach ($articoli as $articolo)
                                    <option value="{{$articolo->descrizione_it}} {{ $sposta_articolo == $articolo->descrizione_it ? 'selected' : '' }}">{{$articolo->descrizione_it}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden"  style="height: 20px" wire:model="ordine_id" value="{{ $ordine_id }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-1/3 border">
                <table style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    <thead>
                        <tr>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Pezzi</th>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Colli</th>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Lordo</th>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Netto</th>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Valore</th>
                            <th class="w-1/6" style="border-collapse: collapse; border: 1px solid black; text-align: center;">Cod. Art.</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pezzi as $pezzo)
                        <tr>
                            @if ($selezionato == $pezzo->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})" >{{ $pezzo->pezzi }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->colli }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->lordo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->netto }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->valore }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->codice_articolo }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})" >{{ $pezzo->pezzi }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->colli }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->lordo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->netto }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->valore }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PezzoSelezionato',{{ $pezzo->id }})">{{ $pezzo->codice_articolo }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $pezzi->links() }}

            </div>
        </div>

            <div class="w-1/2 border ">
                {{-- <livewire:dati-pezzi /> --}}
                {{-- @livewire('dati-pezzi',['id' => $operazione->id]) --}}
               {{--  @livewire('azioni-distinta',['id' => $operazione->id]) --}}
                {{-- <livewire:azioni-distinta /> --}}
                </div>
            </div>
        </div>
    </div>
</div>
