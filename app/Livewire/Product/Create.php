<?php

namespace App\Livewire\Product;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Thêm sản phẩm')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.product.create');
    }
}
