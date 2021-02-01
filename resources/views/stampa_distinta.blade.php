<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stampa distinta</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto">
        <h1 class="text-xl font-semibold text-center">Stampa distinta</h1>
    </div>
    <div class="grid grid-cols-3 gap-20 ml-10">
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="/immagini/logo3.jpg" alt="Logo">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">Il Doganalista</div>
              <p class="text-gray-700 text-base">
                Via della speranza, 135, 20131 Milano<br>
                Tel. 12345678, 2387645 r.a.<br>
                Albo Spedizionieri CCIA Milano 12345<br>
                P.I. 123456789012
              </p>
            </div>
        </div>
        <div class="max-w-sm rounded overflow-hidden shadow-lg">
            <img class="w-full" src="/immagini/container1.png" alt="Logo">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">Dati spedizione</div>
              <p class="text-gray-700 text-base">
                Container N. : {{ $operazione->container_nr }}<br>
                Fattura N.   : {{ $operazione->nr_fattura }}<br>
                Pratica N.   : {{ $operazione->numero_pratica }}<br>
                OBL N.       : {{ $operazione->numero_obl }}
              </p>
            </div>
        </div>
        <div class="max-w-lg rounded overflow-hidden shadow-lg">
            <img class="w-full" src="/immagini/destinatario.jpg" alt="Logo">
            <div class="px-6 py-4">
              <div class="font-bold text-xl mb-2">Destinatario</div>
              <p class="text-gray-700 text-base">
                Ragione sociale : {{ $destinatario->nome }}<br>
                Indirizzo : {{ $destinatario->indirizzo }}, {{ $destinatario->numero }}<br>
                Luogo: {{ $destinatario->luogo }}<br>
                P.I. : {{ $destinatario->piva }}
              </p>
            </div>
        </div>
    </div>
    <div class="container ml-80 mt-3">
        <div class="inline-flex text-center mt-5">
            <a href="/distinta/pdf/{{ $operazione->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1" targhet="_blank">Stampa</a>
            <a href="/genera_distinta/{{ $operazione->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1">Termina</a>
        </div>
        <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
            <thead>
                <tr>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione Uk</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione It</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. pezzi</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. colli</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. lordo</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Tot. netto</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;" >Tot. valore</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articoli as $articolo)
                <tr>
                    <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})" >{{ $articolo->descrizione_uk }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->descrizione_it }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_pezzi }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_colli }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_lordo }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_netto }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->tot_valore }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center;"></td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center;">Totali distinta :</td>
                    <td  style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_pezzi }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_colli }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_lordo }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_netto }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_valore }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <hr class="mt-4">
    <div class="container ml-80 mt-3">
        <table  style="width: 100%; border-collapse: collapse; border: 1px solid black; ">
            <thead>
                <tr>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Descrizione it</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center;">Voce doganale</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Diritti doganali</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Iva %</th>
                    <th style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">Iva valore</th>
                </tr>
            </thead>
            <tbody>
                @foreach($articoli as $articolo)
                <tr>
                    <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})" >{{ $articolo->descrizione_it }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->voce_doganale }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right; " wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->diritti_doganali }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->aliquota_iva }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: right;" wire:click="$emit('ArticoloSelezionato',{{ $articolo->id }})">{{ $articolo->val_iva }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center;"></td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center;">Totali distinta :</td>
                    <td  style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_diritti }}</td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;"></td>
                    <td style="border-collapse: collapse; border: 1px solid black; text-align: center; width: 80px;">{{ $totale_iva }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
