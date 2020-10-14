{{-- <div> --}}
    {{-- @if($ordine_id) --}}
    <div class="shadow p-1 mb-1 bg-white rounded">
        <div class="inline-flex w-full">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="generaDistinta" >Genera distinta</button>

            <a href="/mandati/{{ $ordine_id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3 text-center" style="height: 25px; vertical-align: middle; padding-top: 0px;">Genera mandato</a>

            <a href="/bollettino/{{ $ordine_id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3 text-center" style="height: 25px; vertical-align: middle; padding-top: 0px;">Genera bollettino</a>
        </div>
        <div class="inline-flex w-full">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="azzeraMaschera">Azzera maschera</button>

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneFornitori'>Fornitori</button>

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneCompagnie'>Compagnie aero/navali</button>
        </div>
        <div class="inline-flex w-full">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneDestinatari' >Destinatari</button>

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneTrasportatori'>Trasportatori</button>

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneConsegna'>Luoghi di consegna</button>
        </div>
        <div class="inline-flex w-full">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneDogane'>Dogane T1</button>

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneContainer'>Tipo container</button>

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='gestioneValuta'>Tipo valuta</button>
        </div>
        <div class="inline-flex w-full">
            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click='resaFattura'>Resa fattura</button>

        </div>
    </div>
{{-- </div> --}}
