<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Title('Người dùng')]
#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;
    use Toast;
    public UserForm $form;
    public bool $editModal = false;
    public bool $createUserModal = false;
    public bool $filterDrawer = false;
    public $page = 10;
    public $headers;
    public $options;
    public $adminOptions;

    public function mount()
    {
        $this->headers = [
            ['key' => 'id', 'label' => '#', 'class' => 'text-black'],
            ['key' => 'name', 'label' => 'Họ & tên', 'class' => 'text-black'],
            ['key' => 'email', 'label' => 'Email', 'class' => 'text-black'],
            ['key' => 'age', 'label' => 'Tuổi', 'class' => 'text-black'],
            ['key' => 'is_admin', 'label' => 'Quyền hạn', 'class' => 'text-black'],
            ['key' => 'is_active', 'label' => 'Xác minh', 'class' => 'text-black'],
            ['key' => 'is_banned', 'label' => 'Trạng thái', 'class' => 'text-black'],
        ];
        $this->options = [
            ['id' => 0, 'name' => 'Khách hàng'],
            ['id' => 1, 'name' => 'Quản lý'],
        ];
        $this->adminOptions = [
            ['value' => 0, 'label' => 'Khách hàng'],
            ['value' => 1, 'label' => 'Quản lý'],
        ];
    }
    public function render()
    {
        return view('livewire.user.index', [
            'users' => User::paginate($this->page),
            'page' => $this->page,
        ]);
    }
    public function createNewUser()
    {
        $this->form->store();
        $this->closeModal();
        $this->success('Đã tạo mới');
    }
    public function updateUser()
    {
        $this->form->update();
        $this->closeModal();
        $this->success('Chỉnh sửa xong');
    }
    public function closeModal()
    {
        $this->createUserModal = false;
        $this->form->resetForm();
        $this->editModal = false;
    }
    public function edit($id)
    {
        $user = User::find($id);
        $this->form->setData($user);
        $this->createUserModal = true;
        $this->editModal = true;
    }
}
