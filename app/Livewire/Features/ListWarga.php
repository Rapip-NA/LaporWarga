<?php

namespace App\Livewire\Features;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;

class ListWarga extends Component
{
    #[Layout('layouts.app')]

    public $title = 'List Warga';
    public $listWarga;

    public function mount()
    {
        $this->listWarga = User::where('role', 'warga')->get();
    }

    public function render()
    {
        return view('livewire.features.list-warga');
    }
}
