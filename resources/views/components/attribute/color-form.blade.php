@props(['editModal'])
<div>
    <x-mary-modal wire:model="colorModal" class="backdrop-blur" persistent>
        <x-mary-header title="{{ $editModal == true ? 'Chỉnh sửa màu sắc' : 'Thêm mới màu sắc' }}" size="text-xl"
            separator />
        <x-mary-form wire:submit="{{ $editModal == true ? 'updateColor()' : 'addNewColor()' }}">
            <x-mary-input label="Tên màu" wire:model="colorForm.color_name" class="border-gray-100" />
            <x-mary-colorpicker wire:model="colorForm.color_code" label="Chọn màu sắc" hint="Hãy chọn màu chính xác"
                icon="o-swatch" />
            <x-slot:actions>
                <x-mary-button label="Đóng" @click="$wire.closeForm()" />
                <x-mary-button label="{{ $editModal == true ? 'Cập nhật' : 'Thêm mới' }}" class="btn-primary"
                    type="submit" spinner="" />
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
