{{-- <div> --}}
    <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
        {{-- class="table  table-light " --}}
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
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})" >{{ $fornitore->nome }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->indirizzo }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->cap }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->luogo }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->provincia }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})">{{ $fornitore->piva }}</td>
                @else
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('FornitoreSelezionato',{{ $fornitore->id }})" >{{ $fornitore->nome }}</td>
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
{{-- </div> --}}
