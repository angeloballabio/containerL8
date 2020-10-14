<div>
    <h1 class="text-center mb-1 mt-1 ">Gestione fornitori</h1>
    <div>
        <div class="inline-flex">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-fornitori /> --}}
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
                        @foreach($fornitori as $fornitore)
                        <tr>
                            @if ($selezionato == $fornitore->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})" >{{ $fornitore->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->piva }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})" >{{ $fornitore->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->piva }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $fornitori->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-fornitore />
                <livewire:azioni-fornitore />
            </div>
        </div>
    </div>
</div>
