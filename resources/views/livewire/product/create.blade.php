<div>
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Thêm sản phẩm" subtitle="" size="text-xl" />
        <x-mary-form wire:submit="save">
            <x-mary-input label="Name" wire:model="name" />
            <x-mary-input label="Amount" wire:model="amount" prefix="USD" money hint="It submits an unmasked value" />

            <x-slot:actions>
                <x-mary-button label="Cancel" />
                <x-mary-button label="Click me!" class="btn-primary" type="submit" spinner="save" />
            </x-slot:actions>
        </x-mary-form>
    </div>
</div>
