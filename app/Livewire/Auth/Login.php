<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Layout('layouts.auth')]

    public $email = '';
    public $password = '';

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi gak yak heheh awokoakoawooawko',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi gak yak heheh awokoakoawooawko',
        'password.min' => 'Password minimal 6 karakter.',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();

            // cek role
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('warga.dashboard');
            }
        } else {
            return redirect()->route('login')->with('error', 'Email atau password tidak valid.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
