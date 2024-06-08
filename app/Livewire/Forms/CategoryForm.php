<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    //
    public ?Category $category;
    public $name;
    public $parent_id;
    public $id = '';
    public function setData(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->parent_id = $category->parent_id;
        $this->id = $category->id;
    }
    public function store()
    {
        if ($this->parent_id == null) {
            $parent_id = null;
        } else {
            $parent_id = $this->parent_id;
        }
        $validated = $this->validate();
        if ($validated) {
            Category::create([
                "name" => $validated['name'],
                "parent_id" => $parent_id,
            ]);
            $this->resetForm();
        }
    }
    public function update()
    {
        if ($this->parent_id == null) {
            $parent_id = null;
        } else {
            $parent_id = $this->parent_id;
        }
        $validated = $this->validate();
        if ($validated) {
            $this->category->update([
                "name" => $validated['name'],
                "parent_id" => $parent_id,
            ]);
        }
    }
    public function resetForm()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    public function validationAttributes()
    {
        return [
            'name' => 'Tên danh mục',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->id,
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ];
    }
}
