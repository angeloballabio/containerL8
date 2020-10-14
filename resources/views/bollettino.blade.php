<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bollettini</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mx-auto">
        <p class="text-center text-2xl">Bollettino di consegna</p>
        <div class="flex mb-4">
            <div class="w-2/5">
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                <img class="w-full" src="/immagini/logo3.jpg" alt="logo" style="width: 500px;">
                <div class="px-6 py-4">
                  <p class="font-bold text-xl mb-2">Il Doganalista</p>
                  <p class="text-gray-700 text-base">Via della speranza, 135, 20131 Milano<br>
                    Tel. 12345678, 2387645 r.a.<br>
                    Albo Spedizionieri CCIA Milano 12345 P.I. 123456789012
                    </p>
                </div>
                </div>
            </div>
            <div class="w-1/5">
                <a href="/bollettino/pdf/{{ $operazione->id }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1">Stampa</a>
                <a href="/operazioni" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1">Termina</a>
            </div>
            <div class="w-2/5">
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="card-body">
                      <p class="font-bold text-xl mb-2" >Spettabile ditta</p>
                      <p class="text-gray-700 text-base" >{{ $trasportatore->nome }}<br>
                         {{ $trasportatore->indirizzo }}, {{ $trasportatore->numero }}<br>
                        {{ $trasportatore->cap }} {{ $trasportatore->luogo }} {{ $trasportatore->provincia }}
                        </p>
                    </div>
                  </div>
            </div>
        </div>
        <p style="font-size: 20px;" class="p-2">Milano, {{ $oggi }}</p>

        <p style="font-size: 20px;">Pratica numero : {{ $operazione->numero_pratica }}</p>
        <div class="text-center">
            <p style="font-size: 25px;">Buongiorno, il container si recherà per dogana presso:</p>
            <p style="font-size: 30px;"><b>{{ $dogana_arrivo->nome }}<br>
            {{ $dogana_arrivo->indirizzo }} , {{ $dogana_arrivo->numero }}<br>
            {{ $dogana_arrivo->cap }} , {{ $dogana_arrivo->luogo }} , {{ $dogana_arrivo->provincia }}</b></p>
        </div>
        <div>
            <p style="font-size: 20px;">A dogana terminata posizionare il container presso:</p>
            <div class="text-center">
                <p style="font-size: 30px;"><b>{{ $destinatario->nome }}<br>
                {{ $destinatario->indirizzo }} , {{ $destinatario->numero }}<br>
                {{ $destinatario->cap }} , {{ $destinatario->luogo }} , {{ $destinatario->provincia }}</b></p>
            </div>
        </div>
        <div>
            <p style="font-size: 20px;">Dati spedizione :</p>
            <div class="text-center">
                <p style="font-size: 30px;"><b>Container : {{ $operazione->container_nr }}, Sigillo : {{ $operazione->sigillo }}<br>
                {{ $operazione->tipo_container }}, {{ $operazione->cartoni }} CRTS, {{ $operazione->lordo_obl }} KGS, {{ $operazione->cubatura }} CBM<br>
                Nave : {{ $operazione->nome_nave }}, Data prevista arrivo : {{ $operazione->data_arrivo_nave }}
                </b></p>
            </div>
        </div>
        <div>
            <p style="font-size: 40px;"><b>Documenti da ritirare presso : {{ $dogana->nome }}</b></p>
        </div>
        <div>
            <p style="font-size: 20px;">Grazie e distinti saluti</p>
        </div>
        <div class="flex justify-end">
            <p class="text-center">Il Doganalista<br>
            Via della speranza, 135, 20131 Milano<br>
                Tel. 12345678, 2387645 r.a.<br>
                Albo Spedizionieri CCIA Milano 12345<br>
                P.I. 123456789012
            </p>
            <img class="absolute bottom-85 right-100" src="/immagini/firma1.png" alt="logo" style="width: 280px; background-color:transparent;">
        </div>
    </div>
</body>
</html>
