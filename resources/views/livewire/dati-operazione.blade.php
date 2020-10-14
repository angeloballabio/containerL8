
<div class="shadow p-2 mb-2 bg-white rounded">Dati fattura record : {{ $ordine_id }}, {{ $user->name }}
    <div class="inline-flex w-full mb-1">
        <div class="w-1/2">
            @error('fattura_nr') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror

            <label for="fattura_nr" class="w-1/3">Fattura numero :</label>
            <input type="text" class="w-2/3 border p-1" style="height: 20px" id="fattura_nr"   wire:model="fattura_nr">
        </div>
        <div class="w-1/2">

            @error('data_fattura') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            <label for="inputData" class="w-1/3">Data fattura</label>
            <input type="date" class="w-2/3  border p-1"  style="height: 20px"id="inputData" wire:model="data_fattura">
        </div>
    </div>
    <div class="inline-flex w-full mb-1">
        <div class="w-1/3">
            @error('fornitore') <div class="ml-3"><span style="color: red">{{ $message }}</span> </div>@enderror
            <label for="inputFornitore" class="w-1/3">Fornitore :</label>
            <select  class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="forn">
                <option value="">Effettua la scelta</option>
                @foreach ($fornitori as $fornitore)
                    <option value="{{$fornitore->soprannome}} {{ $forn == $fornitore->soprannome ? 'selected' : '' }}">{{$fornitore->soprannome}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/3">
            @error('valuta') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            <label for="inputValuta" class="w-1/3">Valuta:</label>
            <select  class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="val">
                <option value="0">Effettua la scelta</option>
                @foreach ($valute as $valuta)
                    <option value="{{$valuta->iso}} {{ $val == $valuta->iso ? 'selected' : '' }}">{{$valuta->iso}}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/3">
            @error('resa') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
            <label for="resa" class="w/1/3">Resa:</label>
            <select  class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="resa">
                <option value="0">Effettua la scelta</option>
                @foreach ($rese as $resa)
                    <option value="{{$resa->iso}} {{ $resa == $resa->iso ? 'selected' : '' }}">{{$resa->iso}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">Dati nave/aereo
        <div class="inline-flex w-full mb-1">
            <div class="w-2/3">
                @error('compagnia_navale') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputCompagnia" class="w-1/3">Compagnia navale :</label>
                <select  class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="compagnia_navale">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($compagnie as $compagnia)
                        <option value="{{$compagnia->nome}} {{ $compagnia_navale == $compagnia->nome ? 'selected' : '' }}">{{$compagnia->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3">
                @error('data_arrivo_nave') <div class="ml-3"><span style="color: red;">{{ $message }}</span></div> @enderror
                <label for="inputDataArrivo" class="w-1/3">Data arrivo:</label>
                <input type="date" class="w-2/3 border p-1" style="height: 20px" id="inputDataArrivo"  wire:model="data_arrivo_nave">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
                @error('nome_nave') <div class="ml-3"><span style="color: red">{{ $message }}</span> </div>@enderror
                <label for="inputNomeNave" class="w-1/5">Nome nave :</label>
                <input type="text" class="w-4/5 border p-1" style="height: 20px" id="inputNomeNave" wire:model="nome_nave">
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">Dati OBL/AWB
        <div class="inline-flex w-full mb-1">
            <div class="w-1/2">
                @error('numero_obl') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputOBL" class="col-5 float-left">Numero OBL/AWB :</label>
                <input type="text" class="col-6 border float-left p-1" style="height: 20px" id="inputOBL" wire:model="numero_obl">
            </div>
            <div class="w-1/2">
                @error('container_nr') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputContainer" class="col-6 float-left">Container n° :</label>
                <input type="text" class="col-5 border p-1" style="height: 20px" id="inputContainer" wire:model="container_nr">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/3">
                @error('cartoni') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputCartoni" class="w-2/4">Numero cartoni :</label>
                <input type="number" class="w-2/4 form-control p-1" style="height: 20px" id="inputCartoni" wire:model="cartoni">
            </div>
            <div class="w-1/3">
                @error('lordo') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputLordo" class="w-2/4">Peso lordo :</label>
                <input type="number" class="w-2/4 border" style="height: 20px" id="inputLordo" wire:model="lordo">
            </div>
            <div class="w-1/3">
                @error('cubatura') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputCubatura" class="w-1/3">Cubatura :</label>
                <input type="number" class="w-2/3 border" style="height: 20px" id="inputCubatura" wire:model="cubatura">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/3">
                @error('data_carico') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputDataCarico" class="w-1/3">Data carico :</label>
                <input type="date" class="w-2/3 border p-1" style="height: 20px" id="inputDataCarico" wire:model="data_carico">
            </div>
            <div class="w-2/3">
                @error('destinatario') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputDestinatario" class="w-1/3">Destinatario :</label>
                <select class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="destinatario">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($destinatari as $destinatario)
                        <option value="{{$destinatario->soprannome}} {{ $destinatario == $destinatario->soprannome ? 'selected' : '' }}">{{$destinatario->soprannome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/2">
                @error('tipo_container') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputTipoContainer" class="w-1/3">Tipo container :</label>
                <select  class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="tipo_container">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($containers as $container)
                        <option value="{{$container->tipo}} {{ $tipo_container == $container->tipo ? 'selected' : '' }}">{{$container->tipo}}</option>
                    @endforeach
                </select>

            </div>
            <div class="w-1/2">
                @error('sigillo') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputSigillo" class="w-1/3">Sigillo :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" id="inputSigillo" wire:model="sigillo">
            </div>
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">Posizionamento
        <div class="inline-flex w-full mb-1">
            <div class="w-1/2">
                @error('trasportatore') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputTrasportatore" class="w-1/3">Trasportatore :</label>
                <select class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="trasportatore">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($trasportatori as $trasportatore)
                        <option value="{{$trasportatore->soprannome}} {{ $trasportatore == $trasportatore->soprannome ? 'selected' : '' }}">{{$trasportatore->soprannome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/2">
                @error('luogo_consegna') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputConsegna" class="w-2/4">Luogo consegna :</label>
                <select class="w-2/4 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="luogo_consegna">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($consegne as $consegna)
                        <option value="{{$consegna->soprannome}} {{ $luogo_consegna == $consegna->soprannome ? 'selected' : '' }}">{{$consegna->soprannome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">Diritti doganali / certificati / pratica
        {{-- <div class="row">
            <div class="col-7"> --}}
        <div class="inline-flex w-full mb-1">
            <div class="w-2/3">
                @error('pratica_nr') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputPratica" class="w-1/3">Numero pratica :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" id="inputPratica" wire:model="pratica_nr">

            </div>
            <div class="w-1/3">
                @error('data_pratica') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputDataPratica" class="w-1/2">Data pratica :</label>
                <input type="date" class="w-1/2 border p-1" style="height: 20px" id="inputDataPratica" wire:model="data_pratica">

            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            {{-- <div class="col-6"> --}}
            <div class="w-1/2">
                @error('tot_diritti') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputDiritti" class="w-1/3">Tot diritti doganali :</label>
                <input type="number" class="w-2/3 border p-1" style="height: 20px" id="inputDiritti" wire:model="tot_diritti">

            </div>
            <div class="w-1/2">
                @error('tot_iva') <div class="ml-3"><span style="color: red">{{ $message }}</span> </div>@enderror
                <label for="inputLordo" class="w-1/3">Tot iva :</label>
                <input type="number" class="w-2/3 border" style="height: 20px" id="inputLordo" wire:model="tot_iva">

            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/6">
                <label for="inputSanitario" class="w-5/6">Sanitario :</label>
                <input type="checkbox" class="w-1/6 border" style="height: 20px" id="inputSanitario" {{ $sanitario ? 'checked' : '' }}wire:model="sanitario">
            </div>
            <div class="w-2/6">
                <label for="inputNumeroSanitari" class="w-4/6">Sanitari emessi n° :</label>
                <input type="number" class="w-2/6 border p-1" style="height: 20px" id="inputNumneroSanitari" wire:model="nr_sanitari">
            </div>
            <div class="w-1/6">
                <label for="inputCe" class="w-5/6">CE :</label>
                <input type="checkbox" class="w-1/6 border" style="height: 20px" id="inputCe" {{ $ce ? 'checked':'' }} wire:model="ce">
            </div>
            <div class="w-1/6">
                <label for="inputCites" class="w-5/6">CITES :</label>
                <input type="checkbox" class="w-1/6 border" style="height: 20px" id="inputCites" {{ $cites ? 'checked' : '' }} wire:model="cites">
            </div>
            <div class="w-1/6">
                <label for="inputAge" class="w-5/6">AGE :</label>
                <input type="checkbox" class="w-1/6 border" style="height: 20px" id="inputAge" {{ $age ? 'checked' : '' }} wire:model="age">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-full">
                @error('dogana_t1') <div class="ml-3"><span style="color: red">{{ $message }}</span> </div>@enderror
                <label for="inputDoganaT1" class="w-1/3">Dogana per T1 :</label>
                <select class="w-2/3 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="dogana_t1">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($dogane as $dogana)
                        <option value="{{$dogana->soprannome}} {{ $dogana_t1 == $dogana->soprannome ? 'selected' : '' }}">{{$dogana->soprannome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/2">
                @error('dogana_sdoganamento') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputDoganaSdoganamento" class="w-1/2">Dogana sdoganamento :</label>
                <select class="w-1/2 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="dogana_sdoganamento">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($dogane as $dogana)
                        <option value="{{$dogana->soprannome}} {{ $dogana_sdoganamento == $dogana->soprannome ? 'selected' : '' }}">{{$dogana->soprannome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/2">
                @error('luogo_sdoganamento') <div class="ml-3"><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="inputConsegna" class="w-1/2">Luogo sdoganamento :</label>
                <select class="w-1/2 custom-select" style="height: 25px; vertical-align: middle; padding-top: 0px;"  wire:model="luogo_sdoganamento">
                    <option value="0">Effettua la scelta</option>
                    @foreach ($consegne as $consegna)
                        <option value="{{$consegna->soprannome}} {{ $luogo_sdoganamento == $consegna->soprannome ? 'selected' : '' }}">{{$consegna->soprannome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="w-full">
                @error('allegati') <div class="ml-3"><span style="color: red">{{ $message }}</span> </div>@enderror
                <label for="allegati" class="w-1/3">Documenti allegati :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" id="inputSigillo" wire:model="allegati">
        </div>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="bl">B/L</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="fattura">Fattura</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="pkl">Pkl</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="conferma_ordine">Con. ord.</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="distinta">Distinta</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="delega">Delega</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="dichiarazione_conformita">Dic. conf.</button>

        <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="elenco_sanitari">El. sanit.</button>
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="inline-flex w-full mb-1">
                <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aggiungi">Aggiungi operazione</button>

            @if($ordine_id)

                <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="modifica()">Modifica operazione</button>

            @endif
            @if($ordine_id)

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="cancella">Cancella operazione</button>

            @endif
        </div>
    </div>
</div>


