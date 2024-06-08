<?php

namespace App\Livewire\Attribute;

use App\Livewire\Forms\ColorForm;
use Livewire\WithPagination;
use App\Models\Color as ColorModel;
use Livewire\Component;
use Mary\Traits\Toast;

class Color extends Component
{
    use Toast;
    use WithPagination;
    public $headers;
    public ColorForm $colorForm;
    public bool $colorModal = false;
    public bool $editModal = false;
    public $page = 5;

    public function mount()
    {
        $this->headers = [
            ['key' => 'stt', 'label' => 'STT', 'class' => 'text-black text-center'],
            ['key' => 'color_name', 'label' => 'Tên màu', 'class' => 'text-black text-center'],
            ['key' => 'color_code', 'label' => 'Mã màu', 'class' => 'text-black text-center'],
            ['key' => 'action', 'label' => 'Hành động', 'class' => 'text-black text-center'],
        ];
    }
    public function render()
    {
        return view('livewire.attribute.color', [
            'colors' => ColorModel::paginate($this->page),
        ]);
    }
    public function openEditModal($id)
    {
        $color = ColorModel::find($id);
        $this->colorForm->setData($color);
        $this->colorModal = true;
        $this->editModal = true;
    }
    public function closeForm()
    {
        $this->colorForm->resetAttribute();
        $this->colorModal = false;
        $this->editModal = false;
    }
    public function addNewColor()
    {
        $this->colorForm->store();
        $this->success('Đã thêm màu mới');
        $this->closeForm();
    }
    public function updateColor()
    {
        $this->colorForm->update();
        $this->success('Đã cập nhật màu');
        $this->closeForm();
    }
}
