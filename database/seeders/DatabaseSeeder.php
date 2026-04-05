<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Laporan;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //user admin
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('passsword'),
            'no_whatsapp' => '081234567890',
            'alamat' => 'Jl. Admin',
            'foto' => 'admin.jpg',
            'role' => 'admin',
        ]);

        //user warga
        $warga = User::create([
            'name' => 'Warga',
            'email' => 'warga@example.com',
            'password' => Hash::make('password'),
            'no_whatsapp' => '081234567890',
            'alamat' => 'Jl. Warga',
            'foto' => 'warga.jpg',
            'role' => 'warga',
        ]);

        //laporan
        $Laporan = Laporan::create([
            'judul' => 'Laporan',
            'detail' => 'Laporan',
            'tanggal' => now(),
            'foto' => 'laporan.jpg',
            'status' => 'pending',
            'pelapor_id' => $warga->id,
        ]);
    }
}
