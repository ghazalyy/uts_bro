<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Faculty;
use App\Models\Building;
use App\Models\Room;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Rent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        { {
            }
        }
        // \Ap{{ p\Mo }}dels\User::factory()->create([
        //    {{  'na }}me' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Role::create([
            'name' => 'admin',
        ]);

        Role::create([
            'name' => 'mahasiswa',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'nomor_induk' => '21312131',
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'password' => bcrypt('mahasiswa'),
            'nomor_induk' => '21312109',
            'role_id' => 2,
        ]);

        Faculty::create([
            'code' => 'FTIK',
            'name' => 'Fakultas Teknik dan Ilmu Komputer',
        ]);
        Faculty::create([
            'code' => 'FEB',
            'name' => 'Fakultas Ekonomi Bisnis',
        ]);
        Faculty::create([
            'code' => 'FSIP',
            'name' => 'Fakultas Sastra dan Ilmu Pendidikan',
        ]);

        Building::create([
            'code' => 'ged-a',
            'name' => 'Gedung A',
            'faculty_id' => 2,
        ]);

        Building::create([
            'code' => 'ged-gsg',
            'name' => 'Gedung GSG',
            'faculty_id' => 1,
        ]);

        Building::create([
            'code' => 'ged-ict',
            'name' => 'Gedung ICT',
            'faculty_id' => 1,
        ]);

        Building::create([
            'code' => 'ged-b',
            'name' => 'Gedung B',
            'faculty_id' => 3,
        ]);

        Room::create([
            'code' => 'BR 1',
            'name' => 'BR 1.1',
            'img' => 'assets/images/ruang/Gedung.jpg',
            'floor' => 1,
            'status' => false,
            'capacity' => 50,
            'type' => 'Ruang Kelas',
            'description' => 'Ruang kelas adalah tempat di mana proses pembelajaran dan pengajaran berlangsung.',
            'building_id' => 1,
        ]);

        Room::create([
            'code' => 'BR 2',
            'name' => 'BR 1.2',
            'img' => 'assets/images/ruang/Gedung.jpg',
            'floor' => 1,
            'status' => false,
            'capacity' => 50,
            'type' => 'Ruang Kelas',
            'description' => 'Ruang kelas adalah tempat di mana proses pembelajaran dan pengajaran berlangsung.',
            'building_id' => 1,
        ]);

        Room::create([
            'code' => 'BR 3',
            'name' => 'BR 1.3',
            'img' => 'assets/images/ruang/Gedung.jpg',
            'floor' => 1,
            'status' => false,
            'capacity' => 50,
            'type' => 'Ruang Kelas',
            'description' => 'Ruang kelas adalah tempat di mana proses pembelajaran dan pengajaran berlangsung.',
            'building_id' => 1,
        ]);
    }
}
