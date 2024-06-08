<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SupplierForm extends Form
{
    //
    #[Validate()]
    public ?Supplier $supplier;
    public $name;
    public $address;
    public $phone_number;
    public $email;
    public $id = '';
    public $is_active;

    public function setData(Supplier $supplier)
    {
        $this->supplier = $supplier;
        $this->id = $supplier->id;
        $this->name = $supplier->name;
        $this->address = $supplier->address;
        $this->phone_number = $supplier->phone_number;
        $this->email = $supplier->email;
        $this->is_active = $supplier->is_active;
    }

    public function store()
    {
        $validated = $this->validate();
        if ($validated) {
            Supplier::create([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'is_active' => 1,
            ]);
        }
    }
    public function update()
    {
        $validated = $this->validate();
        if ($validated) {
            $this->supplier->update([
                'name' => $validated['name'],
                'address' => $validated['address'],
                'phone_number' => $validated['phone_number'],
                'email' => $validated['email'],
                'is_active' => $this->is_active,
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
            'name' => 'Tên nhà cung cấp',
            'email' => 'Email nhà cung cấp',
            'phone_number' => 'Số điện thoại',
            'address' => 'Địa chỉ nhà cung cấp',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:suppliers,email,' . $this->id,
            'phone_number' => 'required|numeric|digits_between:10,11',
            'address' => 'required|string|min:10',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không để trống',
            'string' => ':attribute không phù hợp',
            'numeric' => ':attribute không phù hợp',
            'unique' => ':attribute đã tồn tại',
            'email' => ':attribute không phù hợp',
            'digits_between' => ':attribute không phù hợp',
        ];
    }
}
