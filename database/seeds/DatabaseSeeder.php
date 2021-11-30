<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // check if table users is empty
        if (DB::table('users')->count() == 0) {

            DB::table('users')->insert([

                'name' => 'mahdi',
                'email' => 'm73hdi@gmail.com',
                'password' => bcrypt('123456'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }


        if (DB::table('foods')->count() == 0) {

            DB::table('foods')->insert([

                [
                    'name' => 'Ham and Cheese Toastie',
                    'price' => '12000',

                ],
                [
                    'name' => 'Fry-up',
                    'price' => '22000',
                ],
                [
                    'name' => 'Salad',
                    'price' => '15000',
                ],
                [
                    'name' => 'Hotdog',
                    'price' => '45000',
                ],
            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }


        if (DB::table('ingredients')->count() == 0) {

            DB::table('ingredients')->insert([

                [
                    'title' => 'Ham',
                    'stock' => 3,
                    'foods_id'=> 1,
                    'expiry_date'=>'2021-12-02',
                    'best_before' => '2021-11-23',

                ],
                [
                    'title' => 'Cheese',
                    'stock' => 3,
                    'foods_id'=> 1,
                    'expiry_date'=>'2021-12-02',
                    'best_before' => '2021-11-23',
                ],
                [
                    'title' => 'Bread',
                    'stock' => 3,
                    'foods_id'=> 1,
                    'expiry_date'=>'2021-12-02',
                    'best_before' => '2021-11-23',
                ],
                [
                    'title' => 'Butter',
                    'stock' => 3,
                    'foods_id'=> 1,
                    'expiry_date'=>'2021-10-15',
                    'best_before' => '2021-10-10',
                ],
            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }


    }


}
