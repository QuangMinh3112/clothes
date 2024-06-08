@props(['filterDrawer'])
<div>
    <x-mary-drawer wire:model="filterDrawer" class="w-11/12 lg:w-1/3" right>
        <x-mary-form wire:submit.prevent="filterUser()">
            <x-mary-input label="Tên" wire:model="userResult.name" class="border-gray-200" />
            <x-mary-input label="Email" wire:model="userResult.email" class="border-gray-200" />
            <label for="" class="text-sm font-medium">Độ tuổi</label>
            <div class="grid grid-flow-col gap-1 justify-stretch">
                <x-mary-input placeholder="Từ" wire:model="userResult.minAge" class="w-full max-w-xs border-gray-200" />
                <x-mary-input placeholder="Đến" wire:model="userResult.maxAge"
                    class="w-full max-w-xs border-gray-200" />
            </div>
            <div class="flex gap-1">
                <div class="w-6/12">
                    <label for="" class="text-sm font-medium">Trạng thái hoạt động</label>
                    <select class="w-full max-w-xs border-gray-200 select" wire:model='userResult.is_banned'>
                        <option selected value="0">Đang hoạt động</option>
                        <option value="1">Ngừng hoạt động</option>
                    </select>
                </div>
                <div class="w-6/12">
                    <label for="" class="text-sm font-medium">Quyền hạn</label>
                    <select class="w-full max-w-xs border-gray-200 select" wire:model='userResult.is_admin'>
                        <option selected value="2">Tất cả</option>
                        <option value="0">Khách hàng</option>
                        <option value="1">Quản lý</option>
                    </select>
                </div>
            </div>
            <x-mary-hr target="filterUser" />
            <div class="flex justify-end gap-1">
                <x-mary-button label="Đóng" @click="$wire.filterDrawer = false" icon="o-x-circle" />
                <x-mary-button label="Đặt lại bộ lọc" icon="o-arrow-path" wire:click.prevent='resetFilter()' />
                <x-mary-button label="Tìm kiếm" class="btn-success" type="submit" icon="c-magnifying-glass" />
            </div>
        </x-mary-form>
    </x-mary-drawer>
</div>
