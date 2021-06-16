<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('customers')->insert([
        //     'first_name' => Str::random(10),
        //     'last_name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'phone' => Str::random(10)
        // ]);

        foreach ($this->getCustomers() as $customer){
            $customer = DB::table('customers')->insert([
                "first_name" => $customer->first_name,
                "last_name" => $customer->last_name,
                "email" => $customer->email,
                "phone" => $customer->phone
            ]);
        }
    }
}
