<table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
    {{-- class="table  table-light " --}}
    <thead>
        <tr>
            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Tipo</th>

        </tr>
    </thead>
    <tbody>
        @foreach($containers as $container)
        <tr>
            @if ($selezionato == $container->id)
            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('ContainerSelezionato',{{ $container->id }})" >{{ $container->tipo }}</td>

            @else
            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ContainerSelezionato',{{ $container->id }})" >{{ $container->tipo }}</td>

            @endif
        </tr>
        @endforeach
    </tbody>
</table>
{{ $containers->links() }}
