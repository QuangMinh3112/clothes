<?php

namespace App\Livewire\Product;

use App\Livewire\Forms\ProductFilter;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Supplier;

#[Layout('layouts.app')]
#[Title('Sản phẩm')]
class Index extends Component
{
    use WithPagination;
    public $page = 10;
    public $headers;
    public bool $filterForm = false;
    public $categories;
    public $suppliers;
    public ProductFilter $productResult;

    public function mount()
    {
        $this->headers = [
            ['key' => 'stt', 'label' => 'STT', 'class' => 'text-black'],
            ['key' => 'product_name', 'label' => 'Tên sản phẩm', 'class' => 'text-black'],
            ['key' => 'product_image', 'label' => 'Ảnh sản phẩm', 'class' => 'text-black'],
            ['key' => 'import_price', 'label' => 'Giá nhập', 'class' => 'text-black'],
            ['key' => 'retail_price', 'label' => 'Giá bán', 'class' => 'text-black'],
            ['key' => 'category_id', 'label' => 'Danh mục', 'class' => 'text-black'],
            ['key' => 'supplier_id', 'label' => 'Nhà cung cấp', 'class' => 'text-black'],
            ['key' => 'action', 'label' => 'Hành động', 'class' => 'text-black text-center'],
        ];
        $this->categories = Category::tree()->get()->toTree();
        $this->suppliers = Supplier::select('id', 'name')->get();
    }
    public function filterProduct()
    {
        $this->productResult->filterQuery();
        $this->filterForm = false;
    }
    public function resetFilter()
    {
        $this->productResult->resetForm();
        $this->filterForm = false;
    }
    public function render()
    {
        return view('livewire.product.index', [
            'products' => $this->productResult->filterQuery()->paginate($this->page)
        ]);
    }
}
