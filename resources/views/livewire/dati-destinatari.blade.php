<div class="shadow p-2 mb-2 bg-white rounded">
    <div class="inline-flex w-full mb-1">

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="aggiungi">Aggiungi operazione</button>

        @if($destinatario_id)

            <button  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="modifica()">Modifica operazione</button>

        @endif
        @if($destinatario_id)

            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-1 mb-1 w-1/3" style="height: 25px; vertical-align: middle; padding-top: 0px;" wire:click="cancella">Cancella operazione</button>

        @endif
    </div>
    <div class="shadow p-2 mb-2 bg-white rounded">
        <div class="inline-flex w-full mb-1">
            <div class="w-1/4">
                @error('soprannome') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="soprannome" class="w-3/6" style="text-align: right;">Soprannome :</label>
                <input type="text" class="w-3/6 border p-1" style="height: 20px" wire:model="soprannome">

            </div>
            <div class="w-2/4">
                @error('nome') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="nome" class="w-1/6" style="text-align: right;">nome :</label>
                <input type="text" class="w-5/6 border p-1" style="height: 20px" wire:model="nome">

            </div>
            <div class="w-1/4">
                @error('piva') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="piva" class="w-2/6" style="text-align: right;">P.IVA :</label>
                <input type="text" class="w-4/6 border p-1" style="height: 20px" wire:model="piva">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-2/3">
                @error('indirizzo') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="indirizzo" class="w-1/3" style="text-align: right;">indirizzo :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="indirizzo">

            </div>
            <div class="w-1/3">
                @error('numero') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="numero" class="w-1/3" style="text-align: right;">numero :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="numero">
            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/4">
                @error('cap') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="cap" class="w-1/3" style="text-align: right;">Cap :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="cap">

            </div>
            <div class="w-1/4">
                @error('luogo') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="luogo" class="w-1/3" style="text-align: right;">Localita :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="luogo">

            </div>
            <div class="w-1/4">
                @error('provincia') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="provincia" class="w-1/3" style="text-align: right;">provincia:</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="provincia">

            </div>
            <div class="w-1/4">
                @error('stato') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="stato" class="w-1/3" style="text-align: right;">Stato :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="stato">

            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/4">
                @error('telefono1') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="telefono1" class="w-2/5" style="text-align: right;">Telefono1 :</label>
                <input type="text" class="w-3/5 border p-1" style="height: 20px" wire:model="telefono1">

            </div>
            <div class="w-1/4">
                @error('telefono2') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="telefono2" class="w-2/5" style="text-align: right;">Telefono2 :</label>
                <input type="text" class="w-3/5 border p-1" style="height: 20px" wire:model="telefono2">

            </div>
            <div class="w-1/4">
                @error('mobile') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="mobile" class="w-1/3" style="text-align: right;">mobile :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="mobile">

            </div>
            <div class="w-1/4">
                @error('fax') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="fax" class="w-1/3" style="text-align: right;">Fax :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="fax">

            </div>
        </div>
        <div class="inline-flex w-full mb-1">
            <div class="w-1/2">
                @error('mail') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="mail" class="w-1/3" style="text-align: right;">Mail :</label>
                <input type="text" class="w-2/3 border p-1" style="height: 20px" wire:model="mail">

            </div>
            <div class="w-1/2">
                @error('responsabile') <div><span style="color: red">{{ $message }}</span></div> @enderror
                <label for="responsabile" class="w-1/3" style="text-align: right;">Responsabile :</label>
                <input type="text" id="responsabile" class="w-2/3 border p-1" style="height: 20px" wire:model="responsabile">

            </div>
        </div>
    </div>
</div>

