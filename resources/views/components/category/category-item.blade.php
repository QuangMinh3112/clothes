@props(['category', 'level' => 0])
<div>
    <div class="ml-7">
        <div class="flex justify-between p-3 mb-1 border rounded shadow-sm">
            <div class="flex gap-2">
                @if ($level != 0)
                    <x-iconoir-long-arrow-left-up />
                @endif
                {{ $category->name }}
            </div>
            <div>
                <button wire:click='edit({{ $category->id }})'>
                    <x-mary-icon name="o-pencil-square" />
                </button>

            </div>
        </div>
        @foreach ($category->children as $child)
            <x-category.category-item :category="$child" :level="$level + 1" />
        @endforeach
    </div>
</div>
