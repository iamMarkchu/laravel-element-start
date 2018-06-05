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

        // 20个 一级类别，每个一级类别下面，10个二级类别
        App\Models\Category::truncate();
        factory(App\Models\Category::class, 20)
            ->create()
            ->each(function ($u) {
                $u->children()->saveMany(
                    factory(App\Models\Category::class, 10)
                        ->create()
                );
            });

        // 100个 商家，每个商家下面， 1000条促销
        App\Models\Merchant::truncate();
        App\Models\Coupon::truncate();
        factory(App\Models\Merchant::class, 100)
            ->create()
            ->each(function ($u) {
                $u->coupons()->saveMany(
                    factory(App\Models\Coupon::class, 1000)
                        ->create()
                );
            });
    }
}
