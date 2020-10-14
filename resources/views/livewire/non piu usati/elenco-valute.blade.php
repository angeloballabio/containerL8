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
