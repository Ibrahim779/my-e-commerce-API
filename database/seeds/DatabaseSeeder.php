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
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
//        $this->call(CategorySeeder::class);
//        $this->call(SubcategorySeeder::class);
//        $this->call(BrandSeeder::class);
        $this->call(BrandCategorySeeder::class);
        $this->call(CartSeeder::class);
        $this->call(CouponSeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SubscribeSeeder::class);
        $this->call(WishlistSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(MessageSeeder::class);
    }
}
