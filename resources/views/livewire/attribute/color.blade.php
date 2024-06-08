<div class="">
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Màu sắc" subtitle="" size="text-xl">
            <x-slot:actions>
                <div class="" wire:loading>
                    <x-mary-loading />
                </div>
                <x-mary-button icon="o-plus" class="btn-primary" @click="$wire.colorModal = true" />
            </x-slot:actions>
        </x-mary-header>
        @if (count($colors) > 0)
            <x-mary-table :headers="$headers" :rows="$colors" with-pagination class="border border-collapse">
                @scope('cell_stt', $colors)
                    {{ $this->loop->index + 1 }}
                @endscope
                @scope('cell_color_code', $colors)
                    <div>
                        <x-mary-badge class="p-3 rounded" style="background-color: {{ $colors->color_code }}" />
                    </div>
                @endscope
                @scope('cell_action', $colors)
                    <x-mary-button icon="o-pencil-square" class="btn-sm" wire:click='openEditModal({{ $colors->id }})' />
                @endscope
            </x-mary-table>
        @else
            <x-empty-table :headers="$headers" :col="8" />
        @endif
    </div>
    <x-attribute.color-form :editModal="$editModal" />
</div>
