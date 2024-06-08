@props(['editModal'])
<div>
    <x-mary-modal wire:model="sizeModal" class="backdrop-blur" persistent>
        <x-mary-header title="{{ $editModal == true ? 'Chỉnh sửa size' : 'Thêm mới size' }}" size="text-xl" separator />
        <x-mary-form wire:submit="{{ $editModal == true ? 'updateSize()' : 'addNewSize()' }}">
            <x-mary-input label="Giá trị size" wire:model="sizeForm.size_name" class="border-gray-100" />
            <x-mary-input wire:model="sizeForm.size_description" label="Mô tả size" hint="( Gồm cân nặng & chiều cao)" />
            <x-slot:actions>
                <x-mary-button label="Đóng" @click="$wire.closeForm()" />
                <x-mary-button label="{{ $editModal == true ? 'Cập nhật' : 'Thêm mới' }}" class="btn-primary"
                    type="submit" spinner="" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
