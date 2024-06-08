@props(['category', 'level' => 0])
@php
    $bulletPoint = str_repeat('--', $level);
@endphp
<option value="{{ $category->id }}"> {{ $bulletPoint }} {{ $category->name }}</option>
@foreach ($category->children as $child)
    <x-category.category-select :category="$child" :level="$level + 1" />
@endforeach
