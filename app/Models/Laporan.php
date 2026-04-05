<?php

namespace App\Livewire\Features\Warga;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan as LaporanModel;

class Laporan extends Component 
{
    #[Layout('layouts.app')]

    public $title = 'Laporan';
    public $auth;
    public $listLaporan;

    public function mount()
    {
        $this->auth = Auth::user();
        $this->listLaporan = LaporanModel::where('pelapor_id', $this->auth->id)->get();
    }
    public function render()
    {
        return view('livewire.features.warga.laporan');
    }
}
