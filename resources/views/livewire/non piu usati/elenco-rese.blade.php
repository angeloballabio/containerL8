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
