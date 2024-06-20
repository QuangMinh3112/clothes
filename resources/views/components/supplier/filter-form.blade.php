@props(['filterDrawer'])
<div>
    <x-mary-header title="Tìm kiếm nhà cung cấp" subtitle="" size="text-xl" />
    <x-mary-drawer wire:model="filterDrawer" class="w-11/12 lg:w-1/3" right>
        <x-mary-form wire:submit.prevent="filterSupplier()">
            <x-mary-input label="Tên nhà cung cấp" wire:model="supplierResult.name" class="border-gray-200" />
            <x-mary-input label="Email nhà cung cấp" wire:model="supplierResult.email" class="border-gray-200" />
            <x-mary-input label="Số điện thoại" wire:model="supplierResult.phone_number" class="border-gray-200" />
            <x-mary-input label="Địa chỉ nhà cung cấp" wire:model="supplierResult.address" class="border-gray-200" />
            <label for="" class="text-sm font-medium">Trạng thái hoạt động</label>
            <select class="w-full max-w-xs border-gray-200 select" wire:model='supplierResult.is_active'>
                <option selected value="1">Đang hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
            </select>
            <x-mary-hr target="filterUser" />
            <div class="flex justify-end gap-1">
                <x-mary-button label="Đóng" @click="$wire.filterDrawer = false" icon="o-x-circle" />
                <x-mary-button label="Đặt lại bộ lọc" icon="o-arrow-path" wire:click.prevent='resetFilter()' />
                <x-mary-button label="Tìm kiếm" class="btn-success" type="submit" icon="c-magnifying-glass" />
            </div>
        </x-mary-form>
    </x-mary-drawer>
</div>
