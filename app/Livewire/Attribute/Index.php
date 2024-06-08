<?php

namespace App\Livewire\Attribute;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Thuộc tính')]
#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.attribute.index');
    }
}
