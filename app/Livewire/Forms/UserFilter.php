<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithPagination;


class UserFilter extends Form
{
    //
    use WithPagination;
    public $is_banned = 0;
    public $name;
    public $email;
    public $minAge;
    public $maxAge;
    public $is_admin = 2;
    public function filterQuery()
    {
        $query = User::query();
        if (!empty($this->name)) {
            $query = User::findByName($this->name);
        }
        if (!empty($this->email)) {
            $query = User::findByEmail($this->email);
        }
        if (!empty($this->minAge)) {
            $query->where('age', '>=', $this->minAge);
        }
        if (!empty($this->maxAge)) {
            $query->where('age', '<=', $this->maxAge);
        }
        if ($this->is_admin != 2) {
            $query->where('is_admin', $this->is_admin);
        }
        return $query->where('is_banned', $this->is_banned);
        $this->gotoPage(1);
    }
    public function resetQuery()
    {
        $this->name = '';
        $this->email = '';
        $this->minAge = '';
        $this->maxAge = '';
        $this->is_admin = 2;
        $this->is_banned = 0;
        $this->filterQuery();
    }
}
