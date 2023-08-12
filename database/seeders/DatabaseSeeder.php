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
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
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

        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                "name" => "Miss Annetta Wuckert IV",
                "email" => "crona.damian@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
            ],
            [
                "name" => "Sheridan Botsford",
                "email" => "thad.labadie@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
            ],
            [
                "name" => "Dr. Major Parisian",
                "email" => "harber.halle@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
                
            ],
            [
                "name" => "Otilia Jacobi",
                "email" => "minerva.muller@example.net",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
                
            ],
            [
                "name" => "Ms. Elva Conn Sr.",
                "email" => "vincenza31@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
                
            ],
            [
                "name" => "Carlie Rodriguez V",
                "email" => "hessel.alex@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
                
            ],
            [
                "name" => "Ross Wolf",
                "email" => "jordon.yundt@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
               
                
            ],
            [
                "name" => "Prof. Shaylee Heidenreich V",
                "email" => "leanna.erdman@example.net",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
             
            ],
            [
                "name" => "Cesar Ward",
                "email" => "jacobson.carmen@example.org",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
            
            ],
            [
                "name" => "Jeffry Bernhard",
                "email" => "schmeler.lucio@example.com",
                "password" => "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi",
                "user_type" => 2,
              
            ],
        ]);

    }
}
