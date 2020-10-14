<div>
    <h1 class="text-center mb-1 mt-1 ">Gestione destinatari</h1>
    <div>
        <div class="inline-flex">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-destinatari /> --}}
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
                        @foreach($destinatari as $destinatario)
                        <tr>
                            @if ($selezionato == $destinatario->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})" >{{ $destinatario->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->piva }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})" >{{ $destinatario->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DestinatarioSelezionato',{{ $destinatario->id }})">{{ $destinatario->piva }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $destinatari->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-destinatari />
                <livewire:azioni-destinatari />
            </div>
        </div>
    </div>
</div>

