<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_image',
        'product_description',
        'import_price',
        'retail_price',
        'category_id',
        'supplier_id',
        'is_active'
    ];
    public function getImportPriceAttribute($value)
    {
        return $value . ' VNĐ';
    }
    public function getRetailPriceAttribute($value)
    {
        return $value . ' VNĐ';
    }
    public function getCategoryIdAttribute($value)
    {
        $category = Category::find($value);
        if ($category) {
            return $category->name;
        } else {
            return "Rỗng";
        }
    }
    public function getSupplierIdAttribute($value)
    {
        $supplier = Supplier::find($value);
        if ($supplier) {
            return $supplier->name;
        } else {
            return "Rỗng";
        }
    }
    public function scopeSearchByName($query, $name)
    {
        return $query->where('product_name', 'like', '%' . $name . '%');
    }
    public function scopeSearchByCategoryId($query, $category_id)
    {
        return $query->where('category_id', $category_id);
    }
    public function scopeSearchBySupplierId($query, $supplier_id)
    {
        return $query->where('supplier_id', $supplier_id);
    }
}
