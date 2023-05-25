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
        $units = ['شقه', 'فيلا', 'فندق'];
        foreach ($units  as $key => $value) {
            \App\Models\Unit::factory(1)->create([
                'name' => $value,
            ]);
        }

        $province = ["المدينه", "جده", "مكه", "الرياض"];
        foreach ($province  as $key => $value) {
            \App\Models\Area::factory(1)->create([
                'name' => $value,
            ]);
        }

        $province = ["شقراء", "الخرج", "الدرعيه ", "عفيف"];
        foreach ($province  as $key => $value) {
            \App\Models\Province::factory(1)->create([
                'name' => $value,
            ]);
        }

        $nationaltis = ["سوريا", "لبنان", " المملكه العربيه السعوديه ", "السودان"];
        foreach ($nationaltis  as $key => $value) {
            \App\Models\Nationaltiy::factory(1)->create([
                'name' => $value,
            ]);
        }

        $province = ["حديقة الملك سلمان", "حي الازدهار", "حي الجزيرة ", "عفيف"];
        foreach ($province  as $key => $value) {
            \App\Models\SubArea::factory(1)->create([
                'name' => $value,
            ]);
        }

        Admin::factory(1)->create();
        Client::factory(1)->create();
        Owner::factory(1)->create([
            'email' => 'owner@gmail.com',
            // 'password' => bcrypt('123456'),
        ]);
        $this->call(
            [
                ServiceSeeder::class,
                AgentSeeder::class,
                AreaSedder::class,
                RelastateSeed::class
            ]
        );
    }
}
