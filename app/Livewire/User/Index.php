<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserFilter;
use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Title('Người dùng')]
#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;
    use Toast;
    public UserForm $form;
    public UserFilter $userResult;
    public bool $editModal = false;
    public bool $createUserModal = false;
    public bool $filterDrawer = false;
    public bool $confirm_modal = false;
    public $page = 10;
    public $headers;
    public $options;
    public $adminOptions;
    public $rows;
    public $deleteUser;

    public function mount()
    {
        $this->headers = [
            ['key' => 'stt', 'label' => 'STT', 'class' => 'text-black'],
            ['key' => 'name', 'label' => 'Họ & tên', 'class' => 'text-black'],
            ['key' => 'email', 'label' => 'Email', 'class' => 'text-black'],
            ['key' => 'age', 'label' => 'Tuổi', 'class' => 'text-black text-center'],
            ['key' => 'is_admin', 'label' => 'Quyền hạn', 'class' => 'text-black text-center'],
            ['key' => 'is_active', 'label' => 'Xác minh', 'class' => 'text-black text-center'],
            ['key' => 'is_banned', 'label' => 'Trạng thái', 'class' => 'text-black text-center'],
            ['key' => 'action', 'label' => 'Hành động', 'class' => 'text-black text-center'],
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
            'users' => $this->userResult->filterQuery()->paginate($this->page),
        ]);
    }
    // FILTER
    public function filterUser()
    {
        $this->userResult->filterQuery()->paginate($this->page);
        $this->filterDrawer == false;
    }
    public function resetFilter()
    {
        $this->userResult->resetQuery();
        $this->userResult->filterQuery()->paginate($this->page);
    }
    // ACTION
    public function confirm($id)
    {
        $user = User::find($id);
        if ($user->is_banned == 0) {
            $this->dispatch(
                'confirm',
                title: 'Cảnh báo',
                text: 'Khoá người dùng ' . $user->name,
                confirmText: 'Khoá ngay!',
                cancelText: 'Huỷ bỏ',
                method: 'deactive',
                userId: $id,
            );
        } else {
            $this->dispatch(
                'confirm',
                title: 'Cảnh báo',
                text: 'Mở khoá người dùng ' . $user->name,
                confirmText: 'Mở khoá ngay!',
                cancelText: 'Huỷ bỏ',
                method: 'deactive',
                userId: $id,
            );
        }
    }
    #[On('deactive')]
    public function confirmed($id)
    {
        $deActiveAccount = User::find($id);
        if ($deActiveAccount->is_banned == 0) {
            $deActiveAccount->update([
                'is_banned' => 1,
            ]);
            $this->success('Đã cấm!');
        } else {
            $deActiveAccount->update([
                'is_banned' => 0,
            ]);
            $this->success('Đã mo!');
        }
    }
    // USER FORM
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
