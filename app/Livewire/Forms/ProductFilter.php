<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithPagination;

class ProductFilter extends Form
{
    //
    use WithPagination;
    public $product_name;
    public $minImportPrice;
    public $maxImportPrice;
    public $minRetailPrice;
    public $maxRetailPrice;
    public $category_id;
    public $supplier_id;
    public $isActivate = 1;

    public function filterQuery()
    {
        $query = Product::query();
        if (!empty($this->product_name)) {
            $query->searchByName($this->product_name);
        }
        if (!empty($this->minImportPrice)) {
            $query->where('import_price', '>=', $this->minImportPrice);
        }
        if (!empty($this->maxImportPrice)) {
            $query->where('import_price', '<=', $this->maxImportPrice);
        }
        if (!empty($this->minRetailPrice)) {
            $query->where('retail_price', '>=', $this->minRetailPrice);
        }
        if (!empty($this->maxRetailPrice)) {
            $query->where('retail_price', '<=', $this->maxRetailPrice);
        }
        if (!empty($this->category_id)) {
            $query->searchByCategoryId($this->category_id);
        }
        if (!empty($this->supplier_id)) {
            $query->searchBySupplierId($this->supplier_id);
        }
        return $query->where('is_active', $this->isActivate);
        $this->gotoPage(1);
    }
    public function resetForm()
    {
        $this->product_name = '';
        $this->minImportPrice = '';
        $this->maxImportPrice = '';
        $this->minRetailPrice = '';
        $this->maxRetailPrice = '';
        $this->category_id = null;
        $this->supplier_id = null;
        $this->isActivate = 1;
        $this->filterQuery();
    }
}
