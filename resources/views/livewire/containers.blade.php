<div>
    <h1 class="text-center">Gestione tipi di container</h1>
    <div>
        <div class="inline-flex w-full">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-containers /> --}}
                <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
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
            </div>
            <div class="w-1/2 border">
                <livewire:dati-container />
                {{-- <livewire:azioni-compagnie /> --}}
            </div>
        </div>
        <div class="inline-flex w-full">
            <div class="w-full border">
                <livewire:azioni-container />
            </div>
        </div>
    </div>
</div>
