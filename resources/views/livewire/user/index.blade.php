<div class="">
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Quản lý tài khoản" subtitle="">
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
                <x-mary-button icon="o-plus" class="btn-primary" @click="$wire.createUserModal = true" />
            </x-slot:actions>
        </x-mary-header>
        <x-mary-table :headers="$headers" :rows="$users" with-pagination class="border border-collapse"
            @row-click="$wire.edit($event.detail.id)">
            @scope('cell_is_admin', $user)
                @if ($user->is_admin == 0)
                    <x-mary-badge :value="'Khách hàng'" class="" />
                @else
                    <x-mary-badge :value="'Quản lý'" class="badge-success" />
                @endif
            @endscope
            @scope('cell_is_active', $user)
                @if ($user->is_active == 0)
                    <x-mary-badge :value="'Chưa xác minh'" class="badge-warning" />
                @else
                    <x-mary-badge :value="'Đã xác minh'" class="badge-success" />
                @endif
            @endscope
            @scope('cell_is_banned', $user)
                @if ($user->is_banned == 0)
                    <x-mary-badge class="badge-error badge-sm" />
                @else
                    <x-mary-badge :value="''" class="badge-success badge-sm" />
                @endif
            @endscope
        </x-mary-table>
    </div>
    <x-user.form :editModal="$editModal" :adminOptions="$adminOptions" />
    <x-user.filter-form :filterDrawer="$filterDrawer" />

</div>
