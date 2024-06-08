<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Mary\Traits\Toast;


#[Title('Danh mục sản phẩm')]
#[Layout('layouts.app')]
class Index extends Component
{
    use Toast;
    public CategoryForm $categoryForm;
    public $categories;
    public bool $editModal = false;
    #[On('remount')]
    public function mount()
    {
        $this->categories = Category::tree()->get()->toTree();
    }
    public function render()
    {
        return view('livewire.category.index');
    }
    public function addNewCategory()
    {
        $this->categoryForm->store();
        $this->success('Đã thêm mới danh mục');
        $this->dispatch('remount');
    }
    public function resetForm()
    {
        $this->editModal = false;
        $this->categoryForm->resetForm();
    }
    public function edit($id)
    {
        $editCategory = Category::find($id);
        $this->categoryForm->setData($editCategory);
        $this->editModal = true;
    }
    public function updateCategory()
    {
        $this->categoryForm->update();
        $this->success('Đã cập nhật danh mục');
        $this->dispatch('remount');
        $this->editModal = false;
        $this->categoryForm->resetForm();
    }
}
