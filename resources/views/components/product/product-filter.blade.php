@props(['filterForm', 'categories', 'suppliers'])
<div>
    <x-mary-drawer wire:model="filterForm" class="w-11/12 lg:w-1/3" right>
        <x-mary-header title="Tìm kiếm sản phẩm" subtitle="" size="text-xl" />
        <x-mary-form wire:submit.prevent="filterProduct()">
            <x-mary-input label="Tên sản phẩm" wire:model="productResult.product_name" class="border-gray-100" />
            <label for="" class="text-sm font-medium">Giá nhập</label>
            <div class="grid grid-flow-col gap-1 justify-stretch">
                <x-mary-input placeholder="Từ" wire:model="productResult.minImportPrice"
                    class="w-full max-w-xs border-gray-200" />
                <x-mary-input placeholder="Đến" wire:model="productResult.maxImportPrice"
                    class="w-full max-w-xs border-gray-200" />
            </div>
            <label for="" class="text-sm font-medium">Giá bán</label>
            <div class="grid grid-flow-col gap-1 justify-stretch">
                <x-mary-input placeholder="Từ" wire:model="productResult.minRetailPrice"
                    class="w-full max-w-xs border-gray-200" />
                <x-mary-input placeholder="Đến" wire:model="productResult.maxRetailPrice"
                    class="w-full max-w-xs border-gray-200" />
            </div>
            <div class="flex gap-1">
                <div class="w-6/12">
                    <label for="" class="text-sm font-medium">Danh mục</label>
                    <select class="w-full max-w-xs border-gray-200 select" wire:model='productResult.category_id'>
                        <option selected>Tất cả</option>
                        @foreach ($categories as $category)
                            <x-category.category-select :category="$category" />
                        @endforeach
                    </select>
                </div>
                <div class="w-6/12">
                    <label for="" class="text-sm font-medium">Nhà cung cấp</label>
                    <select class="w-full max-w-xs border-gray-200 select" wire:model='productResult.supplier_id'>
                        <option selected>Tất cả</option>
                        @foreach ($suppliers as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label for="" class="text-sm font-medium">Trạng thái hoạt động</label>
            <select class="w-full max-w-xs border-gray-200 select" wire:model='productResult.is_active'>
                <option selected value="1">Đang hoạt động</option>
                <option value="0">Ngừng hoạt động</option>
            </select>
            <div class="flex justify-end gap-1">
                <x-mary-button label="Đóng" @click="$wire.filterForm = false" icon="o-x-circle" spinner  />
                <x-mary-button label="Đặt lại bộ lọc" icon="o-arrow-path" wire:click.prevent='resetFilter()' spinner  />
                <x-mary-button label="Tìm kiếm" class="btn-success" type="submit" icon="c-magnifying-glass" spinner  />
            </div>
        </x-mary-form>
    </x-mary-drawer>
</div>
