<div>
    <table   style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
        <thead>
            <tr>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione Uk</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione It</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Codice articolo</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Colli</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Pezzi</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Um. Mis.</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Val. unitario</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Lordo Kg.</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Netto Kg.</th>
                <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Valore</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articoli as $articolo)
            <tr>
                @if ($selezionato == $articolo->id)
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->uk_descrizione }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->it_descrizione }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->codice_prodotto }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->colli }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->pezzi }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->unita_misura }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_unitario }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_lordo }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_netto }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; background-color: #6699ff; color: white;" wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_totale }}</td>
                @else
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->uk_descrizione }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->it_descrizione }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->codice_prodotto }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->colli }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->pezzi }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->unita_misura }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_unitario }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_lordo }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->peso_netto }}</td>
                <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('PSel',{{ $articolo->id }})" >{{ $articolo->prezzo_totale }}</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $articoli->links() }}
</div>
