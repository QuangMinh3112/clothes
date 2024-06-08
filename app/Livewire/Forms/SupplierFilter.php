<?php

namespace App\Livewire\Forms;

use App\Models\Supplier;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithPagination;

class SupplierFilter extends Form
{
    //
    use WithPagination;
    public $name;
    public $email;
    public $phone_number;
    public $address;
    public $is_active = 1;
    public function filterQuery()
    {
        $query = Supplier::query();
        if (!empty($this->name)) {
            $query->findByName($this->name);
        }
        if (!empty($this->email)) {
            $query->findByEmail($this->email);
        }
        if (!empty($this->phone_number)) {
            $query->findByPhoneNumber($this->phone_number);
        }
        if (!empty($this->address)) {
            $query->findByAddress($this->address);
        }
        return $query->where('is_active', $this->is_active);
        $this->gotoPage(1);
    }
    public function resetFilter()
    {
        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->address = '';
        $this->is_active = 1;
        $this->filterQuery();
    }
}
