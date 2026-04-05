<?php

namespace App\Livewire\Features;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;

class Dashboard extends Component
{
    #[Layout('layouts.app')]

    public $title = 'Dashboard';
    public $auth, $CountLaporanPending, $CountLaporanProses, $CountLaporanSelesai, $CountLaporanTotal;

    public function mount()
    {
        $this->auth = Auth::user();
        $this->CountLaporanPending = Laporan::where('pelapor_id', $this->auth->id)->where('status', 'pending')->count();
        $this->CountLaporanProses = Laporan::where('pelapor_id', $this->auth->id)->where('status', 'proses')->count();
        $this->CountLaporanSelesai = Laporan::where('pelapor_id', $this->auth->id)->where('status', 'selesai')->count();
        $this->CountLaporanTotal = Laporan::where('pelapor_id', $this->auth->id)->count();
    }

    public function render()
    {
        return view('livewire.features.warga.dashboard');
    }
}
