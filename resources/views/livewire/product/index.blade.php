<div class="">
    <div class="p-5 mx-auto bg-white rounded max-w-10xl sm:px-6 lg:px-8 drop-shadow">
        <x-mary-header title="Danh sách sản phẩm" subtitle="" size="text-xl">
            <x-slot:actions>
                <div class="" wire:loading>
                    <x-mary-loading />
                </div>
                <x-mary-button icon="o-funnel" wire:click="$toggle('filterForm')" />
                <x-mary-button icon="o-plus" class="btn-primary" link="/products/create" />
            </x-slot:actions>
        </x-mary-header>
        @if (count($products) > 0)
            <x-mary-table :headers="$headers" :rows="$products" with-pagination class="border border-collapse">
                @scope('cell_stt', $products)
                    {{ $this->loop->index + 1 }}
                @endscope
                @scope('cell_product_image', $products)
                    <div class="avatar">
                        <div class="w-24 border rounded">
                            <img src="{{ $products->product_image }}" />
                        </div>
                    </div>
                @endscope
                @scope('cell_action', $products)
                    <x-mary-button icon="o-pencil-square" class="btn-sm" wire:click='openEditModal({{ $products->id }})' />
                    <x-mary-button icon="c-x-mark" class="btn-sm btn-error"
                        wire:click='openEditModal({{ $products->id }})' />
                @endscope
            </x-mary-table>
        @else
            <x-empty-table :headers="$headers" :col="8" />
        @endif
    </div>
    <x-product.product-filter :filterForm='$filterForm' :categories='$categories' :suppliers='$suppliers' />
</div>
