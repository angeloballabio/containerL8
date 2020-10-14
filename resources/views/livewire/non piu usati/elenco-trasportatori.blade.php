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
        @foreach($trasportatori as $trasportatore)
        <tr>
            @if ($selezionato == $trasportatore->id)
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})" >{{ $trasportatore->nome }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->indirizzo }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->cap }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->luogo }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->provincia }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->piva }}</td>
            @else
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})" >{{ $trasportatore->nome }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->indirizzo }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->cap }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->luogo }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->provincia }}</td>
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('TrasportatoreSelezionato',{{ $trasportatore->id }})">{{ $trasportatore->piva }}</td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{ $trasportatori->links() }}
