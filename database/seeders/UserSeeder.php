<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'waiter' => 'waiter@example.com',
            'cashier' => 'cashier@example.com',
            'customer' => 'customer@example.com',
            'chef' => 'chef@example.com',
            'admin' => 'admin@example.com',
        ];

        foreach ($roles as $roleName => $email) {
            $role = Role::where('name', $roleName)->first();

            User::factory()->create([
                'email' => $email,
            ])->assignRole($role);
        }
    }
}
