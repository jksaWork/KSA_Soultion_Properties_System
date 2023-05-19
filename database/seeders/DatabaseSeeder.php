<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Area;
use App\Models\Client;
use App\Models\Owner;
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
        $this->call(LaraTrustSeeder::class);
        Admin::factory(1)->create();
        Client::factory(1)->create();
        Owner::factory(1)->create([
            'email' => 'owner@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $this->call(
            [
                ServiceSeeder::class,
                AgentSeeder::class,
                AreaSedder::class,
            ]
        );


        // Banks IS
        $banks = [
            'بنك الاهلي السعودي',
            'بنك ساب ',
            ' البنك السعودي لللأستثمار',
            ' البنك السعودي الفرنسي',
            'مصرف الانماء',
        ];

        foreach ($banks as $key => $value) {
            \App\Models\Bank::factory(1)->create([
                'name' => $value,
            ]);
        }
    }
}
