<div>
    <h1 class="text-center">Gestione delle rese fattura</h1>
    <div>
        <div class="inline-flex w-full">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-rese /> --}}
                <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    {{-- class="table  table-light " --}}
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Resa</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rese as $resa)
                        <tr>
                            @if ($selezionato == $resa->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ResaSelezionato',{{ $resa->id }})" >{{ $resa->iso }}</td>

                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ResaSelezionato',{{ $resa->id }})" >{{ $resa->descrizione }}</td>

                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ValutaSelezionato',{{ $resa->id }})" >{{ $resa->iso }}</td>

                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ResaSelezionato',{{ $resa->id }})" >{{ $resa->descrizione }}</td>

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $rese->links() }}

            </div>
            <div class="w-1/2 border">
                <livewire:dati-resa />
                {{-- <livewire:azioni-compagnie /> --}}
            </div>
        </div>
        <div class="inline-flex w-full">
            <div class="w-full border">
                <livewire:azioni-resa />
            </div>
        </div>
    </div>
</div>
