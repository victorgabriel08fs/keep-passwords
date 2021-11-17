<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@admin.com';
        $user->password = '$2y$10$8xDNPxMSTLKwi968jiXGxuPKtZe4mAYw64kxulOfWgIuXSOVUWraO';
        $user->is_admin = true;
        $user->save();
    }
}
