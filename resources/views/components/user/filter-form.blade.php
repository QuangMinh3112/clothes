@props(['filterDrawer'])
<div>
    <x-mary-drawer wire:model="filterDrawer" class="w-11/12 lg:w-1/3" right>
        <x-mary-form wire:submit="save">
            <x-mary-input label="Tên" wire:model="name" />
            <x-mary-input label="Email" wire:model="email" />
            <div>Độ tuổi</div>
            <div class="flex justify-between">
                <x-mary-input placeholder="Từ" wire:model="name" style="" />
                <x-mary-input placeholder="Đến" wire:model="name" style="" />
            </div>
            <x-mary-input label="Tên" wire:model="name" />
            <x-slot:actions>
                <x-mary-button label="Đóng" @click="$wire.filterDrawer = false" icon="o-x-circle" />
                <x-mary-button label="Đặt lại bộ lọc" icon="o-arrow-path" />
                <x-mary-button label="Tìm kiếm" class="btn-success" type="submit" icon="c-magnifying-glass" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-drawer>
</div>
