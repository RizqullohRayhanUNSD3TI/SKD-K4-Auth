<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@itsolutionstuff.com',
                'is_admin' => '1',
                'jabatan' => 'administrator',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@itsolutionstuff.com',
                'is_admin' => '0',
                'jabatan' => 'pelanggan',
                'password' => bcrypt('123456'),
                
            ],
            [
                'name' => 'Pegawai',
                'email' => 'pegawai@itsolutionstuff.com',
                'is_admin' => '0',
                'jabatan' => 'pegawai',
                'password' => bcrypt('123456'),
                
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
