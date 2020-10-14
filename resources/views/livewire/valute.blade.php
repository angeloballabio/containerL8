<div>
    <h1 class="text-center">Gestione valute</h1>
    <div>
        <div class="inline-flex w-full">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-valute /> --}}
                <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    {{-- class="table  table-light " --}}
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Tipo</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($valute as $valuta)
                        <tr>
                            @if ($selezionato == $valuta->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ValutaSelezionato',{{ $valuta->id }})" >{{ $valuta->iso }}</td>

                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ValutaSelezionato',{{ $valuta->id }})" >{{ $valuta->iso }}</td>

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $valute->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-valuta />
                {{-- <livewire:azioni-compagnie /> --}}
            </div>
        </div>
        <div class="inline-flex w-full">
            <div class="w-full border">
                <livewire:azioni-valuta />
            </div>
        </div>
    </div>
</div>
