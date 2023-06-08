<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [[
        'username' => 'novaslosiv',
        'password' => Hash::make('@Duta010205'),
        'role' => 'superadmin',
       ],
       [
        'username' => 'adminsukaharja',
        'password' => Hash::make('adminsukaharja'),
        'role' => 'admin'
       ],
       [
        'username' => 'kadessukaharja',
        'password' => Hash::make('kadessukaharja'),
        'role' => 'kades'
       ],
       [
        'username' => 'sekdes',
        'password' => Hash::make('sekdessukaharja'),
        'role' => 'sekdes'
       ],
       [
        'username' => 'pelayanan',
        'password' => Hash::make('pelayanansukaharja'),
        'role' => 'pelayanan'
       ],
    ];

       foreach ($data as $item) {
        User::create([
            'username' => $item['username'],
            'password' => $item['password'],
            'role' => $item['role']
        ]);
       }
    }
}
