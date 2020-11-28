<div>
    <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
        <thead>
            <tr>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Gruppi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($gruppi as $gruppo)
                <tr>
                    <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('GSel',{{ $gruppo->id }})" >{{ $gruppo->it_descrizione }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $gruppi->links() }}
</div>
