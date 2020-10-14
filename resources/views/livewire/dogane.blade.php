<div>
    <h1 class="text-center mb-1 mt-1 ">Gestione dogane</h1>
    <div>
        <div class="inline-flex">
            <div class="w-1/2 border">
                {{-- <livewire:elenco-dogane /> --}}
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
                        @foreach($dogane as $dogana)
                        <tr>
                            @if ($selezionato == $dogana->id)
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})" >{{ $dogana->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->piva }}</td>
                            @else
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})" >{{ $dogana->soprannome }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->indirizzo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->cap }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->luogo }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->provincia }}</td>
                            <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('DoganaSelezionato',{{ $dogana->id }})">{{ $dogana->piva }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $dogane->links() }}
            </div>
            <div class="w-1/2 border">
                <livewire:dati-dogana />
                <livewire:azioni-dogana />
            </div>
        </div>
    </div>
</div>
