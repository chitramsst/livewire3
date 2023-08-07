<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $data = [
            [
                'name' => "category1",
            ],
            [
                'name' => "category2",
            ]
        ];

        \App\Models\Category::insert($data);

          /* admin seeder */
          \App\Models\User::create([
            'name' => "admin",
            "email" => "admin@admin.com",
            "password" => Hash::make('123456'),
            "user_type" => 1,
            "is_active" => 1
        ]);
        /* seeder call */
        $this->call([
            MasterControlSeeder::class,
        ]);

    }
}
