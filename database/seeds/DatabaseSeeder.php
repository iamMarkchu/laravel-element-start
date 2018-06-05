<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::truncate();
        factory(App\Models\User::class)->create([
            'name' => 'test',
            'email' => 'test@test.com',
        ]);
        factory(App\Models\User::class, 100)->create();
    }
}
