<div>
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Kích cỡ" subtitle="" size="text-xl">
            <x-slot:actions>
                <div class="" wire:loading>
                    <x-mary-loading />
                </div>
                <x-mary-button icon="o-plus" class="btn-primary" @click="$wire.sizeModal = true" />
            </x-slot:actions>
        </x-mary-header>
        @if (count($sizes) > 0)
            <x-mary-table :headers="$headers" :rows="$sizes" with-pagination class="border border-collapse">
                @scope('cell_stt', $sizes)
                    {{ $this->loop->index + 1 }}
                @endscope
                @scope('cell_action', $sizes)
                    <x-mary-button class="btn-sm" icon="o-pencil-square" wire:click='openEditModal({{ $sizes->id }})' />
                @endscope
            </x-mary-table>
        @else
            <x-empty-table :headers="$headers" :col="8" />
        @endif
    </div>
    <x-attribute.size-form :editModal="$editModal" />
</div>
