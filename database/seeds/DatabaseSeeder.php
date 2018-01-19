<?php


use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        \App\Productcategory::truncate();
        \App\Productmeasure::truncate();
        \App\Category::truncate();
        \App\Product::truncate();
        \App\User::truncate();
        // $this->call(UsersTableSeeder::class);

        factory(\App\User::class, 2)->create()->each(function ($u) {
            //            $u->posts()->save(factory(App\Post::class)->make());
        });
        factory(\App\Productcategory::class, 5)->create();
        factory(\App\Productmeasure::class, 11)->create();
        factory(\App\Category::class, 1)->create();
        factory(\App\Product::class, 20)->create();


    }
}
