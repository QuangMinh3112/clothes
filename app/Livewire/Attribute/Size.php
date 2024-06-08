<?php

namespace App\Livewire\Attribute;

use App\Livewire\Forms\SizeForm;
use Livewire\Component;
use App\Models\Size as SizeModel;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class Size extends Component
{
    use WithPagination;
    use Toast;
    public SizeForm $sizeForm;
    public $page = 5;
    public $headers;
    public bool $sizeModal = false;
    public bool $editModal = false;

    public function mount()
    {
        $this->headers = [
            ['key' => 'stt', 'label' => 'STT', 'class' => 'text-black text-center'],
            ['key' => 'size_name', 'label' => 'Giá trị size', 'class' => 'text-black text-center'],
            ['key' => 'size_description', 'label' => 'Mô tả', 'class' => 'text-black'],
            ['key' => 'action', 'label' => 'Hành động', 'class' => 'text-black text-center'],
        ];
    }
    public function render()
    {
        return view('livewire.attribute.size', [
            'sizes' => SizeModel::paginate($this->page),
        ]);
    }
    public function closeForm()
    {
        $this->sizeModal = false;
        $this->editModal = false;
        $this->sizeForm->resetAttribute();
    }
    public function addNewSize()
    {
        $this->sizeForm->store();
        $this->success('Đã thêm mới size');
        $this->closeForm();
    }
    public function openEditModal($id)
    {
        $size = SizeModel::find($id);
        $this->sizeForm->setData($size);
        $this->sizeModal = true;
        $this->editModal = true;
    }
    public function updateSize()
    {
        $this->sizeForm->update();
        $this->success('Đã cập nhật size');
        $this->closeForm();
    }
}
