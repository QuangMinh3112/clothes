<div class="">
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Quản lý nhà cung cấp" subtitle="" size="text-xl">
            <x-slot:actions>
                <div class="" wire:loading>
                    <x-mary-loading />
                </div>
                <select wire:model.live='page' class="rounded border-1 border-slate-100">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
                <x-mary-button icon="o-funnel" wire:click="$toggle('filterDrawer')" />
                <x-mary-button icon="o-plus" class="btn-primary" @click="$wire.supplierModal = true" />
            </x-slot:actions>
        </x-mary-header>
        @if (count($suppliers) > 0)
            <x-mary-table :headers="$headers" :rows="$suppliers" with-pagination class="border border-collapse">
                @scope('cell_stt', $suppliers)
                    {{ $this->loop->index + 1 }}
                @endscope
                @scope('cell_is_active', $suppliers)
                    @if ($suppliers->is_active == 0)
                        <x-mary-badge :value="'Ngừng cup cấp'" class="badge-warning" />
                    @else
                        <x-mary-badge :value="'Đang hoạt động'" class="badge-success" />
                    @endif
                @endscope
                @scope('cell_action', $suppliers)
                    @if ($suppliers->is_active == 1)
                        <x-mary-button icon="o-pencil-square" class="btn-sm btn-primary" tooltip="Chỉnh sửa"
                            wire:click.prevent='edit({{ $suppliers->id }})' />
                        <x-mary-button icon="c-x-mark" class="btn-sm btn-error" tooltip="Dừng cung cấp"
                            wire:click.prevent='confirm({{ $suppliers->id }})' />
                    @else
                        <x-mary-button icon="o-check-circle" class="btn-sm btn-success" tooltip="Cung cấp lại"
                            wire:click.prevent='confirm({{ $suppliers->id }})' />
                    @endif
                @endscope
            </x-mary-table>
        @else
            <x-empty-table :headers="$headers" :col="7" />
        @endif
    </div>
    <x-supplier.form :editModal="$editModal" :adminOptions="$adminOptions" />
    <x-supplier.filter-form :filterDrawer="$filterDrawer" />
</div>
