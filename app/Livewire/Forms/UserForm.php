<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserForm extends Form
{
    #[Validate()]
    public $name;
    public $email;
    public $password;
    public $age;
    public $phone_number;
    public $is_admin;
    public ?User $user;
    public $id = '';
    public function setData(User $user)
    {
        $this->user = $user;
        $this->id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->age = $user->age;
        $this->phone_number = $user->phone_number;
        $this->is_admin = $user->is_admin;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($validated) {
            $this->user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'age' => $validated['age'],
                'phone_number' => $validated['phone_number'],
                'is_admin' => $this->is_admin,
                'is_active' => 1,
                'is_banned' => 0,
            ]);
        }
    }
    public function store()
    {
        $validated = $this->validate();
        if ($validated) {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'age' => $validated['age'],
                'phone_number' => $validated['phone_number'],
                'is_admin' => $this->is_admin,
                'is_active' => 1,
                'is_banned' => 0,
            ]);
            $this->resetForm();
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
            'name' => 'Họ tên người dùng',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'phone_number' => 'Số điện thoại',
            'is_admin' => 'Quyền',
            'age' => 'Tuổi',
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'age' => 'required|numeric|min:18|max:100',
            'phone_number' => 'required|numeric|digits_between:10,11',
            'password' => 'required|string|min:5',
            'is_admin' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'string' => ':attribute phải là chữ',
            'numeric' => ':attribute phải là số',
            'unique' => ':attribute đã tồn tại',
            'digits_between' => ':attribute không hợp lệ',
            'email' => ':attribute không phù hợp'
        ];
    }
}
