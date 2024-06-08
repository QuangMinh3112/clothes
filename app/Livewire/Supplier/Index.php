<?php

namespace App\Livewire\Supplier;

use App\Livewire\Forms\SupplierFilter;
use App\Livewire\Forms\SupplierForm;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Mary\Traits\Toast;

#[Title('Nhà cung cấp')]
#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;
    use Toast;
    public SupplierFilter $supplierResult;
    public SupplierForm $supplierForm;
    public $headers;
    public $page = 10;
    public bool $editModal = false;
    public bool $filterDrawer = false;
    public bool $supplierModal = false;
    public $adminOptions;
    public function mount()
    {
        $this->headers = [
            ['key' => 'stt', 'label' => 'STT', 'class' => 'text-black'],
            ['key' => 'name', 'label' => 'Tên nhà cung cấp', 'class' => 'text-black'],
            ['key' => 'email', 'label' => 'Email', 'class' => 'text-black'],
            ['key' => 'phone_number', 'label' => 'Số điện thoại', 'class' => 'text-black'],
            ['key' => 'address', 'label' => 'Địa chỉ', 'class' => 'text-black'],
            ['key' => 'is_active', 'label' => 'Trạng thái', 'class' => 'text-black text-center'],
            ['key' => 'action', 'label' => 'Hành động', 'class' => 'text-black text-center'],
        ];
        $this->adminOptions = [
            ['value' => 0, 'label' => 'Khách hàng'],
            ['value' => 1, 'label' => 'Quản lý'],
        ];
    }
    public function render()
    {
        return view('livewire.supplier.index', [
            'suppliers' => $this->supplierResult->filterQuery()->paginate($this->page),
        ]);
    }
    public function filterSupplier()
    {
        $this->supplierResult->filterQuery()->paginate($this->page);
        $this->filterDrawer = false;
    }
    public function openForm()
    {
    }
    public function closeForm()
    {
        $this->supplierModal = false;
        $this->editModal = false;
        $this->supplierForm->resetAttribute();
    }
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        $this->supplierModal = true;
        $this->editModal = true;
        $this->supplierForm->setData($supplier);
    }
    public function addNewSupplier()
    {
        $this->supplierForm->store();
        $this->closeForm();
        $this->success("Đã thêm mới");
    }
    public function updateSupplier()
    {
        $this->supplierForm->update();
        $this->closeForm();
        $this->success("Đã cập nhật");
    }
    public function resetFilter()
    {
        $this->supplierResult->resetFilter();
        $this->filterDrawer = false;
    }
    public function confirm($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier->is_active == 1) {
            $this->dispatch(
                'confirm',
                title: 'Cảnh báo',
                text: 'Dừng cung cấp của ' . $supplier->name,
                confirmText: 'Dừng ngay!',
                cancelText: 'Huỷ bỏ',
                method: 'deactive',
                userId: $id,
            );
        } else {
            $this->dispatch(
                'confirm',
                title: 'Cảnh báo',
                text: 'Nhà cung cấp ' . $supplier->name . ' đã hoạt động trở lại',
                confirmText: 'Chấp nhận!',
                cancelText: 'Huỷ bỏ',
                method: 'deactive',
                userId: $id,
            );
        }
    }
    #[On('deactive')]
    public function deactive($id)
    {
        $supplier = Supplier::find($id);
        if ($supplier->is_active == 0) {
            $supplier->update([
                'is_active' => 1
            ]);
            $this->success('Đã hoạt động trở lại!');
        } else {
            $supplier->update([
                'is_active' => 0
            ]);
            $this->success('Đã dừng cung cấp!');
        }
    }
}
