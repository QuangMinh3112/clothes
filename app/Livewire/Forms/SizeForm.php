<?php

namespace App\Livewire\Forms;

use App\Models\Size;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SizeForm extends Form
{
    //
    public ?Size $size;
    public $size_name;
    public $size_description;
    public $id = '';
    // HÀM TRUYỀN VÀO CÁC GIÁ TRỊ CỦA BẢN GHI CẦN CHỈNH SỬA
    public function setData(Size $size)
    {
        $this->size = $size;
        $this->size_description = $size->size_description;
        $this->size_name = $size->size_name;
        $this->id = $size->id;
    }
    // HÀM THÊM MỚI
    public function store()
    {
        $validated = $this->validate();
        if ($validated) {
            Size::create([
                'size_name' => $validated['size_name'],
                'size_description' => $validated['size_description'],
            ]);
        }
    }
    // HÀM CẬP NHẬT
    public function update()
    {
        $validated = $this->validate();
        if ($validated) {
            $this->size->update([
                'size_name' => $validated['size_name'],
                'size_description' => $validated['size_description'],
            ]);
        }
    }
    // RESET KHI ĐÓNG FORM
    public function resetAttribute()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    // ĐẶT TÊN CHO CÁC TRƯỜNG VALIDATE
    public function validationAttributes()
    {
        return [
            'size_name' => 'Giá trị size',
            'size_description' => 'Mô tả size'
        ];
    }
    // ĐẶT VALIDATE CÁC TRƯỜNG
    public function rules()
    {
        return [
            'size_name' => 'required|unique:sizes,size_name,' . $this->id,
            'size_description' => 'required',
        ];
    }
    // CUSTOM TIN NHẮN LỖI TRẢ VỀ
    public function messages()
    {
        return [
            'required' => ':attribute không được bỏ trống',
            'unique' => ':attribute đã tồn tại'
        ];
    }
}
