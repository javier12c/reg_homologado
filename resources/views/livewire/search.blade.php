<div>
    <input class="block font-medium text-sm text-gray-700 uppercase space-y-6" type="text" wire:model="dateRange" x-data
        x-init="flatpickr($refs.input, {
            mode: 'range',
            dateFormat: 'd/m/Y',
            altFormat: 'd/m/Y',
            onChange: function(selectedDates) {
                $wire.set('dateRange', selectedDates.map(date => date.toISOString().split('T')[0]).join(' a '));
            }
        });" x-ref="input" class="border p-2">

    <x-button2 type="submit" wire:click="countRecords" class=" mt-4">
        {{ 'Contar registros' }}
    </x-button2>
    <p class="">Número de registros: {{ $count }}</p>
</div>
