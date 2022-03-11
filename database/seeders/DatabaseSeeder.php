<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()->create([
        //     'name' => 'admin',
        //     'email' => 'admin@wbtbdiy.com',
        //     'password' => Hash::make('secret'),
        //     'is_admin' => 1
        // ]);

        User::factory()->create([
            'name' => 'sleman',
            'email' => 'sleman@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);
        
        User::factory()->create([
            'name' => 'bantul',
            'email' => 'bantul@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);
        
        User::factory()->create([
            'name' => 'gunung kidul',
            'email' => 'gunungkidul@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);
        
        User::factory()->create([
            'name' => 'kota',
            'email' => 'kota@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);
        
        User::factory()->create([
            'name' => 'kulon progo',
            'email' => 'kulonprogo@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'name' => 'Keraton',
            'email' => 'keraton@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);

        User::factory()->create([
            'id' => 100,
            'name' => 'publik',
            'email' => 'publik@wbtbdiy.com',
            'password' => Hash::make('wbtbdiy123'),
            'is_admin' => 0
        ]);
    }
}
