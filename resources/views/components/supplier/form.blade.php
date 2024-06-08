@props(['editModal', 'adminOptions'])
<div>
    <x-mary-modal wire:model="supplierModal" class="backdrop-blur" persistent boxClass="max-w-2xl">
        <x-mary-header title="{{ $editModal == true ? 'Chỉnh sửa nhà cung cấp' : 'Thêm mới nhà cung cấp' }}"
            size="text-xl" separator />
        <x-mary-form wire:submit="{{ $editModal == true ? 'updateSupplier()' : 'addNewSupplier()' }}">
            <x-mary-input label="Tên nhà cung cấp" wire:model="supplierForm.name" class="border-gray-100" />
            <x-mary-input label="Email" wire:model="supplierForm.email" class="border-gray-100" />
            <x-mary-input label="Số điện thoại" wire:model="supplierForm.phone_number" class="border-gray-100" />
            <x-mary-input label="Địa chỉ" wire:model="supplierForm.address" class="border-gray-100" />
            @if ($editModal == true)
                <label class="mx-1 text-sm font-medium">Trạng thái</label>
                <label class="cursor-pointer label">
                    <span class="label-text">Đang hoạt động</span>
                    <input type="radio" class="radio" wire:model='supplierForm.is_active' value="1" />
                </label>
                <label class="cursor-pointer label">
                    <span class="label-text">Ngừng cung cấp</span>
                    <input type="radio" class="radio" wire:model='supplierForm.is_active' value="0" />
                </label>
            @endif
            <x-slot:actions>
                <x-mary-button label="Đóng" @click="$wire.closeForm()" />
                @if ($editModal == true)
                    <x-mary-button label="Cập nhật" class="btn-primary" type="submit" />
                @else
                    <x-mary-button label="Thêm mới" class="btn-success" type="submit" />
                @endif
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
