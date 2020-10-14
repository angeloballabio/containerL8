<div>
    <h1 class="text-center">Gestione luoghi di consegna</h1>
    <div>
        <div class="inline-flex">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-consegne /> --}}
                <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Nome</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Indirizzo</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Cap</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Localita</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Provincia</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Par. IVA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($consegne as $consegna)
                        <tr>
                            @if ($selezionato == $consegna->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})" >{{ $consegna->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->piva }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})" >{{ $consegna->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ConsegnaSelezionato',{{ $consegna->id }})">{{ $consegna->piva }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $consegne->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-consegna />
                <livewire:azioni-consegne />
            </div>
        </div>
    </div>
</div>
