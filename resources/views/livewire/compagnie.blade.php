<div>
    <h1 class="text-center mb-1 mt-1 ">Gestione compagnie aero navali</h1>
    <div>
        <div class="inline-flex w-full">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-compagnie /> --}}
                <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    {{-- class="table  table-light " --}}
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Nome</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Indirizzo_web</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Contatto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($compagnie as $compagnia)
                        <tr>
                            @if ($selezionato == $compagnia->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})" >{{ $compagnia->nome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})">{{ $compagnia->indirizzo_web }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})">{{ $compagnia->contatto }}</td>

                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})" >{{ $compagnia->nome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})">{{ $compagnia->indirizzo_web }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('CompagniaSelezionato',{{ $compagnia->id }})">{{ $compagnia->contatto }}</td>

                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $compagnie->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-compagnia />
                <livewire:azioni-compagnia />
            </div>
        </div>
    </div>
</div>

