@props(['editModal', 'adminOptions'])
<div>
    <x-mary-modal wire:model="createUserModal" class="backdrop-blur" persistent boxClass="max-w-2xl">
        <x-mary-header title="{{ $editModal == true ? 'Chỉnh sửa tài khoản' : 'Thêm mới tài khoản' }}" subtitle=""
            separator size="text-xl" />
        <x-mary-form wire:submit.prevent="{{ $editModal == true ? 'updateUser' : 'createNewUser' }}">
            <x-mary-input label="Họ và tên" wire:model="form.name" class="border-gray-100" />
            <x-mary-input label="Email" wire:model="form.email" class="border-gray-100" />
            @if ($editModal == true)
                {{-- <x-mary-input label="Mật khẩu" wire:model="form.password" class="border-gray-100" type="password" disabled /> --}}
            @else
                <x-mary-input label="Mật khẩu" wire:model="form.password" class="border-gray-100" type="password" />
            @endif
            <x-mary-input label="Tuổi" wire:model="form.age" class="border-gray-100" />
            <x-mary-input label="Số điện thoại" wire:model="form.phone_number" class="border-gray-100" />
            <x-radio :wiremodel="'form.is_admin'" :label="'Quyền hạn'" :options="$adminOptions" class="border-gray-100" />
            <x-slot:actions>
                <x-mary-button label="Đóng" @click="$wire.closeModal()" spinner="closeModal()" />
                @if ($editModal == true)
                    <x-mary-button label="Cập nhật" class="btn-primary" type="submit" spinner="save" />
                @else
                    <x-mary-button label="Thêm" class="btn-success" type="submit" spinner="save" />
                @endif
            </x-slot:actions>
        </x-mary-form>
    </x-mary-modal>
</div>
