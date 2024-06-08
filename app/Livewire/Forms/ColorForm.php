<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use App\Models\Color;
use Livewire\Form;

class ColorForm extends Form
{
    //
    public ?Color $color;
    public $id = '';
    public $color_name;
    public $color_code;

    public function setData(Color $color)
    {
        $this->id = $color->id;
        $this->color = $color;
        $this->color_name = $color->color_name;
        $this->color_code = $color->color_code;
    }
    public function store()
    {
        $validated = $this->validate();
        if ($validated) {
            Color::create([
                'color_name' => $validated['color_name'],
                'color_code' => $validated['color_code']
            ]);
        }
    }
    public function update()
    {
        $validated = $this->validate();
        if ($validated) {
            $this->color->update([
                'color_name' => $validated['color_name'],
                'color_code' => $validated['color_code']
            ]);
        }
    }
    public function resetAttribute()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    public function validationAttributes()
    {
        return [
            'color_name' => 'Tên màu sắc',
            'color_code' => 'Mã màu sắc'
        ];
    }
    public function rules()
    {
        return [
            'color_name' => 'required|unique:colors,color_name,' . $this->id,
            'color_code' => 'required|unique:colors,color_code,' . $this->id,
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại'
        ];
    }
}
