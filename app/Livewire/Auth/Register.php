<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class Register extends Component
{

    use WithFileUploads;

    #[layout('layouts.auth')]

    public $name, $email, $number_whatsapp, $password, $foto, $alamat;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'number_whatsapp' => 'required',
            'password' => 'required',
            'alamat' => 'required',
        ]);

        // return dd($this);

        $imageName = $this->foto->getClientOriginalName();
        $imagePath = $this->foto->store('avatar_warga', 'public');

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'no_whatsapp' => $this->number_whatsapp,
            'password' => Hash::make($this->password),
            'role' => 'warga',
            'foto' => $imageName,
            'alamat' => $this->alamat,
        ]);

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
