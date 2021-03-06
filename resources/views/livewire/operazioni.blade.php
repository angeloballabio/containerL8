<div>
    <h1 class="text-center mb-1 mt-1">Inserimento operazioni</h1>
    <div>
        <div class="inline-flex">
            <div class="w-1/2 border">
               <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
                    <thead>
                        <tr>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Pratica</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Container</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Destinatario</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Data arrivo nave</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Cartoni</th>
                            <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Lordo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($operazioni as $operazione)
                        <tr>
                            @if ($selezionato == $operazione->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})" >{{ $operazione->numero_pratica }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->container_nr }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->destinatario_obl }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ \Carbon\Carbon::parse($operazione->data_arrivo_nave)->format('d-m-Y') }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->cartoni }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->lordo_obl }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})" >{{ $operazione->numero_pratica }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->container_nr }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->destinatario_obl }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ \Carbon\Carbon::parse($operazione->data_arrivo_nave)->format('d-m-Y') }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->cartoni }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('OrdineSelezionato',{{ $operazione->id }})">{{ $operazione->lordo_obl }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $operazioni->links() }}
                <livewire:azioni-operazioni />
            </div>
            <div class="w-1/2 border">
                <livewire:dati-operazione />
                {{-- <livewire:azioni-formdata /> --}}
        </div>
    </div>
</div>
