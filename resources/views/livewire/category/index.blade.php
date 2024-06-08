<div class="flex gap-1">
    <div class="w-1/2">
        <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
            <x-mary-header title="Quản lý danh mục sản phẩm" subtitle="" size="text-xl" separator  />
            <div class="overflow-y-scroll h-96">
                @foreach ($categories as $category)
                    <x-category.category-item :category="$category" />
                @endforeach
            </div>
        </div>
    </div>
    <div class="w-1/2 bg-white rounded drop-shadow">
        <div class="p-5 mx-auto sm:px-6 lg:px-8 h-96">
            <x-category.category-form :categoryForm="$categoryForm" :categories="$categories" :editModal="$editModal" />
        </div>
    </div>
</div>
