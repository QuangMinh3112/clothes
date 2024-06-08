@props(['editModal', 'categories'])
<div>
    <x-mary-header title="{{ $editModal == false ? 'Thêm mới danh mục' : 'Chỉnh sửa danh mục' }}" size="text-xl"
        separator />
    <x-mary-form wire:submit="{{ $editModal == false ? 'addNewCategory()' : 'updateCategory()' }}">
        <x-mary-input label="Tên danh mục" wire:model="categoryForm.name" class="border-gray-100" />
        <label for="countries" class="block ml-1 text-sm font-medium text-gray-900 dark:text-white">Chọn danh mục
            cha</label>
        <select wire:model='categoryForm.parent_id'
            class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg focus:ring-gray-500 focus:border-gray-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500">
            <option value="">Rỗng</option>
            @foreach ($categories as $category)
                <x-category.category-select :category="$category" />
            @endforeach
        </select>
        <div>
            <x-mary-hr target="{{ $editModal == false ? 'addNewCategory' : 'updateCategory' }}" />
            <x-mary-button label="{{ $editModal == false ? 'Đặt lại' : 'Huỷ' }}" wire:click='resetForm()' />
            <x-mary-button label="{{ $editModal == false ? 'Thêm mới' : 'Cập nhật' }}" class="btn-success"
                type="submit" />
        </div>
    </x-mary-form>
</div>
